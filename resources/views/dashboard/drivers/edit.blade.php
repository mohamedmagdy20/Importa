@extends('admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">@lang('lang.edit') @lang('lang.driver')</h4>
        </div>
    </div>
</div>             
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">@lang('lang.edit') @lang('lang.driver')</h4>
            
            <form method="post" action="{{ route('driver.update',$driver->id) }}"  class="needs-validation"  novalidate >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.name')</label>
                <div class="col-sm-11">
                     <input name="name"  value="{{$driver->name}}" class="form-control" type="text" id="example-text-input"  required>
                    @error('name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.phone')</label>
                <div class="col-sm-11">
                    <input name="phone_num" class="form-control" type="text" id="example-text-input" value="{{$driver->phone_num}}" required>
                    @error('phone_num')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.notes')</label>
                <div class="col-sm-11">
                    <textarea name="notes" class="form-control" id="" cols="30" rows="10">{{$driver->notes}}</textarea>
                    @error('notes')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
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


@endsection 
