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
    <script src="{{ URL::asset('admin-panel/assets/pages/datatables.init.js') }}"></script>

    <script>
        $(document).ready(function() {
            manageContacts();
        });
    </script>

    @include('include.pre_loader')
    {{-- @include('web.Admin.companies.includes.edit_company_modal') --}}
@endpush






@section('body_container')
    <div class="card m-b-20">
        <div class="card-body">
            @include('include.es_msg')
            <div class="dt-buttons btn-group">
                <a href="{{route('admin.contacts.add')}}"><button type="button" class="btn btn-primary" id="update-ingredent">Add Contact</button></a>
              </div>
            <div class="row" id="manage-contacts">

            </div>
            <bR><br>


        </div>
    </div>
@endsection
