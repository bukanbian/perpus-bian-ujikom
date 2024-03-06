@extends('layout.mainly')

@section('brianly')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2>{{ $post->title }}</h2>

            <p>By. <a href="/blog?author={{ $post->author }}" class="text-decoration-none">{{ $post->author }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

            @if ($post->image)
            <div style="max-height: 350px; overflow:hidden;">

                <img src="{{ asset('storage/'. $post->image) }}" class="img-fluid" alt="{{ $post->category->name }}" >
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">
            @endif
            <article class="my-3 fs-5">
            {!! $post->body !!}
            </article>
                <a href="/blog"><button type="button" class="btn btn-outline-info">back to blog</button></a>

        </div>
    </div>
</div>



@endsection
