@extends('pages.layouts.main')

@section('title', 'Penggajian')

@section('css')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-white">Input Data Gaji</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('add-salaries') }}" method="post" class="form-inline">
                            @csrf

                            @foreach ($employees as $e)
                                <?php
                                    $gaji = $e->position->salary;
                                    $transport = $e->position->transport_allowance;
                                    $makan = $e->position->meal_allowance;
                                    $potongan = $e->loan;

                                    $total_gaji = $gaji + $transport + $makan;

                                    if ($potongan < $total_gaji) {
                                        $total = $total_gaji - $potongan;

                                        $potongan_pinjaman = $potongan;
                                        $loan = 0;
                                    } else {
                                        $total = 20 / 100 * $total_gaji;

                                        $potongan_pinjaman = 80 / 100 * $total_gaji;
                                        $loan = $potongan - $potongan_pinjaman;
                                    }
                                ?>
                                    <input type="hidden" name="employee_id[]" value="{{ $e->id }}">
                                    <input type="hidden" name="nominal[]" value="{{ $total }}">
                                    <input type="hidden" name="salary_cut[]" value="{{ $potongan_pinjaman }}">
                                    <input type="hidden" name="remaining_loan[]" value="{{ $loan }}">

                                    <input type="hidden" name="loan[]" value="{{ $loan }}">
                            @endforeach

                            <div class="row" style="margin-left: 12px">
                                <div class="form-group">
                                    <label class="col-sm-2">Bulan</label>
                                    <div class="col-sm-3">
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
                                <div class="form-group">
                                    <label class="col-sm-2">Tahun</label>
                                    <div class="col-sm-3">
                                        <select class="form-control form-control-sm" id="year" name="year">
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-left: 60px">Input Gaji</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
