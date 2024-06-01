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
                        <x-inputField label='name' labelCaption="Name*"
                        id="name" type="text" name="name"
                        placeholder="Enter Name" />
                    </div>

                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="Organization Type*"
                         name="type" defaultOption="Select organization Type" :options="$data['type_options']" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-inputField label='email' labelCaption="Email*"
                        id="email" type="email" name="email"
                        placeholder="Enter Email"  />
                    </div>
                    <div class="col-md-6">
                        <x-inputField label='phne' labelCaption="Phone*"
                        id="phone" type="phone" name="phone"
                        placeholder="Enter Phone"  />
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-6">
                        <x-inputField label='no_of_employees' labelCaption="No of Employees*"
                        id="no_of_employees" type="text" name="no_of_employees"
                        placeholder="Enter No of Employees"  />
                    </div>

                    <div class="col-md-6">
                        <x-inputField label='annual_revenue' labelCaption="Annual Revenue*"
                        id="annual_revenue" type="text" name="annual_revenue"
                        placeholder="Enter Annual Revenue"  />
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Description:</label>
                        <textarea id="txtArea" rows="5" cols="30" class="form-control"
                        placeholder="Enter Description" name="description" id="description" ></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="name">Address*:</label>
                        <textarea id="txtArea" rows="5" cols="30" class="form-control"
                        placeholder="Enter Address" name="address" id="address" ></textarea>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-inputField label='no_of_employees' labelCaption="Profile Link"
                        id="profile_link" type="text" name="profile_link"
                        placeholder="Enter Profile Link"  />
                    </div>
                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="Status*"
                        name="status" defaultOption="Select Status*" :options="$data['status_options']" />
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
