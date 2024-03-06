@extends('layout.mainly')

@section('brianly')
<div class="row justify-content-center bg-dark rounded-5">
    <div class="col-md-4">
        <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 mt-3 fw-normal text-white">Form Registration</h1>
            <form action="/register" method="post">
                @csrf
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name')
                is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username')
                is-invalid  @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password')
                is-invalid  @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-floating">
                <input type="number" name="nik" class="form-control @error('nik')
                is-invalid  @enderror" id="nik" placeholder="+62 892" required value="{{ old('nik') }}">
                <label for="nik">NIK</label>
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email')
                is-invalid  @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-floating">
                    <select class="form-select" name="kelas">
                        @foreach ($kelas as $k)
                        <option value="{{ $k->kelas }}" selected>{{ $k->kelas }}</option>
                        @endforeach
                    </select>
                    <label for="kelas">Kelas</label>
                </div>
                <div class="form-floating">
                    <select class="form-select rounded-bottom" name="jurusan">
                        @foreach ($jurusan as $j)
                        <option value="{{ $j->jurusan }}" selected>{{ $j->jurusan }}</option>
                        @endforeach
                    </select>
                    <label for="Jurusan">Jurusan</label>
             </div>
              <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Register</button>
            </form>
            <small class="d-block text-end text-white mt-3">Already Registered? <a href="/login">Login Now!</a></small>
        </main>
    </div>
</div>


@endsection
