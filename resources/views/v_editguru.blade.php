@extends('template')
@section('content')
    <div class="container ml-3">
        <form action="/guru/update/{{ $guru->id_guru }} " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input class="form-control @error('nip') is-invalid @enderror" type="text" id="nip" name="nip"
                            value="{{ $guru->nip }} " readonly>
                        <div class="invalid-feedback">
                            @error('nip')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control @error('nama_guru') is-invalid @enderror" type="text" id="nama"
                            name="nama_guru" value=" {{ $guru->nama_guru }} ">
                        <div class="invalid-feedback">
                            @error('nama_guru')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <input class="form-control @error('mapel') is-invalid @enderror" type="text" id="mapel" name="mapel"
                            value=" {{ $guru->mapel }} " ">
                                    <div class=" invalid-feedback">
                        @error('mapel')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <img src="{{ url('images/'.$guru->foto_guru) }}" width="100">
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="gambar">Gambar</label><br>
                            <input class="@error('foto_guru') is-invalid @enderror" type="file" id="gambar" name="foto_guru"
                                value=" {{ $guru->foto_guru }} ">
                                <div class=" invalid-feedback">
                            @error('foto_guru')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button class="btn btn-primary">Update</button>
            </div>
    </div>
    </div>

    </form>
    </div>
@endsection
