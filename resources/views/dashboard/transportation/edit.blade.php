@extends('admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"> @lang('lang.transpot')</h4>
        </div>
    </div>
</div>             
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">@lang('lang.edit') @lang('lang.transpot') </h4>
            
            <form method="post" action="{{ route('transport.update',$transport->id) }}"  class="needs-validation"  novalidate >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.driver')</label>
                <div class="col-sm-11">
                    <select name="deiver_id"  class="js-example-basic-single form-control">
                      <option value="{{$transport->deiver_id}}" selected>{{$transport->driver->name}}</option>
                        @foreach ($drivers as $driver )
                            <option value="{{$driver->id}}">{{$driver->name}}</option>
                        @endforeach
                    </select>
                    @error('deiver_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>


            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.containers')</label>
                <div class="col-sm-11">
                    <select name="container_id"  class="js-example-basic-single form-control">
                       <option value="{{$transport->container_id}}" selected>{{$transport->container->container_num}}</option>
                        @foreach ($containers as $container )
                            <option value="{{$container->id}}">{{$container->container_num}}</option>
                        @endforeach
                    </select>
                    @error('container_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>


 
            <div class="row mb-3">
                <label for="release_date" class="col-sm-1 col-form-label">@lang('lang.container_date_out')</label>
                <div class="col-sm-11">
                    <input name="container_out_date" class="form-control" type="datetime-local" id="release_date" value="{{$transport->container_out_date}}" required>
                    @error('container_out_date')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
                <label for="release_date" class="col-sm-1 col-form-label">@lang('lang.receive_home_date')</label>
                <div class="col-sm-11">
                    <input name="arrive_date" class="form-control" type="datetime-local" id="release_date" value="{{$transport->arrive_date}}" required>
                    @error('arrive_date')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="release_date" class="col-sm-1 col-form-label">@lang('lang.leave_home_date')</label>
                <div class="col-sm-11">
                    <input name="leave_date" class="form-control" type="datetime-local" id="release_date" value="{{$transport->leave_date}}" required>
                    @error('leave_date')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="release_date" class="col-sm-1 col-form-label">@lang('lang.container_arrive_date')</label>
                <div class="col-sm-11">
                    <input name="container_arrive_date" class="form-control" type="datetime-local" id="release_date" value="{{$transport->container_arrive_date}}" required>
                    @error('container_arrive_date')
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

