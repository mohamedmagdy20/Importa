<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
    

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">@lang('lang.menu')</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>@lang('lang.dashboard')</span>
                    </a>
                </li>

               
    @if (auth()->user()->hasRole('super_admin'))
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>@lang('lang.employees')</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{route('user.index')}}">@lang('lang.show') @lang('lang.employees')</a></li>
            <li><a href="{{route('role.index')}}">@lang('lang.show') @lang('lang.roles')</a></li>
            <li><a href="{{route('driver.index')}}">@lang('lang.show') @lang('lang.driver')</a></li>
            <li><a href="{{route('shipment_agent.index')}}">@lang('lang.show') @lang('lang.shipment_agent')</a></li>
        
        </ul>
    </li>        
    @endif


    @if (auth()->user()->hasPermission('read_importers'))
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>@lang('lang.importer')</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{route('importer.index')}}">@lang('lang.show') @lang('lang.importer')</a></li>
            <li><a href="{{route('importer.create')}}">@lang('lang.add') @lang('lang.importer')</a></li>
        </ul>
    </li>        
    @endif

    @if (auth()->user()->hasPermission('read_customports'))
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>@lang('lang.custom_port')</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{route('customport.index')}}">@lang('lang.show') @lang('lang.custom_port')</a></li>
            <li><a href="{{route('customport.create')}}">@lang('lang.add') @lang('lang.custom_port')</a></li>
        </ul>
    </li>        
    @endif




@if (auth()->user()->hasPermission('read_transactions'))
<li>
<a href="javascript: void(0);" class="has-arrow waves-effect">
    <i class="ri-mail-send-line"></i>
    <span>@lang('lang.transactions')</span>
</a>
<ul class="sub-menu" aria-expanded="false">
    <li><a href="{{route('transaction.index')}}">@lang('lang.show') @lang('lang.transactions')</a></li>
    <li><a href="{{route('transaction.create')}}">@lang('lang.add') @lang('lang.transactions')</a></li>
</ul>
</li>
@endif

@if (auth()->user()->hasPermission('read_custom_procdures'))
<li>
<a href="javascript: void(0);" class="has-arrow waves-effect">
<i class="ri-mail-send-line"></i>
<span>@lang('lang.custom_procedures')</span>
</a>
<ul class="sub-menu" aria-expanded="false">
<li><a href="{{route('custom_procdure.index')}}">@lang('lang.show') @lang('lang.custom_procedures')</a></li>
<li><a href="{{route('custom_procdure.create')}}">@lang('lang.add') @lang('lang.custom_procedures')</a></li>
</ul>
</li>
@endif

@if (auth()->user()->hasPermission('read_drivers'))
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="ri-profile-line"></i>
        <span>@lang('lang.get') @lang('lang.release_number')</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{route('get_procedure.index')}}">@lang('lang.get') @lang('lang.release')</a></li>
        <li><a href="{{route('get_procedure.create')}}">@lang('lang.add') @lang('lang.get') @lang('lang.release')</a></li>
        
    </ul>
</li>
@endif

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="ri-profile-line"></i>
        <span>المحاسبه</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="#">Footer Setup</a></li>
         
        
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="ri-profile-line"></i>
        <span>النقليات</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="#">Footer Setup</a></li>
         
        
    </ul>
</li>

               
<li>
    <a href="{{route('logout')}}" class="waves-effect">
            <i class="ri-shut-down-line align-middle me-1 text-danger"></i>
            <span class="text-danger">خروج</span>
        
    </a>
</li>
                
             

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>