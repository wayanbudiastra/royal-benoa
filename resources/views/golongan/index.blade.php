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
                @if(session('sukses'))
             <div class="alert alert-success" role="alert">
              {{session('sukses')}}
             </div>
             @endif
              <div class="row">
                <div class="col-md-12">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">add
              <br>
                </div>
              </div>

              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Kode</th>
                  <th>Nama Golongan</th>
                  <th>Margin (%)</th>
                  <th>Keterangan</th>
                  <th>Aktif</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $d)
                  <tr>
                    <td>{{$d->id}}</td>
                    <td>{{$d->kode}}</td>
                    <td>{{$d->nama_golongan}}</td>
                    <td>{{$d->margin}}</td>
                    <td>{{$d->keterangan}}</td>
                    <td>{{$d->aktif}}</td>
                    <td><center><a href="{{url('/golongan/'.$d->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a></center></td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>ID</th>
                 <th>Kode</th>
                  <th>Nama Golongan</th>
                  <th>Margin (%)</th>
                  <th>Keterangan</th>
                  <th>Aktif</th>
                  <th>Aksi</th>
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

          <!--Modal -->

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$subtitle}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="{{('/golongan/do_create')}}" method="POST">
            {{csrf_field()}}
        <div class="form-group">
          <label for="exampleInputEmail1">Kode</label>
          <input type="text" class="form-control" name="kode" id="nama" aria-describedby="emailHelp" placeholder="Kode">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Nama Golongan</label>
          <input type="text" class="form-control" name="nama_golongan" id="nama" aria-describedby="emailHelp" placeholder="Nama Golongan">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Margin Golongan</label>
          <input type="text" class="form-control" name="margin" id="nama" aria-describedby="emailHelp" placeholder="Margin">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Katerangan</label>
            <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="5"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submint" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
      <!-- /.box -->
</section>
@endsection
@section('footer')

<script>
$(document).ready(function() {
    $('#datatable').DataTable()
});
</script>
@endsection