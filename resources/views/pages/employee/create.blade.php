@extends('pages.layouts.main')

@section('title', 'Data Pegawai')

@section('css')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Pegawai</h4>
                        <form action="{{ route('add-employees') }}" method="post">
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
                                <input type="text" class="form-control form-control-sm" placeholder="Nama Pegawai"
                                    name="name" required aria-label="Nama Pegawai">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select class="form-control form-control-sm" id="position_id" name="position_id">
                                    @foreach ($positions as $item)
                                        <option value="{{ $item->id }}" {{ old('id') == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control form-control-sm" id="gender" name="gender" required aria-label="Jenis Kelamin">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Alamat"
                                    name="address" required aria-label="Alamat">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon/Hp</label>
                                <input type="number" class="form-control form-control-sm" placeholder="Nomor Telepon/Hp"
                                    name="phone" required aria-label="Nomor Telepon/Hp">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Mulai Bekerja</label>
                                <input type="date" class="form-control form-control-sm"
                                    name="work_start_date" required aria-label="Tanggal Kerja">
                            </div>
                            <h5 style="margin-bottom: 10px">Rekening</h5>
                            <div class="form-group">
                                <label>Jenis Rekening</label>
                                <select class="form-control form-control-sm" id="bank_type" name="bank_type">
                                    <option value="BRI">BRI</option>
                                    <option value="Mandiri">Mandiri</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nomor Rekening</label>
                                <input type="number" class="form-control form-control-sm" placeholder="Nomor Rekening"
                                    name="account_number" required aria-label="Nomor Rekening">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Simpan
                                </button>
                                <a href="/employees" class="btn btn-warning btn-sm">
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
