@extends('layouts.master')

@section('content')
    <h3 class="mb-3">pemberitahuan</h3>
     @foreach ($pemberitahuan as $p)
         <div class="alert alert-info">
             {{ $p->isi }}
         </div>
     @endforeach
         
     {{-- <div class="row">
         @foreach ($buku as $b)
             <div class="col-3">
                 <div class="card">
                     <div class="card-header">
                         {{ $b->kategori->nama }}
                     </div>
                     <div class="card-body">
                         <div>{{ $b->judul }}</div>
                         <div>{{ $b->pengarang }}</div>
                         <div>{{ $b->penerbit->nama }}</div>
                     </div>
 
                     <div class="card-footer">
                        <form action="{{route('user.form_peminjaman')}}" method="POST">

                            @csrf

                            <input type="hidden" value="{{$b->id}}" name="buku_id">
                            <button class="btn btn-primary" type="submit">Pinjam</button>
                        </form>
                     </div>
                 </div>
             </div>
         @endforeach
     </div> --}}
     <h4 class="mb-3">Katalog Buku</h4>

     <div class="row">
        @foreach ($buku as $b)
        {{-- <div class="col-3">
            <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <h4 class="card-title">{{ $b->judul }}</h4>
                    <p class="card-text">
                        <div>{{ $b->judul }}</div>
                        <div>{{ $b->pengarang }}</div>
                        <div>{{ $b->penerbit->nama }}</div>
                    </p>
                  </div>
                  <img
                    class="img-fluid w-100"
                    src="/assets/images/samples/banana.jpg"
                    alt="Card image cap"
                  />
                </div>
                <div class="card-footer d-flex justify-content-between">
                  <form action="{{route('user.form_peminjaman')}}" method="POST">

                            @csrf

                            <input type="hidden" value="{{$b->id}}" name="buku_id">
                            <button class="btn btn-primary" type="submit">Pinjam</button>
                        </form>
                </div>
              </div>
        </div> --}}
        <div class="col-3">
            <div class="card">
                <div class="card-content">
                  <img
                    src="/assets/images/samples/motorcycle.jpg"
                    class="card-img-top img-fluid"
                    alt="singleminded"
                  />
                  <div class="card-body">
                    <h5 class="card-title">{{ $b->judul }}</h5>
                    <p class="card-text">
                        <div>{{ $b->judul }}</div>
                        <div>{{ $b->pengarang }}</div>
                        <div>{{ $b->penerbit->nama }}</div>
                    </p>
                  </div>
                </div>
                <div class="card-footer d-flex justify-content-between border-0">
                    <form action="{{route('user.form_peminjaman')}}" method="POST">
  
                              @csrf
  
                              <input type="hidden" value="{{$b->id}}" name="buku_id">
                              <button class="btn btn-primary" type="submit">Pinjam</button>
                          </form>
                  </div>
              </div>
        </div>
        @endforeach
     </div>
@endsection