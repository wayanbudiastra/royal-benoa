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
             <form action="{{url('/katagori/'.$data->id.'/update')}}" class="form" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
       
         <div class="form-group">
          <label for="exampleInputEmail1">Nama katagori</label>
          <input type="text" class="form-control" name="nama_katagori" id="nama_katagori" aria-describedby="emailHelp" placeholder="Nama Katagori" value="{{$data->nama_katagori}}">
                </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">keterangan</label>
                <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="10">{{$data->keterangan}}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Aktif</label>
         @if($data->aktif=="Y")
          <div class="custom-control custom-radio">
          <input type="radio" id="customRadio1" name="aktif" class="custom-control-input"  value="Y" checked>
          <label class="custom-control-label" for="customRadio1">Y</label>
          </div>
          <div class="custom-control custom-radio">
          <input type="radio" id="customRadio2" name="aktif" class="custom-control-input"  value="N">
          <label class="custom-control-label" for="customRadio2">N</label>
          </div>
        @endif
        @if($data->aktif=="N")
          <div class="custom-control custom-radio">
          <input type="radio" id="customRadio1" name="aktif" class="custom-control-input"  value="Y" >
          <label class="custom-control-label" for="customRadio1">Y</label>
          </div>
          <div class="custom-control custom-radio">
          <input type="radio" id="customRadio2" name="aktif" class="custom-control-input"  value="N" checked>
          <label class="custom-control-label" for="customRadio2">N</label>
          </div>
        @endif
        
        </div>

            <div class="form-group">   
        <a href="{{('/katagori')}}"  class="btn btn-danger">Close</a>
        <button type="submint" class="btn btn-primary">Save</button>
        </div>
        </form>
          </div>
          <!-- /.card -->

          <!--Modal -->

      <!-- /.box -->
</section>
@endsection
@section('footer')

@endsection