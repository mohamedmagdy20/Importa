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
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <a href="{{route('importer.create')}}" class="btn btn-info">اضافه مستورد
                                    </a>   
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
                            <th>الاسم (ar)</th>
                            <th>الاسم (en)</th>
                            <th>رقم السجل التجاري</th>
                            <th>الرقم الضريبي</th>
                            <th>رقم الهاتف الاول</th>
                            <th>رقم الهاتف الثاني</th>
                            <th>الايميل</th>
                            <th>انشاء بواسطه</th>
                            <th>العمليات</th>
                        </thead>


                        <tbody>
                        	@foreach($importers as $key => $importer)
                        <tr>
                            <td> {{ $importer->name_ar }} </td>
                            <td> {{ $importer->name_en }} </td>

                            <td> {{ $importer->co_num }} </td>  
                            <td> {{ $importer->tax_num }} </td>        
                            <td> {{ $importer->phone_num1 }} </td>        
                            <td> {{ $importer->phone_num2 }} </td>        
                            <td> {{ $importer->email }} </td>      
                            <td> {{ $importer->user->name }} </td>      
                              
                            <td>
                                <a href="{{ route('importer.edit',$importer->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                <a href="{{ route('importer.delete',$importer->id) }}" class="btn btn-danger sm text-white" title="Delete" id="delete">  <i class="fas fa-trash-alt"></i> </a>
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