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

            <form id="edit-company-form-by-admin" name="data_form" method="post" action="{{ route('admin.activities.store') }}">
                @csrf
                <div class="alert alert-danger error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-inputField label='title' labelCaption="Title*"
                        id="title" type="text" name="title"
                        placeholder="Enter Title" />
                    </div>
                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="Type*"
                        name="type" defaultOption="Select Type" :options="$data['type_options']" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="Contact*"
                         name="contact_id" id="contact_id" defaultOption="Select contact" :options="$data['contact_options']" />
                    </div>

                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="Organization*"
                         name="organization_id" id="Organization_id" defaultOption="Select organization" :options="$data['organization_options']" />
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <x-inputField label='subject' labelCaption="Subject*"
                        id="subject" type="text" name="subject"
                        placeholder="Enter Subject"  />
                    </div>
                    <div class="col-md-6">
                        <x-inputField label='expected_close_date' labelCaption="Date Time"
                        id="date_time" type="datetime-local" name="date_time"
                        placeholder="Enter Date Time"  />
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-6">
                        <label for="name">Description:</label>
                        <textarea id="txtArea" rows="5" cols="30" class="form-control"
                        placeholder="Enter description" name="description" id="description" ></textarea>
                    </div>
                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="Status*"
                        name="status" defaultOption="Select Status" :options="$data['status_options']" />
                    </div>

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
