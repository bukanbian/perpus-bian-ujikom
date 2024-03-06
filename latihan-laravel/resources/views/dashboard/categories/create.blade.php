@extends('dashboard.layout.mainly')

@section('brianly')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Category</h1>
  </div>
  <div class="col-lg-8">
      <form method="post" action="/dashboard/categories" class="mb-5" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
              <label for="name" class="form-label">Name Category</label>
              <input type="text" name="name" class="form-control @error('name')
                is-invalid
              @enderror" onkeyup="document.getElementById('autoslug').value = this.value.replace(/\s+/g, '-'  ).toLowerCase()" autofocus value="{{ old('name') }}">
                @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
                @enderror
            </div>
          <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" name="slug" class="form-control @error('slug')
                is-invalid
              @enderror" id="autoslug" readonly required value="{{ old('slug') }}">
              @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
            </div>
              @enderror
            </div>


    <button type="submit" class="btn btn-primary">Create Category</button>
</form>
</div>
@endsection

