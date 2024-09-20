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
            @php
                 $data['type_options']['userSelectedOption']['Key']= $record->type;
                $data['contact_options']['userSelectedOption']['Key']= $record->contact_id;
                $data['organization_options']['userSelectedOption']['Key']= $record->organization_id;
                $data['status_options']['userSelectedOption']['Key']= $record->status;
                $data['source_options']['userSelectedOption']['Key']= $record->source;
                $data['lead_status_options']['userSelectedOption']['Key']= $record->lead_status;


                $expected_close_date = date('m/d/Y',strtotime($record->expected_close_date));
            @endphp

            <form id="edit-company-form-by-admin" name="data_form" method="post" action="{{ route('admin.leads.update',$record->id) }}">
                @csrf
                <div class="alert alert-danger error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-inputField label='name' labelCaption="Name*"
                        id="name" type="text" name="name"
                        placeholder="Enter Name" :inputData="$record->name" />
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
                        <x-selectField label='focus' className="eventClass" labelCaption="Source*"
                        name="source" defaultOption="Select Source" :options="$data['source_options']" />
                    </div>
                    <div class="col-md-6">
                        <x-inputField label='annual_revenue' labelCaption="Annual Revenue*"
                        id="annual_revenue" type="text" name="annual_revenue"
                        placeholder="Enter Annual Revenue" :inputData="$record->annual_revenue"  />
                    </div>

                </div>


                <div class="row">

                    <div class="col-md-6">
                        <x-textareaField label='description'  class="form-control" labelCaption="Description"
                        placeholder="Enter Description" name="description" id="description" :inputData="$record->description" />
                    </div>

                    <div class="col-md-6">
                        <x-inputField label='expected_close_date' labelCaption="Expected Close Date*"
                        id="expected_close_date" type="date" name="expected_close_date"
                        placeholder="" :inputData="$record->expected_close_date"  />
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="Lead Status*"
                        name="lead_status" defaultOption="Select Lead Status" :options="$data['lead_status_options']" />
                    </div>

                    <div class="col-md-6">
                        <x-selectField label='focus' className="eventClass" labelCaption="Status*"
                        name="status" defaultOption="Select Status" :options="$data['status_options']" />
                    </div>
                </div>

                <input type="hidden" name="id" value="" />

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
