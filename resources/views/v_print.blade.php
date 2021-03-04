@extends('template')
@section('content')
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: 2/10/2014</small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice #007612</b><br>
                <br>
                <b>Order ID:</b> 4F3S8J<br>
                <b>Payment Due:</b> 2/22/2014<br>
                <b>Account:</b> 968-34567
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
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
                        <tr>
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
                                </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.col -->
                          </div>

                          <!-- this row will not appear when printing -->
                          <div class="row no-print">
                            <div class="col-12">
                              <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                              <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                Payment
                              </button>
                              <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                              </button>
                            </div>
                          </div>
                        </div>
@endsection
