@extends('template')
@section('content')
<a href="" class="m-3 btn btn-sm btn-primary">Print PDF</a>
	<table class="table table-bordered text-center">
		<thead>
			<tr>
				<th>No</th>
				<th>NIS</th>
				<th>Nama Siswa</th>
				<th>Kelas</th>
				<th>Mapel</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
           @foreach ($siswa as $data)
			   <tr>
				  <td> {{ $i++ }} </td>
				  <td> {{ $data->nis }} </td>
				  <td> {{ $data->nama_siswa }} </td>
				  <td> {{ $data->kelas }} </td>
				  <td> {{ $data->mapel }} </td>
			   </tr>
		   @endforeach
		</tbody>
	</table>
@endsection