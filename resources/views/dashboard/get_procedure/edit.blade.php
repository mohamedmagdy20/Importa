@extends('admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">@lang('lang.get') @lang('lang.release')</h4>
        </div>
    </div>
</div>             
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">@lang('lang.add') @lang('lang.get') @lang('lang.release') </h4>
            
            <form method="post" action="{{ route('get_procedure.update',$getprocedure->id) }}"  class="needs-validation"  novalidate >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.importer')</label>
                <div class="col-sm-11">
                    <select name="custom_procedure_id"  class="js-example-basic-single form-control">
                        <option value="{{$getprocedure->custom_procedure_id}}" selected>{{$getprocedure->customProcedure->procedure_num}}</option>
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
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.shipment_agent')</label>
                <div class="col-sm-11">
                    <select name="shipment_agent_id"  class="js-example-basic-single form-control">
                        <option value="{{$getprocedure->shipment_agent_id}}" selected>{{$getprocedure->shipingAgent->name}}</option>
                        @foreach ($shippingAgent as $agent )
                            <option value="{{$agent->id}}">{{$agent->name}}</option>
                        @endforeach
                    </select>
                    @error('shipment_agent_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="arrive_date" class="col-sm-1 col-form-label">@lang('lang.arrive_date')</label>
                <div class="col-sm-11">
                    <input name="arrive_date" class="form-control" type="date" id="arrive_date" value="{{$getprocedure->arrive_date}}" required>
                    @error('shipment_agent_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->

<input type="submit" class="btn btn-info waves-effect waves-light validate" value="@lang('lang.edit')">
            </form>
             
           
           
        </div>
    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>


@endsection 

