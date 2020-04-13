@extends('layouts.master')
@section('content')
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{$subtitle}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No CM</th>
                  <th>Nama Pasien</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Pekerjaan</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                 <th>No CM</th>
                  <th>Nama Pasien</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Pekerjaan</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
           </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
</section>
@endsection
@section('footer')

<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        processing:true,
        serverside:true,
        ajax:"{{route('ajax.get.data.pasien')}}",
        columns:[
            {data:'nocm',name:'nocm'},
            {data:'nama',name:'nama'},
            {data:'tanggal_indo',name:'tanggal_indo'},
            {data:'alamat',name:'alamat'},
            {data:'pekerjaan',name:'pekerjaan'}
        ]
    })
});
</script>
@endsection