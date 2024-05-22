@extends('web/Admin/layout')

@push('css')
    <link href="{{ URL::asset('admin-panel/assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('admin-panel/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('admin-panel/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('admin-panel/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('admin-panel/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush
@push('custom-scripts')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('admin-panel/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin-panel/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('admin-panel/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('admin-panel/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('admin-panel/assets/plugins/select2/js/select2.min.js') }}"></script>


    <script src="{{ URL::asset('admin-panel/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('admin-panel/assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('admin-panel/assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('admin-panel/assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('admin-panel/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('admin-panel/assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('admin-panel/assets/plugins/datatables/buttons.colVis.min.js') }}"></script>




    @include('include.pre_loader')
 <script>
    

    $('#datatable-buttons').DataTable({
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excel',
                text: 'Export to excel',
                className: 'btn btn-default',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                text: 'Export to pdf',
                className: 'btn btn-default',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            }
        ]
    });

 </script>
@endpush






@section('body_container')
    <div class="card m-b-20">
        <div class="card-body">
            @include('include.es_msg')

            <div class="row mb-3">
                <table id="datatable-buttons" class="table  table-bordered dt-responsive nowrap "
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Package Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Purchased By</th>
                            <th scope="col">Action</th>


                        </tr>
                    </thead>
                    @if (!empty($data))
                        <tbody>
                            <?php $increment = 1; ?>
                            @foreach ($data as $value)
                                <tr>
                                    <td>{{ $increment++ }}</td>
                                    <td> <a href="{{ route('user.dashboard.purchase-history.view-invoice', ['id' => $value['invoice_id']]) }}"  target="_blank" >{{ $value['invoice_plan'] }}</a></td>
                                    <td>${{ $value['invoice_amount'] }}</td>
                                    <td>
                                        {{ date('d-M-Y', strtotime($value['created_at'])) }}
                                    </td>
                                    <td>{{ $value['get_purchasers_detail']['name'] }}</td>
                                    <td style="text-align:center">
                                        <a href="{{ route('user.dashboard.purchase-history.download-invoice', ['id' => $value['invoice_id']]) }}"   class="btn btn-danger btn-sm">
                                            <i class="fa fa-download"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    @else
                        <tbody>
                            <tr>
                                <td style="text-align: center" colspan="4"> -- NO INVOICE YET -- </td>
                            </tr>
                        </tbody>
                    @endif
                </table>
            </div>
           


        </div>
    </div>
@endsection
