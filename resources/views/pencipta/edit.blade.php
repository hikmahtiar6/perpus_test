@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Pencipta') }}</div>

                <div class="card-body">
                    <form action="{{ route('pencipta.update', encrypt($data->pencipta_id)) }}" method="POST">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <input class="form-control" name="pname" type="text" value="{{ $data->pencipta_nama }}" required>
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
