@extends('admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">@lang('lang.custom_procedures')</h4>
                                </div>
                            </div>
                        </div>          
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <a href="{{route('custom_procdure.create')}}" class="btn btn-info">@lang('lang.add') @lang('lang.custom_procedures')
                                    </a>   
                                </div>
                            </div>
                        </div>        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title pb-2">@lang('lang.show') @lang('lang.custom_procedures')</h4>
                    

                    <table id="CustomPortTable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>@lang('lang.procedure_num')</th>
                            <th>@lang('lang.release_number')</th>
                            <th>@lang('lang.date')</th>
                            <th>@lang('lang.created_by')</th>
                            <th>@lang('lang.notes')</th>
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
function setCustomProceduralsDatatable() {
    var url = "{{ route('custom_procdure.get_data') }}";
    CustomPortTable = $("#CustomPortTable").DataTable({
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
                data: 'procedure_num'
            },
            {
                data: 'transaction.release_number'
            },
            {
                data: 'updated_at'
            },
            {
                data:'user.name'
            },
            {
                data: 'notes'
            },
            {
                data: 'action'
            }
        ],
    });
}
$(function() {
    setCustomProceduralsDatatable();
});
</script>

@endsection