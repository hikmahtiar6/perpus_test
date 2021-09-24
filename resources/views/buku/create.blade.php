@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tambah Buku') }}</div>

                <div class="card-body">
                    <form action="{{ route('buku.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Kode Buku</label>
                            <input class="form-control" name="kdbuk" type="text" required>
                        </div>

                        <div class="form-group">
                            <label>Judul</label>
                            <input class="form-control" name="judbuk" type="text" required>
                        </div>

                        <div class="form-group">
                            <label>Pencipta Buku</label>
                            <select class="form-control" name="pencibuk" required>
                                @foreach ($pencipta as $item)
                                    <option value="{{ $item->pencipta_id }}">{{ $item->pencipta_nama }}</option>                                    
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input class="form-control" name="thnbuk" type="number" value="{{ date('Y', strtotime(now('Y'))) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Qty</label>
                            <input class="form-control" name="qty" type="number" required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Simpan</button>
                            <a class="btn btn-default" href="{{ route('buku.index') }}">Kembali</a>
                        </div>

                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
