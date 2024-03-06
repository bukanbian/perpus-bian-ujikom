@extends('layout.mainly')

@section('brianly')
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/blog">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">

            @endif
            @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">

            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="search.." name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">Search</button>
              </div>
        </form>
    </div>
</div>

@if ($posts->count())
<div class="card mb-3">
    @if ($posts[0]->image)
    <div style="max-height: 350px; overflow:hidden;">

        <img src="{{ asset('storage/'. $posts[0]->image) }}" class="img-fluid" alt="{{ $posts[0]->category->name }}" >
    </div>
    @else
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
    @endif
    <div class="card-body text-center">
      <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-reset text-decoration-none">{{ $posts[0]->title }}</a></h3>
      <p><small class="text-muted">By. <a href="/blog?author={{ $posts[0]->author }}" class="text-decoration-none">{{ $posts[0]->author }}</a> in <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</p></small>
      <p class="card-text">{{ $posts[0]->except }}</p>
      <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
      <a href="/pinjam/{{ $posts[0]->slug }}" class="btn btn-warning text-white">Pinjam buku</a>

    </div>
  </div>

<div class="container">

    <div class="row">
        @foreach ($posts->skip(1) as $p)

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.5)"><a href="/blog?category={{ $p->category->slug }}" class="text-decoration-none text-white">{{ $p->category->name }}</a></div>

                    @if ($p->image)
                        <img src="{{ asset('storage/'. $p->image) }}" class="card-img-top" alt="{{ $p->category->name }}" >
                    @else
                    <img src="https://source.unsplash.com/500x400?{{ $p->category->name }}" class="card-img-top" alt="{{ $p->category->name }}">
                    @endif
                <div class="card-body">
                  <h5 class="card-title">{{ $p->title }}</h5>
                  <p><small>By. <a href="/blog?author={{ $p->author }}" class="text-decoration-none">{{ $p->author }}</a> {{ $p->created_at->diffForHumans() }}</p></small>
                  <p class="card-text">{{ $p->excerpt }}</p>
                  <a href="/posts/{{ $p->slug }}" class="btn btn-primary">Read more</a>
                  @if ($p->status != 'in stock')
                  <p>the book is being rented</p>
                  @else
                  <a href="/pinjam/{{ $p->slug }}" class="btn btn-warning text-white">Rent the book</a>

                  @endif
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

@else
  <p class="text-center fs-3">No Book found.</p>
@endif

<div class="d-flex justify-content-center">
{{ $posts->links() }}
</div>

@endsection
