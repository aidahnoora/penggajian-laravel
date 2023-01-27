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
                        <h4 class="card-title">Detail Pegawai</h4>
                        <form action="{{ route('edit-employees', $employees->id) }}" method="post">
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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Pegawai</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $employees->name}}"
                                            name="name" required aria-label="Nama Pegawai">
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select class="form-control form-control-sm" id="position_id" name="position_id">
                                            @foreach ($positions as $item)
                                                <option value="{{ $item->id }}" {{ $employees->position_id == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control form-control-sm" id="gender" name="gender" required aria-label="Jenis Kelamin">
                                            <option value="Laki-laki" {{ $employees->gender == 'Laki-laki' ? 'selected':'' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ $employees->gender == 'Perempuan' ? 'selected':'' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $employees->address }}"
                                            name="address" required aria-label="Alamat">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Telepon/Hp</label>
                                        <input type="number" class="form-control form-control-sm" value="{{ $employees->phone }}"
                                            name="phone" required aria-label="Nomor Telepon/Hp">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Mulai Bekerja</label>
                                        <input type="date" class="form-control form-control-sm" value="{{ $employees->work_start_date }}"
                                            name="work_start_date" required aria-label="Tanggal Kerja">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Rekening</label>
                                        <select class="form-control form-control-sm" id="bank_type" name="bank_type">
                                            <option value="BRI" {{ $employees->bank_type == 'BRI' ? 'selected':'' }}>BRI</option>
                                            <option value="Mandiri" {{ $employees->bank_type == 'Mandiri' ? 'selected':'' }}>Mandiri</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Rekening</label>
                                        <input type="number" class="form-control form-control-sm" value="{{ $employees->account_number }}"
                                            name="account_number" required aria-label="Nomor Rekening">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
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
