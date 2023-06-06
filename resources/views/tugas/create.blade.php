@extends('templates.default')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('Tugas.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label class="form-label required">Kegiatan</label>
                <input type="text" name="kegiatan" class="form-control @error('kegiatan') is-invalid @enderror" placeholder="Kegiatan" value="{{old('kegiatan')}}">
                @error('kegiatan')
                    <span class="invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label required">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi" value="{{old('deskripsi')}}">
                @error('deskripsi')
                    <span class="invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label required">Status</label>
                <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="Status" value="{{old('status')}}">
                @error('status')
                    <span class="invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label required">Deadline</label>
                <input type="text" name="deadline" class="form-control @error('deadline') is-invalid @enderror" placeholder="Deadline" value="{{old('deadline')}}">
                @error('deadline')
                    <span class="invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tambahkan Foto</label>
                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" placeholder="photo" value="{{old('photo')}}">
                @error('photo')
                    <span class="invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="card-footer text-end">
                <div class="d-flex">
                  <a href="#" class="btn btn-link">Cancel</a>
                  <button type="submit" class="btn btn-primary ms-auto">Send data</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
