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
             <form action="{{url('/produk/'.$data->id.'/update')}}" class="form" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
       
          <div class="form-group">
          <label for="exampleInputEmail1">Barcode</label>
          <input type="text" class="form-control" name="barcode" id="barcode" aria-describedby="emailHelp" placeholder="Barcode" value="{{$data->barcode}}">
          </div>
           <div class="form-group">
          <label for="exampleInputEmail1">Nama produk</label>
          <input type="text" class="form-control" name="nama_produk" id="nama_produk" aria-describedby="emailHelp" placeholder="Nama Produk" value="{{$data->nama_produk}}">
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Katagori</label>
          <select class="form-control select2" style="min-width:350px;" required id="idKatagori" name="katagori_id">
          <option></option>         
          @foreach($katagori as $a)
           <?php $selected='';?>
              @if($a->id==$data->katagori_id)
                <?php $selected='selected';?>
              @endif
          <option value='{{$a->id}}'{{$selected}}>{{$a->nama_katagori}}</option> 
          @endforeach
          </select> 
          </div>  

          <div class="form-group">
           <label for="exampleInputEmail1">Sub Katagori</label>
          <select class="form-control input-sm" name="sub_katagori_id" id="idsubKatagori">
            <option></option>         
            @foreach($subkatagori as $b)
              @if($b->id == $data->sub_katagori_id)
                <?php $selected='selected';?>
                <option value='{{$b->id}}'{{$selected}}>{{$b->nama_subkatagori}}</option>
              @endif
            @endforeach
          </select>
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

<script>

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