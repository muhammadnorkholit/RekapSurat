@extends('layout.index')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Data </h4>
        </div>
        <div class="card-body">
            <form action="/admin/rekap/{{ $rekap->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Siswa</label>
                        <select name="id_siswa" class="form-control form-autocompelet" id="">
                            <option value="" disabled>pilih siswa</option>
                            <option value="{{ $rekap->id_siswa }}" selected>{{ $rekap->siswa->nama_lengkap }}</option>
                            @foreach ($siswa as $s)
                                <option value="{{ $s->id }}">{{ $s->nama_lengkap }}</option>
                            @endforeach
                        </select>
                        @error('id_siswa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Keterangan</label>
                        <select name="status" class="form-control" id="">
                            <option value="" disabled>pilih keterangan</option>
                            <option value="{{ $rekap->status }}" selected>{{ $rekap->status }}</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                            <option value="alpa">Alpa</option>
                            <option value="terlambat">Terlambat</option>

                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb3 col-lg4">
                        <label for="" class="w-100">Unggah Foto</label>
                        <input type="file" class="form-control" name="foto_surat">
                        @error('foto_surat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection
