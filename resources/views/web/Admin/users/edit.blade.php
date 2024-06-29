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


    @include('include.pre_loader')
@endpush



@section('body_container')
    <div class="card m-b-20">
        <div class="card-body">
            {{-- @include('include.es_msg') --}}
            @include('include.flash-message')

            <form id="edit-company-form-by-admin" name="data_form" method="post" action="{{ route('admin.users.update', $record->id) }}">
                @csrf
                <div class="alert alert-danger error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-inputField class="form-control" label='user_name' labelCaption="Name*"
                        id="name" type="text" name="name"
                        placeholder="Enter Name" :inputData="$record->name" />
                    </div>

                    <?php
                     $data['role_options']['userSelectedOption']['Key']= $record->role;
                     $data['status_options']['userSelectedOption']['Key']= $record->status;
                    ?>

                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="Role*"
                        name="role" defaultOption="Select Role" :options="$data['role_options']" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-inputField class="form-control" label='user_name' labelCaption="Email*"
                        id="email" type="email" name="email"
                        placeholder="Enter Email" :inputData="$record->email"  />
                    </div>
                    <div class="col-md-6">
                        <x-inputField label='user_name' labelCaption="Phone*"
                        id="phone" type="phone" name="phone"
                        placeholder="Enter Phone" :inputData="$record->phone"  />
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="Select Status*"
                        name="status" defaultOption="Select Status" :options="$data['status_options']" />
                    </div>

                </div>

                <input type="hidden" name="id" value="{{ $record->id }}" />

                <div class="col-sm-12 mt-4 text-center">
                    <div class="form-group">
                        <div class="form-control-wrap">
                          <a href=""><button type="submit" class="btn btn-primary" id="update-ingredent">Update</button>
                          </a>
                        </div>
                    </div>
                </div>
            </form>

            <bR><br>


        </div>
    </div>

@endsection