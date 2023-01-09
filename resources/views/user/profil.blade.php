@extends('layouts.app')

@section('content')

<div class="container">
   @include('component.user.sidebar')
   
   
   @if (Session('status'))
   <div class="alert alert-{{ session('status') }}" role="alert"></i>
       <strong>{{ session('message') }}</strong>
   </div>
@endif

   <div class="card">
      <div class="card-header">
         <h4>Update profile</h4>
      </div>
      <div class="card-body">
         <form method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="table table-stripped bordered">
               <tr>
                  <th>Foto</th>
                  <td>
                     <input type="file" name="foto" class="form-control">
                     </td>
            </tr>
            <tr>
                  <th>Nama Lengkap</th>
                  <td>
                     <input  class="form-control" type="text" name="fullname" value="{{ Auth::user()->fullname }}">
                  </td>
               </tr>
               <tr>
                  <th>username</th>
                  <td>
                     <input  class="form-control" type="text" name="username" value="{{ Auth::user()->username }}">
                  </td>
               </tr>
               <tr>
                  <th>password</th>
                  <td>
                     <input  class="form-control" type="password" name="password" placeholder="sandi belum di ubah">
                  </td>
               </tr>
               <tr>
                  <th>nis</th>
                  <td>
                     <input  class="form-control" type="text" name="nis" value="{{ Auth::user()->nis }}">
                     {{-- <input  class="form-control" type="hidden" name="kode" value="{{ Auth::user()->kode }}"> --}}
                  </td>
               </tr>
               
               <tr>
                  <th>Alamat</th>
                  <td>
                     <textarea  class="form-control" name="alamat">{{ Auth::user()->alamat }}</textarea>
                  </td>
               </tr>
               <tr>
                  <th>Kelas</th>
                  <td>
                     <input  class="form-control" type="text" name="kelas" value="{{ Auth::user()->kelas }}">
                  </td>
               </tr>
            </table>
            <div class="text-end">
               
               <button class="btn btn-primary" type="submit">simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection