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
                        <h4 class="card-title">Data Pegawai</h4>
                        <div style="float: right">
                            <a href="/add-employees" class="btn btn-success btn-sm">
                                Tambah Data
                            </a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center" width="50">No.</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal Kerja</th>
                                        <th class="text-center" width="100">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->position->name }}</td>
                                        <td class="text-center"><?php echo date('l, d F Y', strtotime($item->work_start_date)) ?></td>
                                        <td>
                                            <a href="{{ route('show-employees', $item->id) }}" class="btn btn-info">
                                                Lihat
                                            </a>
                                            <a href="{{ route('edit-employees', $item->id) }}" class="btn btn-primary">
                                                Edit
                                            </a>
                                            <a href="{{ route('delete-employees', $item->id) }}" class="btn btn-danger">
                                                Hapus
                                            </a>
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
