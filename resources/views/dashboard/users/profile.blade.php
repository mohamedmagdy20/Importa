@extends('admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">


<div class="row ">
    <div class="col-lg-6 m-auto">
        <div class="card"><br><br>
<center>
            <img class="rounded-circle avatar-xl" src="{{url('upload/no_image.png') }}" alt="Card image cap">
</center>

            <div class="card-body">
                <h4 class="card-title">@lang('lang.email') : {{ auth()->user()->email }} </h4>
                <hr>
                <h4 class="card-title">@lang('lang.name') : {{ auth()->user()->name }} </h4>
                <hr>
                <h4 class="card-title">@lang('lang.phone') : {{ auth()->user()->phone }} </h4>
                <hr>
                @if (auth()->user()->hasRole('super_admin'))
                    <a href="{{route('user.edit',auth()->user()->id)}}" class="btn btn-info btn-rounded waves-effect waves-light" >@lang('lang.edit') @lang('lang.profile')</a>
                @endif
            </div>
        </div>
    </div> 
                            
        
                        </div> 


</div>
</div>

@endsection 
