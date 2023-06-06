@extends('templates.default')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('Tugas.update', $tugas->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label for="" class="required form-label">Kegiatan</label>
                    <input type="text" name="kegiatan" class="form-control @error('kegiatan') is-invalid @enderror" placeholder="Kegiatan" value="{{ $tugas->kegiatan }}">
                    @error('kegiatan')
                        <span class="invalid-feedback">{{ $message }} </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="required form-label">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi" value="{{ $tugas->deskripsi}}">
                    @error('deskripsi')
                        <span class="invalid-feedback">{{ $message }} </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="required form-label">Status</label>
                    <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="Status" value="{{$tugas->status}}">
                    @error('status')
                        <span class="invalid-feedback">{{ $message }} </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="required form-label">Deadline</label>
                    <input type="text" name="deadline" class="form-control @error('deadline') is-invalid @enderror" placeholder="Deadline" value="{{$tugas->deadline}}">
                    @error('deadline')
                        <span class="invalid-feedback">{{ $message }} </span>
                    @enderror
                </div>

                    <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-info">
                </div>
        </form>
    </div>
</div>
@endsection
