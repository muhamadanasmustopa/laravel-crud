
@extends('layouts.master')

    @section('content')
        
        <h2>Data Karaywan</h2>
        @if (session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
        @endif
        <table class="table">
            <tr>
                <th>Nama</th>
                <th>Jeis Kelamin</th>
                <th>No Handphone</th>
                <th>Email</th>
                <th>Current Salary</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            @foreach($data as $karyawan)
            <tr>
                <td>{{$karyawan->nama}}</td>
                <td>{{$karyawan->jenis_kelamin}}</td>
                <td>{{$karyawan->no_hp}}</td>
                <td>{{$karyawan->email}}</td>
                <td>{{$karyawan->current_salary}}</td>
                <td> <img src="{{url('uploads/' . $karyawan->foto )}}" width="70px" height="70px" alt=""> </td>
                <td>
                    <a href="{{url('karyawan/edit/' . $karyawan->id)}}" class="btn btn-warning">Edit</a>
                    <a href="{{url('karyawan/delete/' . $karyawan->id)}}" class="btn btn-danger">Delete</a>
                    <a href="{{url('karyawan/export/' . $karyawan->id)}}" class="btn btn-danger">Export</a>
                </td>
            </tr>
            @endforeach
        </table>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Karyawan
        </button>
       
        <!-- Modal -->
        <form action="{{url('/karyawan/store')}}" method="POST" enctype="multipart/form-data">

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama:</label>
                            <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" placeholder="Masukan Nama">
                        </div>
                        <div class="mb-3">
                            <label   class="form-label">Jenis Kelamin:</label>
                            <div class="form-check">
                                <input class="form-check-input" value="Laki-laki" type="radio" name="jenis_kelamin" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="Perempuan" type="radio" name="jenis_kelamin" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">No Handphone:</label>
                            <input type="number" name="no_hp" class="form-control" id="exampleFormControlInput1" placeholder="Masukan No Handphone">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Current Salary:</label>
                            <input type="number" name="gaji" class="form-control" id="exampleFormControlInput1" placeholder="Masukan gaji">
                        </div>
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Foto:</label>
                            <input class="form-control form-control-sm" name="foto" id="formFileSm" type="file">
                        </div>
            

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>

    @endsection

   