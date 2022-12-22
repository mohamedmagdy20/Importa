@extends('admin_master')
@section('admin')

 <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">@lang('lang.employees')</h4>
                                </div>
                            </div>
                        </div>

                        <!-- end page title -->
                        <div class="row">
                            <div class="col-6">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <a href="{{route('user.create')}}" class="btn btn-info">@lang('lang.add') @lang('lang.employees')
                                    </a>   
                                </div>
                            </div>
                        </div>                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">@lang('lang.employees')</h4>
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <button type="button" class="btn btn-dark" id="download">PDF</button>
                    </div>
               
                    <table id="UserTable" class="table table-striped  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>@lang('lang.name')</th>
                            <th>@lang('lang.email')</th>
                            <th>@lang('lang.phone')</th>

                            <th>@lang('lang.roles')</th>
                            <th>@lang('lang.actions')</th>

                        </thead>


                        <tbody>
                        	{{-- @foreach($users as $key => $user)
                        <tr>
                            <td> {{ $key}} </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                            <td> {{ $user->phone }} </td>

                            <td> @foreach ($user->roles as $role )
                               <p>{{$role->display_name}}</p> 
                            @endforeach
                            </td>        
                            <td>
                        <a href="{{ route('user.edit',$user->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                                    
                         <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            </td>
                           
                        </tr>
                        @endforeach --}}
                        
                        </tbody>
                    </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                     
                        
                    </div> <!-- container-fluid -->
                </div>
 

@endsection


@section('script')
<script>

    let ImporterTable = null
function setTransactionsDatatable() {
    var url = "{{ route('user.get_data') }}";
    TransactionsTable = $("#UserTable").DataTable({
        processing: true,
        serverSide: true,
        dom: 'Blfrtip',
        lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],
        pageLength: 9,
        buttons: [
           {
                        extend: 'copy',
                        className: 'btn btn-light'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-light'
                    },
                    {
                        extend: 'csv',
                        charset: 'UTF-16LE',
                        fieldSeparator: '\t',
                        bom: true ,
                        className: 'btn btn-light'
                    },
        ],
        sorting: [0, "DESC"],
        ordering: false,
        ajax: url,
        drawCallback: function(settings) {
     
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                    
        },
        language: {
            paginate: {
                "previous": "<i class='mdi mdi-chevron-left'>",
                "next": "<i class='mdi mdi-chevron-right'>"
            },
        },
        columns: [{
                data: 'name'
            },
            {
                data: 'email'
            },
            {
                data: 'phone'
               
            },
            {
                data: 'roles'
            },
            {
                data: 'action'
            },
          
        ],
    });
}
$(function() {
    setTransactionsDatatable();
});

window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("UserTable");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: ,
                filename: 'employees.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}

</script>

@endsection
