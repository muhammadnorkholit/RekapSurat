@extends('layout.index')


@section('content')
    <div class="card">
        <div class="card-header">
            <a href="/admin/kelas/create" class="btn btn-success">Tambah Kelas</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>No</th>
                        <th>Tingkatan</th>
                        <th>No Kelas</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($kelas as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->kelas }}</td>
                            <td>{{ $k->no_kelas }}</td>
                            <td>{{ $k->jurusan->nama_jurusan }}</td>
                            <td><a href="/admin/kelas/{{ $k->id }}/edit" class="btn btn-success">Edit</a>
                                <form class="d-inline" action="/admin/kelas/{{ $k->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                    @endforelse

                </table>
            </div>
        </div>
        {{ $kelas->links() }}

        <div class="card-footer text-right">
            <nav class="d-inline-block">
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>

                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
