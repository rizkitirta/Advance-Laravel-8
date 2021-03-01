@extends('template')
@section('content')
    <div class="container ml-3">
        <form action="/guru/insert" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input class="form-control @error('nip') is-invalid @enderror" type="text" id="nip" name="nip" value=" {{ old('nip') }} ">
                        <div class="invalid-feedback">
                            @error('nip')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control @error('nama_guru') is-invalid @enderror" type="text" id="nama"
                            name="nama_guru" value=" {{ old('nama_guru') }} ">
                        <div class="invalid-feedback">
                            @error('nama_guru')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <input class="form-control @error('mapel') is-invalid @enderror" type="text" id="mapel"
                            name="mapel" value=" {{ old('mapel') }} ">
                        <div class="invalid-feedback">
                            @error('mapel')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label><br>
                        <input class="@error('foto_guru') is-invalid @enderror" type="file" id="gambar" name="foto_guru" >
                        <div class="invalid-feedback">
                            @error('foto_guru')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
