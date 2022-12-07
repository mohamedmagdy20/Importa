@extends('admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">@lang('lang.accounting') </h4>
                                </div>
                            </div>
                        </div>          
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <a href="{{route('accounting.create')}}" class="btn btn-info"> @lang('lang.add') @lang('lang.invoice') 
                                    </a>   
                                </div>
                            </div>
                        </div>        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title pb-2">@lang('lang.add') @lang('lang.invoice')</h4>
                    

                    <table id="AccountingTable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>@lang('lang.invoice') @lang('lang.number')</th>
                            <th>@lang('lang.procedure_num')</th>
                            {{-- <th>@lang('lang.release_number')</th> --}}
                            <th>@lang('lang.date')</th>
                            <th>@lang('lang.created_by')</th>
                            <th>@lang('lang.actions')</th>
                        </thead>
                        <tbody>
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

    let CustomPortTable = null
function AccountingDatatable() {
    var url = "{{ route('accounting.get_data') }}";
    CustomPortTable = $("#AccountingTable").DataTable({
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
                        extend: 'pdf',
                        className: 'btn btn-light'
                    },
                    {
                        extend: 'csv',
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
                name:'invoice_number',
                data: 'invoice_number'
            },
            {
                name: 'customProcedure.procedure_num',
                data: 'custom_procedure.procedure_num',
            },
            {
                name: 'release_date',
                data: 'release_date',
            },
            {
                name:'user.name',
                data:'user.name',
            },
            {
                name:'action',
                data: 'action',
            }
        ],
    });
}
$(function() {
    AccountingDatatable();
});
</script>

@endsection