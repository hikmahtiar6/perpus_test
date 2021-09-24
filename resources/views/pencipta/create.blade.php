@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tambah Pencipta') }}</div>

                <div class="card-body">
                    <form action="{{ route('pencipta.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="pname" type="text" required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Simpan</button>
                            <a class="btn btn-default" href="{{ route('pencipta.index') }}">Kembali</a>
                        </div>

                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
