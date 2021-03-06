@extends('admin_master')
@section('heading')
Edit User Group
@stop
@section('breadcrubm')
    <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/usergroup') }}">User Groups</a></li>
    <li class="breadcrumb-item active">Edit User Groups</li>
@stop
@section('content')
 <div class="row">
    <div class="col-md-12">
        <div class="card">

                <div class="card-header">Edit User Group</div>
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ url('/admin/usergroup/update') }}">
                        <div class="card-body">

                               <input type="hidden" name="id" value="<?php echo $datas->id;?>" />
                                {!! csrf_field() !!}
                                <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('group_title') ? ' has-error' : '' }}">
                                            <label class="col-md-2 control-label">Group Title</label>

                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="group_title" value="{{ $datas->group_title }}">

                                                @if ($errors->has('group_title'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('group_title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="box box-primary">
                                            <div class="box-body" style="padding: 20px;">
                                        <div class="form-group">
                                            <label>Access Permission </label>
                                            <div style="background-color:#369; padding:5px; color:#FFF; font-weight:bold;">
                                                <input type="checkbox" name="chkall" onclick="chkAll('permission[]',this.checked)"> Select All </div>
                                            <?php
                                                $per=array();
                                                foreach ($access as $acc) {
                                                    $per[]=$acc->access_page;
                                                }


                                                foreach ($files as $file){


                                                    if(in_array($file['value'],$per)){
                                                ?>
                                                <div class="checkbox">
                                                    <label>
                                                         <input type="checkbox" checked="checked" name="permission[]" value="<?php  print $file['value'];?>" /> <?php print $file['title'];?>
                                                    </label>
                                                </div>

                                          <?php  } else { ?>
                                                <div class="checkbox">
                                                    <label>
                                                         <input type="checkbox" name="permission[]" value="<?php  print $file['value'];?>" /> <?php print $file['title'];?>
                                                    </label>
                                                </div>

                                          <?php }} ?>
                                        </div>
                                        </div>
                                        </div>
                                    </div>

                                   <div class="col-md-6">
                                       <div class="box box-primary">
                                           <div class="box-body" style="padding: 20px;">
                                               <div class="form-group">
                                                   <label>Access Permission </label>
                                                   <div style="background-color:#369; padding:5px; color:#FFF; font-weight:bold;">
                                                       <input type="checkbox" name="chkall" onclick="chkAll('editpermission[]',this.checked)"> Select All </div>
                                                   <?php
                                                   $editper=array();
                                                   foreach ($access as $acc) {
                                                       $editper[]=$acc->edit_page;
                                                   }


                                                   foreach ($files as $file){


                                                   if(in_array($file['value'],$editper)){
                                                   ?>
                                                   <div class="checkbox">
                                                       <label>
                                                           <input type="checkbox" checked="checked" name="editpermission[]" value="<?php  print $file['value'];?>" /> <?php print $file['title'];?>
                                                       </label>
                                                   </div>

                                                   <?php  } else { ?>
                                                   <div class="checkbox">
                                                       <label>
                                                           <input type="checkbox" name="editpermission[]" value="<?php  print $file['value'];?>" /> <?php print $file['title'];?>
                                                       </label>
                                                   </div>

                                                   <?php }} ?>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

        </div>

    </div>
</div>
@endsection
@section('javascript')
    <script src="{{asset('assets/dist/js/checkall.js')}}"></script>
@endsection
@section('script')
    <script type="text/javascript">
        function chkAll(name, value) {
// hardcoded form name
            var frm = document.getElementById('testform');
// get all inputs from the form into an array
            var inputs = frm.getElementsByTagName('input');

// loop through the form inputs
            for (var i=0; i<inputs.length;i++) {
//if the name matches, set the value to match the calling element
                if (inputs[i].name == name) {
                    inputs[i].checked = value;
                }
            }
        }
    </script>
@endsection
