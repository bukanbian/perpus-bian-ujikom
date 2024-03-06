@extends('layout.mainly')


@section('brianly')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    <h2 class="h2">Pinjam Buku</h2>
</div>

<form action="/pinjam/create" method="post" class="row justify-content-center g-3">
    @csrf
    <div class="col-1">
      <label for="BukuID" class="form-label">ID BUKU</label>

      <input type="text" class="form-control @error('BukuID')
is-invalid
      @enderror" id="BukuID" name="BukuID" value="{{ $post->id }}" readonly>
      @error('BukuID')
      <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-3">
        <div class="mb-3">
            <label for="tgl_kembali" class="form-label">Tanggal Pengembalian</label>
            <input type="date" class="form-control @error('date_back')
is-invalid
            @enderror" id="daterent" name="date_back"  value="{{ date('Y-m-d', strtotime('+3 days')) }}" readonly>
            @error('date_back')
            <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
        </div>

        <div class="mb-3">
            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control @error('date_rent')
is-invalid
            @enderror" id="tgl_pinjam" name="date_rent" value="{{ date('Y-m-d') }}" readonly>
            @error('date_rent')
            <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Judul buku</label>
            <input type="text" class="form-control" id="title" name="" value="{{ $post->title }}" disabled >
        </div>
    <button class="btn btn-primary  py-10 mt-3" type="submit">Pinjam Buku</button>
</div>
  </form>

@endsection
