<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
    

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>لوحه التحكم</span>
                    </a>
                </li>

               
    @if (auth()->user()->hasRole('super_admin'))
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>الموظفين</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{route('user.index')}}">عرض الموظفين</a></li>
            <li><a href="{{route('role.index')}}">عرض الوظاءف</a></li>
        </ul>
    </li>        
    @endif


    @if (auth()->user()->hasRole('super_admin'))
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>المستوردين</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{route('importer.index')}}">عرض المستوردين</a></li>
            <li><a href="{{route('importer.create')}}">اضافه المستوردين</a></li>
        </ul>
    </li>        
    @endif





<li>
<a href="javascript: void(0);" class="has-arrow waves-effect">
    <i class="ri-mail-send-line"></i>
    <span>اسلام المعاملة</span>
</a>
<ul class="sub-menu" aria-expanded="false">
    <li><a href="#">About Page</a></li>
  <li><a href="#">About Multi Image</a></li>
  <li><a href="#">All Multi Image</a></li>
</ul>
</li>


<li>
<a href="javascript: void(0);" class="has-arrow waves-effect">
<i class="ri-mail-send-line"></i>
<span>اجراءات الجمارك</span>
</a>
<ul class="sub-menu" aria-expanded="false">
<li><a href="#">All Portfolio</a></li>
<li><a href="#">Add Portfolio</a></li>

</ul>
</li>

{{-- <li>
<a href="javascript: void(0);" class="has-arrow waves-effect">
<i class="ri-account-circle-line"></i>
<span>Blog Category</span>
</a>
<ul class="sub-menu" aria-expanded="false">
<li><a href="#">All Blog Category</a></li>
<li><a href="#">Add Blog Category</a></li>
</ul>
</li> --}}

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="ri-profile-line"></i>
        <span>سحب البوالص</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="#">All Blog</a></li>
        <li><a href="#">Add Blog</a></li>
        
    </ul>
</li>


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