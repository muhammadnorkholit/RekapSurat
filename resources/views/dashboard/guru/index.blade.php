@extends('layout.index')


@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Guru</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Guru</div>
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <a href="/admin/guru/create" class="btn btn-success">Tambah Data</a>
                      <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#exampleModalCenter">
                        Import
                      </button>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>No</th>
                          <th>Nip</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Action</th>
                        </tr>
                        @foreach ($guru as $g)
                          <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $g->nip }}</td>
                          <td>{{ $g->nama_lengkap }}</td>
                          <td>{{ $g->jk == "l" ? 'laki-laki' : 'perempuan' }}</td>
                          <td>
                            <a href="/admin/guru/{{ $g->id }}/edit" class="btn btn-success">Edit</a>
                            <form class="d-inline" action="/admin/guru/{{ $g->id }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Unggah file di sini</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/import/guru" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="file" class="form-control" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Import</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
