@extends('template')
@section('content')


    <!-- /.card-header -->
    <div class="card-body">
        @if (session('pesan'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{ session('pesan') }}
            </div>
        @endif
        <a href="/guru/add" class="btn btn-sm btn-primary">Add</a>
        <a href="/guru/cetak_pdf" target="_blank" class="btn btn-sm btn-success">Print Pdf</a>
        <table class="table table-bordered justify-content-center text-center mt-2">
            <thead class="bg-warning">
                <tr>
                    <th style="width: 10px">#</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Mata Pelajaran</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($guru as $data)
                    <tr>
                        <td> <?= $i++ ?> </td>
                            <td> {{ $data->nip }} </td>
                            <td> {{ $data->nama_guru }} </td>
                            <td> {{ $data->mapel }} </td>
             <td> 
               <img src=" {{ url('images/' . $data->foto_guru) }} " width="100"> </td>
             <td>
              <a href="/guru/edit/{{ $data->id_guru }}" class="btn btn-sm btn-warning">Edit</a>						
                                <a href=" /guru/detail/{{ $data->id_guru }} " class="btn btn-sm btn-primary">Detail</a>
                                 <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_guru }}">
                                    Delete
                                 </button>
             </td>
                        </tr>
            @endforeach        
                    </tbody>
                </table>
            </div>

             @foreach ($guru as $data)
              <div class="modal fade" id="delete{{ $data->id_guru }}">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content bg-secondary">
                    <div class="modal-header">
                      <h4 class="modal-title">{{ $data->nama_guru }}</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah Anda Yakin?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                      <a href="/guru/delete/{{ $data->id_guru }}" class="btn btn-sm btn-outline-light">Hapus</a>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

             @endforeach

            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="">1</a></li>
                    <li class="page-item"><a class="page-link" href="">2</a></li>
                    <li class="page-item"><a class="page-link" href="">3</a></li>
                    <li class="page-item"><a class="page-link" href="">&raquo;</a></li>
                </ul>
            </div>
            </div>
            <!-- /.card -->
@endsection
