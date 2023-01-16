@extends('layouts.master')

@section('content')
<div class="container">

   <div class="card">
       <div class="card-header">
         <h4>Form Peminjaman</h4>
       </div>

       <div class="card-body">
           <form action="{{ route('submit_peminjaman') }}" method="POST" class="form-group">
            @csrf
               <div class="mb-3">
                   <label>Tanggal Peminjaman</label>
                   <input type="date" class="form-control" name="tanggal_peminjaman" value="{{ date('Y-m-d') }}" readonly>
               </div>

               <div class="mb-3">
                   <label for="">Pilih Buku</label>

                   <select name="buku_id" id="" class="form-select">

                   <option >Pilih Opsi</option>
               
                   @foreach($buku as $b) 
                   <option value="{{$b->id}}" {{ isset($buku_id) ? $buku_id ==$b->id ? "selected" : "" : "" }} >{{$b->judul}}</option>

                   @endforeach
               </select>


               </div>

               <div class="mb-3">
                   <label for="">Kondisi buku</label>
                   <select class="form-select" name="kondisi_buku_saat_dipinjam">
                       <option value="" disabled selected >Pilih Opsi</option>
                       <option value="baik">Baik</option>
                       <option value="rusak">rusak</option>
                   </select>  
               </div>
               <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
               <button type="submit" class="btn btn-primary">Submit</button>
           </form>
       </div>
   </div>



</div>
@endsection