@extends('dashboard.layout.mainly')

@section('brianly')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Book</h1>
  </div>
  <div class="col-lg-8">
      <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" class="form-control @error('title')
                is-invalid
              @enderror" onkeyup="document.getElementById('autoslug').value = this.value.replace(/\s+/g, '-'  ).toLowerCase()" autofocus value="{{ old('title') }}">
                @error('title')
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

          <div class="mb-3">
              <label for="author" class="form-label">Author</label>
              <input type="text" name="author" class="form-control @error('author')
                is-invalid
              @enderror" required value="{{ old('author') }}">
              @error('author')
              <div class="invalid-feedback">
                {{ $message }}
            </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" name="publisher" class="form-control @error('publisher')
                  is-invalid
                @enderror" required value="{{ old('publisher') }}">
                @error('publisher')
                <div class="invalid-feedback">
                  {{ $message }}
              </div>
                @enderror
              </div>

            <div class="mb-3">
                <label for="Published_at" class="form-label">Published at</label>
                <input type="date" name="Published_at" class="form-control @error('Published_at')
                  is-invalid
                @enderror" required value="{{ old('Published_at') }}">
                @error('Published_at')
                <div class="invalid-feedback">
                  {{ $message }}
              </div>
                @enderror
              </div>

            <div class="mb-3">
                <label for="Category" class="form-label">Category</label>
                <select class="form-select @error('category_id')
is-invalid
                @enderror" name="category_id">
                    @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">cover</label>
                <input class="form-control @error('image')
                is-invalid
                @enderror" type="file" id="image" name="image"  onchange="preview()">
                <img class="img-preview img-fluid mt-3 col-sm-5" src="" id="frame" style="max-height: 500px; overflow:hidden">
                @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
              </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>
    </div>
    <button type="submit" class="btn btn-primary">Create Book</button>
</form>
</div>


<script>

function preview() {
            frame.src=URL.createObjectURL(event.target.files[0]);
        }

    function previewImage() {
        const image =document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataUrl(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }

    }
</script>

@endsection

