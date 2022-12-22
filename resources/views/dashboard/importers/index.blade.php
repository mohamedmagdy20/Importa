@extends('admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">المستوردين</h4>
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

                    <h4 class="card-title pb-2">عرض المستوردين</h4>
                    
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <button type="button" class="btn btn-dark" id="download">PDF</button>
                    </div>

                    <table id="ImporterTable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                        	{{-- @foreach($importers as $key => $importer)
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
                         --}}
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
function setImporterDatatable() {
    var url = "{{ route('importer.get_data') }}";
    ImporterTable = $("#ImporterTable").DataTable({
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
                data: 'name_en'
            },
            {
                data: 'name_ar'
            },
            {
                data: 'co_num'
            },
            {
                data: 'tax_num'
            },
            {
                data: 'phone_num1'
            },
            {
                data: 'phone_num2'
            },
            {
                data: 'email'
            },
            {
                data: 'user.name'
            },
            {
                data: 'action'
            }
        ],
    });
}
$(function() {
    setImporterDatatable();
});


window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("ImporterTable");
            console.log(invoice);
            console.log(window);
            var opt = {
                padding:0.5,
                filename: 'importer.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
</script>

@endsection