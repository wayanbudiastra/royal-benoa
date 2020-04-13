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
                  @if(session('gagal'))
                 <div class="alert alert-danger" role="alert">
                {{session('gagal')}}
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
                  <th>Nama Produk</th>
                  <th>Katagori Produk</th>
                  <th>Subkatagori Produk</th>
                  <th>Keterangan</th>
                  <th>Aktif</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $d)
                  <tr>
                    <td>{{$d->id}}</td>
                    <td>{{$d->nama_produk}}</td>
                    <td>{{$d->katagori->nama_katagori}}</td>
                    <td>{{$d->sub_katagori->nama_subkatagori}}</td>
                    <td>{{$d->keterangan}}</td>
                    <td>{{$d->aktif}}</td>
                    <td><center><a href="{{url('/produk/'.$d->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a></center></td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>ID</th>
                 <th>Nama Produk</th>
                 <th>Katagori Produk</th>
                 <th>Subkatagori Produk</th>
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
    <form action="{{('/produk/do_create')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
       <div class="form-group">
          <label for="exampleInputEmail1">Barcode</label>
          <input type="text" class="form-control" name="barcode" id="nama" aria-describedby="emailHelp" placeholder="Barcode" required>
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Nama produk</label>
          <input type="text" class="form-control" name="nama_produk" id="nama" aria-describedby="emailHelp" placeholder="Nama produk" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Katagori</label>
         <select class="form-control select2" style="min-width:350px;" required id="idKatagori" name="katagori_id">
                          <option></option>         
                             @foreach($katagori as $a)
                              
                               <option value='{{$a->id}}' >{{$a->nama_katagori}}</option> 
                             @endforeach
            </select> 
        </div>
        <div class="form-group">
           <label for="exampleInputEmail1">Sub Katagori</label>
          <select class="form-control input-sm" name="subkatagori_id" id="idsubKatagori">
            <option value=""></option>
          </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Katerangan</label>
            <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="5"></textarea>
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Gambar</label>
          <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="emailHelp" placeholder="Gambar">
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
$('#idKatagori').select2({placeholder: "Pilh Katagori...", width: '100%'});
$('#idsubKatagori').select2({placeholder: "Pilh Sub Katagori...", width: '100%'});

</script>
<script type="text/javascript">
  $(document).ready(function(){
      $(document).on('change','#idKatagori',function(){
        $('#idsubKatagori').empty();
        var katagori_id=$(this).val();
        //console.log(id);
        $.ajax({ 
          type:'get',
          url:"{{url('/ajax-subkatagori')}}",
          data:{id:katagori_id},
          success:function(data){
            let op="";
            for(var i=0;i<data.length;i++){
            op+="<option value='"+data[i].id+"'>"+data[i].nama_subkatagori+"</option>";
            }
           $('#idsubKatagori').append(op);
          },
          error:function(){
            console.log('error');
          }
        });
      });
  });
</script>
@endsection