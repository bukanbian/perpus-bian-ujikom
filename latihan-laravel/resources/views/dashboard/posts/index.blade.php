@extends('dashboard.layout.mainly')

@section('brianly')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Books</h1>
  </div>
  @if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
  @endif
  <div class="table-responsive">

@can('user')
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Book</th>
            <th scope="col">Rent date</th>
            <th scope="col">Rent back</th>
            <th scope="col">Actually back</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($books as $post)
      <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->rent_book->title }}</td>
          <td>{{ $post->date_rent }}</td>
          <td>{{ $post->date_back }}</td>
          @if ($post->actually_date != null)
          <td>{{ $post->actually_date }}</td>
          @else
          <td>You haven't returned the book yet</td>
          @endif
          @if ($post->actually_date != null)

          <td><a href="/dashboard/posts/{{ $post->rent_book->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/ulasan/{{ $post->rent_book->slug }}" class="badge bg-warning-subtle"></a>
        </td>
          @else

          <td><a href="/dashboard/posts/{{ $post->rent_book->slug }}" class="badge bg-info"><span data-feather="eye"></span></a></td>
          @endif
      </tr>
      @endforeach
    </tbody>
  </table>
  @endcan


@can('admin')
<a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Book</a>
<a href="/dashboard/print" class="btn btn-primary mb-3">Print</a>

<table id="example" class="table table-striped table-sm display">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Author</th>
            <th scope="col">Publisher</th>
          <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($post as $post)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td>{{ $post->author }}</td>
            <td>{{ $post->publisher }}</td>
            <td><a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                </form>
                </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Books Rent</h1>
      </div>
    <table class="table table-striped table-sm display">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book</th>
                <th scope="col">Username Rent</th>
                <th scope="col">Rent Date</th>
                <th scope="col">Back Date</th>
                <th scope="col">Actually Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($book_r as $post)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->rent_book->title }}</td>
              <td>{{ $post->rent_user->name }}</td>
              <td>{{ $post->date_rent }}</td>
              <td>{{ $post->date_back }}</td>
              @if ($post->actually_date != null)
              <td>{{ $post->actually_date }}</td>
              @else
              <td>User haven't returned the book yet</td>
              @endif
              <td><a href="/dashboard/posts/{{ $post->rent_book->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <form action="/dashboard/Books/{{ $post->rent_book->slug}}" method="POST">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <input type="hidden" name="BukuID" value="{{ $post->rent_book->id }}">
                    <input type="hidden" name="status" value="in stock">
                    <input type="hidden" name="actually_date" value="{{ date('Y-m-d') }}">
                    <button class="badge bg-warning border-0"><span data-feather="rotate-ccw"></span></button>
                </form>
                </td>
          </tr>
          @endforeach
        </tbody>
    </table>
    @endcan
  </div>

@endsection

