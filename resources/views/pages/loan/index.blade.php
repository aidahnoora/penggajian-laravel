@extends('pages.layouts.main')

@section('title', 'Pinjaman')

@section('css')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pinjaman</h4>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center" width="50">No.</th>
                                        <th>Nama Pegawai</th>
                                        <th>Pinjaman</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-right">Rp <?php echo number_format($item->loan) ?></td>
                                        <td class="text-center"><?php echo date('d F Y', strtotime($item->updated_at)); ?></td>
                                        <td class="text-center">
                                            @if ($item->loan <= 0)
                                                <a href="{{ route('add-loans', $item->id )}}" class="btn btn-primary btn-sm">
                                                    Ajukan Pinjaman
                                                </a>
                                            @else
                                                <button class="btn btn-warning">Masih memiliki pinjaman</button>
                                            @endif
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
