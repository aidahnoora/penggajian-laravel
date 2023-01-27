@extends('pages.layouts.main')

@section('title', 'Pinjaman')

@section('css')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajukan Pinjaman</h4>
                        <form action="{{ route('add-loans') }}" method="post">
                            @csrf

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
                                <label>Nama Pegawai</label>
                                <select class="form-control form-control-sm" id="employee_id" name="employee_id">
                                    @foreach ($employees as $item)
                                        <option value="{{ $item->id }}" {{ old('id') == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nominal Pinjaman</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white">Rp</span>
                                    </div>
                                    <input type="number" class="form-control" name="nominal" placeholder="Masukkan nominal" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Catatan" name="note">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-sm">
                                    Simpan
                                </button>
                                <a href="/positions" class="btn btn-warning btn-sm">
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
