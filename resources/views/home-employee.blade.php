@extends('pages.layouts.main')

@section('title', 'Dashboard')

@section('css')

@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome {{ Auth::user()->employee->name }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-4 text-center">
                <img style="width: 150px" src="{{ asset('skydash/images/dashboard/profile2.png') }}">
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <td width="30%">Nama Pegawai</td>
                        <td width="20%">:</td>
                        <td>{{ Auth::user()->employee->name }}</td>
                    </tr>

                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{ Auth::user()->employee->position->name }}</td>
                    </tr>

                    <tr>
                        <td>Tanggal Masuk</td>
                        <td>:</td>
                        <td><?php echo date('d-M-Y', strtotime(Auth::user()->employee->work_start_date)) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
