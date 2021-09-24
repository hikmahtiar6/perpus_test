@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar Buku') }}</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    {{$dataTable->table()}}
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    {{$dataTable->scripts()}}
@endpush
@endsection
