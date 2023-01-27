@extends('pages.layouts.main')

@section('title', 'Data Jabatan')

@section('css')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Jabatan</h4>
                        <div style="float: right">
                            <a href="/add-positions" class="btn btn-success btn-sm">
                                Tambah Data
                            </a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center" width="50">No.</th>
                                        <th>Nama Jabatan</th>
                                        <th>Gaji Pokok</th>
                                        <th>Insentif</th>
                                        <th>Uang Makan</th>
                                        <th class="text-center" width="100">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($positions as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-right">Rp {{ $item->salary }}</td>
                                        <td class="text-right">Rp {{ $item->transport_allowance }}</td>
                                        <td class="text-right">Rp {{ $item->meal_allowance }}</td>
                                        <td>
                                            <a href="{{ route('edit-positions', $item->id) }}" class="btn btn-primary">
                                                Edit
                                            </a>
                                            <a href="{{ route('delete-positions', $item->id) }}" class="btn btn-danger">
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
