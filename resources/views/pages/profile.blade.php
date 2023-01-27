@extends('pages.layouts.main')

@section('title', 'Profil')

@section('css')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->employee->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->employee->position->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->email }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->role }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
