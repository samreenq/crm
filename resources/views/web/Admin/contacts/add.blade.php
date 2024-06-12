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

            <form id="edit-company-form-by-admin" name="data_form" method="post" action="{{ route('admin.organization.store') }}">
                @csrf
                <div class="alert alert-danger error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-inputField label='name' labelCaption="Name"
                        id="name" type="text" name="name"
                        placeholder="Enter Name" />
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="User"
                         name="type" defaultOption="Select user" :options="$data['user_options']" />
                    </div>

                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="Organization"
                         name="type" defaultOption="Select organization" :options="$data['organization_options']" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="Gender"
                        name="gender" defaultOption="Select gender" :options="$data['gender_options']" />
                    </div>
                    <div class="col-md-6">
                        <x-inputField label='date_of_birth' labelCaption="Date of Birth"
                        id="date_of_birth" type="text" name="date_of_birth"
                        placeholder="Enter Date Of Birth"  />
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-6">
                        <x-inputField label='city' labelCaption="City"
                        id="city" type="text" name="city"
                        placeholder="Enter City"  />
                    </div>

                    <div class="col-md-6">
                        <x-inputField label='state' labelCaption="State"
                        id="state" type="text" name="state"
                        placeholder="Enter State"  />
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <x-inputField label='zip_code' labelCaption="Zip Cde"
                        id="zip_code" type="text" name="zip_code"
                        placeholder="Enter Zip Code"  />
                    </div>

                    <div class="col-md-6">
                         <x-selectField label='focus' className="eventClass" labelCaption="Country"
                         name="country" defaultOption="Select country" :options="$data['country_options']" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Address:</label>
                        <textarea id="txtArea" rows="5" cols="30" class="form-control"
                        placeholder="Enter Address" name="address" id="address" ></textarea>
                    </div>
                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="Status"
                        name="status" defaultOption="Select Status" :options="$data['status_options']" />
                    </div>
                </div>

                <input type="hidden" name="id" value="" />

                <div class="col-sm-12 mt-4 text-center">
                    <div class="form-group">
                        <div class="form-control-wrap">
                          <a href=""><button type="submit" class="btn btn-primary" id="update-ingredent">Create</button>
                          </a>
                        </div>
                    </div>
                </div>
            </form>

            <bR><br>


        </div>
    </div>

@endsection
