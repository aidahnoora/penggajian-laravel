@extends('pages.layouts.main')

@section('title', 'Data User')

@section('css')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('edit-users', $users->id) }}" method="post">
                            @csrf
                            @method('put')

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Oops!</strong> Kesalahan saat input data!
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Pegawai</label>
                                <select class="form-control form-control-sm" id="employee_id" name="employee_id">
                                    @foreach ($employees as $item)
                                        <option value="{{ $item->id }}" {{ $users->employee_id == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                                    value="{{ $users->email }}" autocomplete="email" name="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror"
                                    autocomplete="new-password" name="password">
                                <span style="font-size: 12px">*Kosongkan apabila tidak ingin mengganti password</span>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control form-control-sm" autocomplete="new-password"
                                    name="password_confirmation">
                                    <span style="font-size: 12px">*Kosongkan apabila tidak ingin mengganti password</span>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Simpan
                                </button>
                                <a href="/users" class="btn btn-warning btn-sm">
                                    Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
