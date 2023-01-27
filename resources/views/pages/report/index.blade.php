@extends('pages.layouts.main')

@section('title', 'Penggajian')

@section('css')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-white">Penggajian</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <form method="get">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Bulan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control form-control-sm" id="month" name="month">
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maret">Maret</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Agustus">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="Desember">Desember</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Tahun</label>
                                    <div class="col-sm-8">
                                        <select class="form-control form-control-sm" id="year" name="year">
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                        </select>
                                    </div>
                                </div>

                                <a href="#" onclick="this.href='/report/'+ document.getElementById('month').value +
                                    '/' + document.getElementById('year').value" style="width: 100%"
                                    type="submit" class="btn btn-primary">Cetak Laporan</a>
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
