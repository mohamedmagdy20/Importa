@extends('admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">اضافه المستوردين</h4>
        </div>
    </div>
</div>             
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">اضافة مستورد </h4>
            
            <form method="post" action="{{ route('importer.store') }}"  class="needs-validation"  novalidate >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">اسم المستورد (en)</label>
                <div class="col-sm-10">
                    <input name="name_en" class="form-control" type="text" id="example-text-input" placeholder="برجاء ادخال اسم المستورد بالغه الانجليزيه" required>
                    @error('name_en')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">اسم المستورد (ar)</label>
                <div class="col-sm-10">
                    <input name="name_ar" class="form-control" type="text" id="example-text-input" placeholder="برجاء ادخال اسم المستورد بالغه عريي" required>
                    @error('name_ar')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>


            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">رقم التسجيل التجاري</label>
                <div class="col-sm-10">
                    <input name="co_num" class="form-control" type="text" id="example-text-input" placeholder="برجاء ادخال الرقم التجاري " required>
                    @error('co_num')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->

               
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">رقم التسجيل الضريبي</label>
                <div class="col-sm-10">
                    <input name="tax_num" class="form-control" type="text" id="example-text-input" placeholder="برجاء ادخال رقم التسجيل الضريبي" required>
                    @error('tax_num')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الايميل</label>
                <div class="col-sm-10">
                    <input name="email" class="form-control" type="email" placeholder="برجاء ادخال الايميل" id="example-text-input">

                    @error('email')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->


            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">رقم الهاتف الاول </label>
                <div class="col-sm-10">
                    <input name="phone_num1" class="form-control" type="" id="example-text-input" placeholder="ex:54513" required>

                    @error('phone_num1')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">رقم الهاتف الثاني </label>
                <div class="col-sm-10">
                    <input name="phone_num2" class="form-control" type="" id="example-text-input"  placeholder="ex:54513">

                    @error('phone_num2')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            
        

       

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
