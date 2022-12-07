@extends('admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">@lang('lang.add') @lang('lang.transactions')</h4>
        </div>
    </div>
</div>             
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">@lang('lang.add') @lang('lang.transactions')</h4>
            
            <form method="post" action="{{ route('transaction.store') }}"  class="needs-validation"  novalidate >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 2ol-form-label">@lang('lang.release_number')</label>
                <div class="col-sm-11">
                    <input name="release_number" class="form-control" type="text" id="example-text-input" placeholder="@lang('lang.enter') @lang('lang.release_number')" required>
                    @error('release_number')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.importer')</label>
                <div class="col-sm-11">
                    <select name="importer_id"  class="js-example-basic-single form-control">
                        @foreach ($importers as $importer )
                            <option value="{{$importer->id}}">{{$importer->name_en}}</option>
                        @endforeach
                    </select>
                    @error('importer_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.custom_port')</label>
                <div class="col-sm-11">
                    <select name="custom_port_id" id="" class="js-example-basic-single form-control">
                        @foreach ($custom_ports as $port )
                            <option value="{{$port->id}}">{{$port->name_en}}</option>
                        @endforeach
                    </select>
                    @error('custom_port_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="container_number" class="col-sm-1 col-form-label">@lang('lang.container_num')</label>
                <div class="col-sm-11">
                    <input name="con_num" class="form-control" type="number" id="container_number" value="0" onchange="contianer()" required>
                </div>
            </div>
            

            <div class="row mb-3" id="container_inputs">
               
            </div>

            <div class="row mb-3" id="width_inputs">
               
            </div>


            <div class="row mb-3">
                <label for="container_number" class="col-sm-1 col-form-label">@lang('lang.date')</label>
                <div class="col-sm-11">
                    <input name="received_date" class="form-control" type="date" id="container_number" placeholder="@lang('lang.enter') @lang('lang.date')" required>
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

@section('script')
<script>
    function contianer()
    {
        let inputval = $('#container_number').val();
      
        html = ''
        h =''
        for(let i = 0; i<inputval ; i++)
        {
            html += `
            <div class="col-sm-3 mb-2">
                <input name="container[]" class="form-control" type="number" id="container_number" placeholder="@lang('lang.enter') @lang('lang.number')" required>
            </div>
            `
            h +=`
            <div class="col-sm-3 mb-2">
                <select name="width[]" id="width" class="js-example-basic-single form-control">
                    <option value="40">40</option>
                    <option value="20">20</option>
                    <option value="package">طرود</option>
               
                    </select>
                </div>
           
            `
        }

        $('#container_inputs').html(html);
        $('#width_inputs').html(h);

    }
   </script>
@endsection