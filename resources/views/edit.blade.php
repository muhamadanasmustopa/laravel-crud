        
@extends('layouts.master')  
     
    @section('content')
        
        <h2>Edit Karyawan</h2>

                @if (session('status'))
                    <h6 class="alert alert-success">{{session('status')}}</h6>
                @endif

                 <form action="{{url('/karyawan/update/' . $karyawan->id)}}" method="POST" enctype="multipart/form-data">

                    {{csrf_field()}}
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama:</label>
                        <input type="text" class="form-control" value="{{$karyawan->nama}}" name="nama" id="exampleFormControlInput1" placeholder="Masukan Nama">
                    </div>
                    <div class="mb-3">
                        <label   class="form-label">Jenis Kelamin:</label>
                        <div class="form-check">
                            <input class="form-check-input" @if($karyawan->jenis_kelamin == 'Laki-laki') checked : @endif value="Laki-laki" type="radio" name="jenis_kelamin" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" @if($karyawan->jenis_kelamin == 'Perempuan') checked : @endif value="Perempuan" type="radio" name="jenis_kelamin" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                  
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email:</label>
                        <input type="email" value="{{$karyawan->email}}" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Handphone:</label>
                        <input type="number" value="{{$karyawan->no_hp}}" name="no_hp" class="form-control" id="exampleFormControlInput1" placeholder="Masukan No Handphone">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Current Salary:</label>
                        <input type="number" value="{{$karyawan->current_salary}}" name="gaji" class="form-control" id="exampleFormControlInput1" placeholder="Masukan gaji">
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Foto:</label>
                        <img class="m-5" src="{{url('uploads/' . $karyawan->foto)}}" width="70px" height="50px" alt="">
                        <input class="form-control form-control-sm" name="foto" id="formFileSm" type="file">
                    </div>
        
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </div>
                </form>
    @endsection



        


