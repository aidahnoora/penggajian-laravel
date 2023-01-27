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
                        <h4 class="card-title text-white">Penggajian</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <form method="get" class="form-inline">
                            <div class="row" style="margin-left: 12px">
                                <div class="form-group">
                                    <label class="col-sm-2">Bulan</label>
                                    <div class="col-sm-3">
                                        <select class="form-control form-control-sm" id="month" name="month">
                                            <option value="" selected>Pilih Bulan</option>
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
                                            <option value="" selected>Pilih Tahun</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Pegawai</label>
                                    <div class="col-sm-3">
                                        <select class="form-control form-control-sm" id="employee_id" name="employee_id">
                                            <option value="" selected>Pilih Pegawai</option>
                                            @foreach ($employees as $item)
                                                <option value="{{ $item->id }}" {{ old('id') == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Tampilkan Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center" width="50">No.</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jabatan</th>
                                        <th>Pinjaman</th>
                                        <th>Potongan</th>
                                        <th>Gaji</th>
                                        <th>Bulan dan Tahun</th>
                                        <th>No. Rekening</th>
                                        <th>Cetak Slip</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salaries as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td class="text-center">{{ $item->employee->name }}</td>
                                        <td class="text-center">{{ $item->employee->position->name }}</td>
                                        <td class="text-right">Rp <?php echo number_format($item->remaining_loan) ?></td>
                                        <td class="text-right">Rp <?php echo number_format($item->salary_cut) ?></td>
                                        <td class="text-right">Rp <?php echo number_format($item->nominal) ?></td>
                                        <td class="text-center">{{ $item->month }}, {{ $item->year }}</td>
                                        <td class="text-center">{{ $item->employee->account_number }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('slip', $item->id) }}" class="btn btn-info">Cetak</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#data-table').DataTable();
        } )
    </script>
@endsection
