@extends('admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">@lang('lang.edit') @lang('lang.custom_procedures')</h4>
        </div>
    </div>
</div>             
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">@lang('lang.edit') @lang('lang.custom_procedures')</h4>
            
            <form method="post" action="{{ route('custom_procdure.update',$custom_procedures->id) }}"  class="needs-validation"  novalidate >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.procedure_num')</label>
                <div class="col-sm-11">
                    <input name="procedure_num" class="form-control" value="{{$custom_procedures->procedure_num}}" type="text" id="example-text-input"  required>
                    @error('procedure_num')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.custom_port')</label>
                <div class="col-sm-11">
                    <select name="transaction_id" id="" class="form-control">
                        <option value="{{$custom_procedures->transaction_id}}">{{$custom_procedures->transaction->release_number}}</option>
                        @foreach ($transactions as $transaction )
                            <option value="{{$transaction->id}}">{{$transaction->release_number}}</option>
                        @endforeach
                    </select>
                    @error('transaction_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-1 col-form-label">@lang('lang.notes')</label>
                <div class="col-sm-11">
                    <textarea name="notes" class="form-control" id="" cols="30" rows="10">{{$custom_procedures->notes}}</textarea>
                    @error('notes')
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
