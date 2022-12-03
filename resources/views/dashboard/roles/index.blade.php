@extends('admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">الالقاب الوظيفيه</h4>
                                </div>
                            </div>
                        </div>                      
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">الوظاءف</h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th></th>
                            <th>الاسم</th>
                            <th>الوصف</th>
                            <th>العمليات</th>

                        </thead>


                        <tbody>
                        	@foreach($roles as $key => $role)
                        <tr>
                            <td> {{ $key}} </td>
                            <td> {{ $role->display_name }} </td>
                            <td> {{ $role->description }} </td>        
                            <td>
                                <a href="{{ route('role.edit',$role->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                <a href="{{ route('role.permission',$role->id) }}" class="btn btn-warning sm text-white" title="Permission">  <i class="fas fa-eye"></i> </a>

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