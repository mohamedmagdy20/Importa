@extends('admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">@lang('lang.containers')</h4>
                                </div>
                            </div>
                        </div>          
              
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" id="container">

                    <h4 class="card-title pb-2">@lang('lang.show') @lang('lang.containers') @lang('lang.transactions') @lang('lang.number') : {{$tranaction_num->release_number}}</h4>
                    
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <button type="button" class="btn btn-dark" id="download">PDF</button>
                    </div>
                    <table id="TransactionsTable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('lang.number')</th>
                            <th>@lang('lang.kind')</th>
                            <th>@lang('lang.transactions')</th>
                            <th>@lang('lang.date')</th>     
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
    let ImporterTable = null
function setTransactionsDatatable() {
    var url = "{{route('transaction.container.data',$transaction)}}";
    ImporterTable = $("#TransactionsTable").DataTable({
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
        columns: [
            {
                data:'DT_RowIndex'
            },
            {
                data: 'container_num'
            },
            {
                data:'width'
            },
            {
                data: 'transaction.release_number'
            },
            {
                data: 'received_date'
            }, 
            {
                data:'action'
            }         
        ],
    });
}
$(function() {
    setTransactionsDatatable();
});



window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("container");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin:0.1,
                filename: 'transaction.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'Landscape' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}

</script>

@endsection