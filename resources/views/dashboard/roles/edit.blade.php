@extends('admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">تعديل الوظاءف </h4>
            
            <form method="post" action="{{ route('role.update',$role->id) }}"  class="needs-validation"  novalidate >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">اسم الوظيفة</label>
                <div class="col-sm-10">
                    <input name="display_name" class="form-control" type="text" value="{{$role->display_name}}" id="example-text-input" required>
                    @error('display_name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">وصف الوظيفة</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="" cols="30" rows="10" required>{{$role->description}}</textarea>
                    @error('description')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
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
