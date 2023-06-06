@extends('templates.default')
@section('content')

<div class="col-12">
    <div class="card">
        <div class="mb3">
            <form action="">
                <div class="row">
                    <input type="text" name="search" class="form-control">
                    <input type="submit" value="cari" class="btn btn-primary">
                </div>
            </form>
        </div>
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>Kegiatan</th>
              <th>Deskripsi</th>
              <th>Status</th>
              <th>Dealine</th>
              <th>Foto</th>
              <th class="w-1"></th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tugass as $tugas)
                <tr>
                    <td>{{ $tugas->kegiatan }}</td>
                    <td>{{ $tugas->deskripsi }}</td>
                    <td>{{ $tugas->status }}</td>
                    <td>{{ $tugas->deadline }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$tugas->photo) }}" width="100px" alt="">
                    </td>
                    <td>
                        <form action="{{ route('Tugas.edit', $tugas) }}" method="POST">
                            @csrf
                            @method('GET')
                        <button class="btn btn-primary">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('Tugas.destroy', $tugas) }}" method="POST">
                        @csrf
                        @method('delete')
                            <button class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
          {{ $tugass->links()}}
  </div>

@endsection
