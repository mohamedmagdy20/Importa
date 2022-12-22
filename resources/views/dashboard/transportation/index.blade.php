@extends('admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">@lang('lang.transpot') </h4>
                                </div>
                            </div>
                        </div>          
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <a href="{{route('transport.create')}}" class="btn btn-info"> @lang('lang.add') @lang('lang.transpot') 
                                    </a>   
                                </div>
                            </div>
                        </div>        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title pb-2">@lang('lang.show') @lang('lang.transpot')</h4>
                    
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <button type="button" class="btn btn-dark" id="download">PDF</button>
                    </div>


                    <table id="AccountingTable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>@lang('lang.driver')</th>
                            <th>@lang('lang.containers')</th>
                            <th>@lang('lang.container_date_out')</th>
                            <th>@lang('lang.receive_home_date')</th>
                            <th>@lang('lang.leave_home_date')</th>
                            <th>@lang('lang.container_arrive_date')</th>
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
    var url = "{{ route('transport.get_data') }}";
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
                    // {
                    //     extend: 'pdf',
                    //     className: 'btn btn-light'
                    // },
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
                name:'driver.name',
                data: 'driver.name'
            },
            {
                name: 'container.container_num',
                data: 'container.container_num',
            },
            {
                name: 'container_out_date',
                data: 'container_out_date',
            },
            {
                name:'arrive_date',
                data:'arrive_date',
            },
            {
                name:'leave_date',
                data: 'leave_date',
            },
            {
                name:'container_arrive_date',
                data: 'container_arrive_date',
            },
            {
                name:'user.name',
                data: 'user.name',
            },
            {
                name:'action',
                data: 'action',
            },

        ],
    });
}
$(function() {
    AccountingDatatable();
});


window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("AccountingTable");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin:0.1,
                filename: 'transpotation.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'Landscape' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
</script>

@endsection