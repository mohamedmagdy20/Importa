@extends('admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"> @lang('lang.invoice')</h4>
        </div>
    </div>
</div>             
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">@lang('lang.add') @lang('lang.invoice') </h4>
            
            <form method="post" action="{{ route('accounting.store') }}"  class="needs-validation"  novalidate >
                @csrf

                
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.invoice')</label>
                <div class="col-sm-11">
                    <input name="invoice_number" class="form-control" type="text" id="example-text-input" value="" placeholder="@lang('lang.enter') @lang('lang.invoice')" required>
                    @error('invoice_number')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.procedure_num')</label>
                <div class="col-sm-11">
                    <select name="custom_procedure_id"  class="js-example-basic-single form-control">
                        @foreach ($CustomProcedure as $Custom )
                            <option value="{{$Custom->id}}">{{$Custom->procedure_num}}</option>
                        @endforeach
                    </select>
                    @error('custom_procedure_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>


 
            <div class="row mb-3">
                <label for="release_date" class="col-sm-1 col-form-label">@lang('lang.date')</label>
                <div class="col-sm-11">
                    <input name="release_date" class="form-control" type="date" id="release_date" placeholder="@lang('lang.enter') @lang('lang.date')" required>
                    @error('release_date')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->

<input type="submit" class="btn btn-info waves-effect waves-light validate" value="@lang('lang.add')">
            </form>
             
           
           
        </div>
    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>


@endsection 

