@extends('dashboard.layout.mainly')

@section('brianly')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Book</h1>
  </div>


  <div class="col-lg-8">
      <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
          <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" class="form-control @error('title')
                is-invalid
              @enderror" onkeyup="document.getElementById('autoslug').value = this.value.replace(/\s+/g, '-'  ).toLowerCase()" autofocus value="{{ old('title', $post->title) }}">
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
              @enderror" id="autoslug" required value="{{ old('slug', $post->slug) }}">
              @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
            </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="Category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                    @if (old('category_id',$post->category_id) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                  </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">cover</label>
                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                <input class="form-control @error('image')
                is-invalid
                @enderror" type="file" id="image" name="image"  onchange="preview()">
                @if ($post->image)

                <img class="img-preview img-fluid mt-3 col-sm-5" src="{{ asset('storage/'.$post->image) }}" id="frame" style="max-height: 500px; overflow:hidden">
                @else
                <img class="img-preview img-fluid mt-3 col-sm-5" src="" id="frame" style="max-height: 500px; overflow:hidden">
                @endif
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
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>
    </div>
    <button type="submit" class="btn btn-primary">Update Book</button>
</form>
</div>

<script>
    function preview() {
            frame.src=URL.createObjectURL(event.target.files[0]);
        }
</script>

@endsection

