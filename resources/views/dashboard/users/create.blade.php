@extends('admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">
       <!-- start page title -->
       <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">اضافه الموظفين</h4>
            </div>
        </div>
    </div>             

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">اضافة الموظفين </h4>
            
            <form method="post" action="{{ route('user.store') }}"  class="needs-validation"  novalidate >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">اسم الموظف</label>
                <div class="col-sm-10">
                    <input name="name" class="form-control" type="text" id="example-text-input" required>
                    @error('name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الايميل</label>
                <div class="col-sm-10">
                    <input name="email" class="form-control" type="text" id="example-text-input">

                    @error('email')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->


            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">كلمه المرور</label>
                <div class="col-sm-10">
                    <input name="password" class="form-control" type="password" id="example-text-input">

                    @error('password')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">تاكيد كلمه المرور</label>
                <div class="col-sm-10">
                    <input name="password_confirmation" class="form-control" type="password" id="example-text-input">

                    @error('password_confirmation')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                @foreach ($roles as $role)
                <div class="checkbox">
                    <label for="">
                        <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->name}}"> {{$role->display_name}}
                    </label>

                </div>
                @endforeach
            </div>

            <!-- end row -->

<input type="submit" class="btn btn-info waves-effect waves-light validate" value="اضافه">
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
