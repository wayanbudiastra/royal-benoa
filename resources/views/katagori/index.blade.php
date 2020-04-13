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
                  <th>Nama Katagori</th>
                  <th>Keterangan</th>
                  <th>Aktif</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $d)
                  <tr>
                    <td>{{$d->id}}</td>
                    <td>{{$d->nama_katagori}}</td>
                    <td>{{$d->keterangan}}</td>
                    <td>{{$d->aktif}}</td>
                    <td><center><a href="{{url('/katagori/'.$d->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a></center></td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>ID</th>
                 <th>Nama Katagori</th>
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
    <form action="{{('/katagori/do_create')}}" method="POST">
            {{csrf_field()}}
       
         <div class="form-group">
          <label for="exampleInputEmail1">Nama Katagori</label>
          <input type="text" class="form-control" name="nama_katagori" id="nama" aria-describedby="emailHelp" placeholder="Nama Katagori">
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