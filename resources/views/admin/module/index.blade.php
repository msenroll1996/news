@extends('admin_master')
@section('heading')
Modules
@stop
@section('breadcrubm')
    <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item active">Modules</li>
@stop
@section('content')
 <div class="row">
    <div class="col-md-12">

      <div class="card">
          <div class="card-body table-responsive p-0">
              <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th> Module Title</th>
                          <th> Language</th>
                        <th>Action </th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php $i=1;
                        foreach ($datas as $row) { ?>
                          <tr>
                        <td><?php echo $i++ ;?></td>
                        <td><?php echo $row['title'];?></td>
                              <td></td>
                        <td><a href="{{ url('/admin/module/addnew/'.$row['title']) }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus"></i></a></td>
                      </tr>
                      <?php
                            foreach ($row['child'] as $value) { ?>
                              <tr>
                        <td></td>
                        <td><b><?php echo $value['title'];?></b></td>
                                  <td>{{$value['language']}}</td>
                        <td>
                          <a href="{{ url('/admin/module/edit/'.$value['id']) }}" class="btn btn-primary float-right mr-1 btn-sm"><i class="fa fa-edit"></i></a>
                          <a href="javascript:void(0);" onClick="confirm_delete('/{{$value['id']}}')" class="btn btn-danger float-right mr-1 btn-sm"><i class="fa fa-trash"></i></a>

                          <a href="{{ url('/admin/module/display/'.$value['id']) }}" class="btn btn-primary float-right mr-1 btn-sm">Display</a></td>
                      </tr>
                           <?php  }
                      ?>
                      <?php  }

                      ?>
                    </tbody>

                    </table>

          </div><!-- /.box-body -->
      </div>
    </div>
 </div>

@stop()
@section('script')
    <script type="text/javascript">

        function confirm_delete(ids){
            if(confirm('Do You Want To Delete This Module?')){
                var url= "{{ url('/admin/module/delete/') }}"+ids;
                location = url;

            }
        }

    </script>
@stop()
