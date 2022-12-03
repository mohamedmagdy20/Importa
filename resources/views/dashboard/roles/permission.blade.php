@extends('admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">تعديل الصلاحيات </h4>
            
            <form method="post" action="{{ route('role.update.permission',$role->id) }}"  class="needs-validation"  novalidate >
                @csrf

            <div class="row mb-3">
                @foreach ($permissions as $permission)
                <div class="col-md-4 bg-white">
                    <div class="">
                        <div class="checkbox checkbox-primary mb-2">
                            <input id="{{ $permission->id }}" type="checkbox"
                                {{ $role->hasPermission($permission->name) ? 'checked' : '' }}
                                value="{{ $permission->id }}" name="permissions[]" class="form-check-input" >
                            <label for="{{ $permission->id }}">{{ $permission->display_name }}</label>
                        </div>
                    </div>
                </div> <!-- end col-->
            @endforeach
            </div>

            
            <!-- end row -->

<input type="submit" class="btn btn-info waves-effect waves-light validate" value="تعديل">
            </form>
             
           
           
        </div>
    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>


<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection 
