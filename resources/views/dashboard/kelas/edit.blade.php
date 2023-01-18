@extends('layout.index')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Ubah Kelas</h4>
        </div>
        <div class="card-body">
            <form action="/admin/kelas/{{ $kelas->id }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Tingkatan</label>
                        <select name="tingkatan" class="form-control" id="">
                            <option disabled value="">Pilih Tingkatan</option>
                            <option selected value="{{ $kelas->tingkatan }}">{{ $kelas->tingkatan }}</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                        @error('tingkatan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">No kelas</label>
                        <select name="no_kelas" class="form-control" id="">
                            <option value="">Pilih No Kelas</option>
                            <option selected value="{{ $kelas->no_kelas }}">{{ $kelas->no_kelas }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        @error('no_kelas')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Jurusan</label>
                        <select name="id_jurusan" class="form-control" id="">
                            <option disabled value="">Pilih Jurusan</option>
                            <option selected value="{{ $kelas->id }}">{{ $kelas->jurusan->nama_jurusan }}</option>
                            @foreach ($jurusan as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                            @endforeach
                        </select>
                        @error('id_jurusan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Wali Kelas</label>
                        <select name="id_walikelas" class="form-control form-autocompelet" id="">
                            <option value="">Pilih Wali Kelas</option>
                            <option selected value="{{ $kelas->walikelas->id }}">
                                {{ $kelas->walikelas->nama_lengkap }}</option>
                            @foreach ($guru as $g)
                                <option value="{{ $g->id }}">{{ $g->nama_lengkap }}</option>
                            @endforeach
                        </select>
                        @error('id_walikelas')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Guru Bk</label>
                        <select name="id_bk" class="form-control form-autocompelet" id="">
                            <option value="">Pilih Guru Bk</option>
                            <option selected value="{{ $kelas->bk->id }}">
                                {{ $kelas->bk->nama_lengkap }}</option>
                            @foreach ($guru as $g)
                                <option value="{{ $g->id }}">{{ $g->nama_lengkap }}</option>
                            @endforeach
                        </select>
                        @error('id_bk')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Tahun Ajaran</label>
                        {{-- @dd($kelas->tahunAjaran) --}}
                        <select name="id_ajaran" class="form-control" id="">
                            <option value="">Pilih Tahun Ajaran</option>
                            <option selected value="{{ $kelas->tahunAjaran->id }}">
                                {{ $kelas->tahunAjaran->tahun_ajaran }}/
                                {{ $kelas->tahunAjaran->semester }}</option>
                            @foreach ($tahunAjaran as $ta)
                                <option value="{{ $ta->id }}">{{ $ta->tahun_ajaran }} {{ $ta->semester }}</option>
                            @endforeach
                        </select>
                        @error('id_ajaran')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection
