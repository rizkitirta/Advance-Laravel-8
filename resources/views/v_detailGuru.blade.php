@extends('template')
@section('content')
	

<table class="table">
	<tr>
		<th width="200">NIP</th>
		<th width="30">:</th>
		<th> {{ $guru->nip }} </th>
	</tr>
	<tr>
		<th width="200">Nama</th>
		<th width="30">:</th>
		<th> {{ $guru->nama_guru }} </th>
	</tr>
	<tr>
		<th width="200">Mata Pelajaran</th>
		<th width="30">:</th>
		<th> {{ $guru->mapel }} </th>
	</tr>
	<tr>
		<th width="200">NIP</th>
		<th width="30">:</th>
		<th> <img src="{{ url('images/'.$guru->foto_guru) }}" width="200"> </th>
	</tr>
	<tr>
		<th><a href="/guru" class="btn btn-sm btn-primary">Back</a></th>
	</tr>
</table>






@endsection