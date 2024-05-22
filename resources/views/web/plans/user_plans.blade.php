@extends("layout")
  

@push('css')
<link href="{{URL::asset('admin-panel/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('admin-panel/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{URL::asset('admin-panel/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    @endpush
                   
                       
       @push("custom-scripts")
             <!-- Required datatable js -->
        <script src="{{URL::asset('admin-panel/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{URL::asset('admin-panel/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{URL::asset('admin-panel/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{URL::asset('admin-panel/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>

       <script>
            $( document ).ready(function() {
                userPlans({{ session()->get('userId') }});
            });
       </script>
@endpush   
                       
                  
                    


@section ('body_container')
@include("include.pre_loader")
@include("web.plans.include.edit-user-company-modal")

    
<div class="row" style="width:100%">
    <div class="col-md-12">
        <a href="{{route('user.purchase-plan')}}" class="btn btn-primary mt-3 mb-3" style="float:right ">
            <i class="mdi mdi-shape-rectangle-plus"></i>
            <b> Purchase Plan</b>
        </a>
    </div>
</div>
<div class="row" id="user-plans"></div>
    
         





@endsection