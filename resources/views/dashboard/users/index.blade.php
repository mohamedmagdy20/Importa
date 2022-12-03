@extends('admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">الموظفين</h4>
                                </div>
                            </div>
                        </div>

                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <a href="{{route('user.create')}}" class="btn btn-info">اضافه موظف
                                    </a>   
                                </div>
                            </div>
                        </div>                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">الموظفين</h4>
                    

                    <table id="datatable" class="table table-striped  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th></th>
                            <th>الاسم</th>
                            <th>الايميل</th>
                            <th>الوظيفه</th>
                            <th>العمليات</th>

                        </thead>


                        <tbody>
                        	@foreach($users as $key => $user)
                        <tr>
                            <td> {{ $key}} </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                            <td> @foreach ($user->roles as $role )
                               <p>{{$role->display_name}}</p> 
                            @endforeach
                            </td>        
                            <td>
                        <a href="{{ route('user.edit',$user->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                                    
                         <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            </td>
                           
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                     
                        
                    </div> <!-- container-fluid -->
                </div>
 

@endsection