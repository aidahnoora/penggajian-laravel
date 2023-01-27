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
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Pegawai</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->employee->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->employee->position->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->employee->gender }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->employee->address }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Telepon/Hp</label>
                                        <input type="number" class="form-control form-control-sm" value="{{ Auth::user()->employee->phone }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Mulai Bekerja</label>
                                        <input type="text" class="form-control form-control-sm" value="<?php echo date('l, d F Y', strtotime(Auth::user()->employee->work_start_date)) ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Rekening</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->employee->bank_type }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Rekening</label>
                                        <input type="number" class="form-control form-control-sm" value="{{ Auth::user()->employee->account_number }}" readonly>
                                    </div>
                                </div>
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
