<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpOffice\PhpWord\TemplateProcessor;

class KaryawanController extends Controller
{
    //

    public function index()
    {
        $data = Karyawan::all();

        return view('karyawan', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $karyawan = new Karyawan;
        $karyawan->nama = $request->input('nama');
        $karyawan->jenis_kelamin = $request->input('jenis_kelamin');
        $karyawan->email = $request->input('email');
        $karyawan->no_hp = $request->input('no_hp');
        $karyawan->current_salary = $request->input('gaji');

        if($request->hasFile('foto')){

            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filname = time(). '.'.$extention;
            $file->move('uploads', $filname);
            $karyawan->foto = $filname;

        }
        
        $karyawan->save();
        return redirect()->back()->with('status', 'Tambah Karyawan Sukses');
    }


    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        return view('edit', compact('karyawan'));
    }

    public function update(Request $request, $id) 
    {

        $karyawan = Karyawan::find($id);

        $karyawan->nama = $request->input('nama');
        $karyawan->jenis_kelamin = $request->input('jenis_kelamin');
        $karyawan->no_hp = $request->input('no_hp');
        $karyawan->email = $request->input('email');
        $karyawan->current_salary = $request->input('gaji');

        if($request->hasFile('foto')){

            $destination = 'uploads' . $karyawan->foto;

            if(File::exists($destination)){

                File::delete($destination);
            }

            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filname = time(). '.'.$extention;
            $file->move('uploads', $filname);
            $karyawan->foto = $filname;
        }

        $karyawan->update();

        return redirect('/karyawan')->with('status', 'Update Berhasil');

    }


    public function delete($id)
    {
        $karyawan = Karyawan::find($id);

        $karyawan->delete();

        return redirect('/karyawan')->with('status', 'Deleted Berhasil');

    }


    public function export($id)
    {
        $karyawan = Karyawan::find($id);
        $templteProcessor = new TemplateProcessor('word-template/karyawan.docx');
        $templteProcessor->setValue('id', $karyawan->id);
        $templteProcessor->setValue('nama', $karyawan->nama);
        $templteProcessor->setValue('jenis_kelamin', $karyawan->jenis_kelamin);
        $templteProcessor->setValue('no_hp', $karyawan->no_hp);
        $templteProcessor->setValue('email', $karyawan->email);
        $templteProcessor->setValue('current_salary', $karyawan->current_salary);
        $templteProcessor->setValue('foto', $karyawan->foto);

        $filename = $karyawan->name;
        $templteProcessor->saveAs($filename . '.docx');

        return response()->download($filename . '.docx')->deleteFileAfterSend(true);



    }
}
