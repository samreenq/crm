<form id="edit-company-form-by-admin">
    @csrf
    <div class="alert alert-danger print-error-msg1" style="display:none">
        <ul></ul>
    </div>
    <div class="col-md-12">
        <x-inputField label='user_name' labelCaption="Company Name" 
        id="user_name" type="text" name="c_name"
        placeholder="Enter Company Name" :inputData="$data['c_name']" />
    </div>

    <div class="col-md-12">
        <x-inputField label='user_name' labelCaption="Company Email" 
        id="user_name" type="email" name="c_email"
        placeholder="Enter Company Email" :inputData="$data['c_email']" />
    </div>
   

    <div class="col-md-12">
        <?php
            $fetchData[0]="Inactive";
            $fetchData[1]="Active";
          
            $options['userSelectedOption']['Key']=$data['status'];
            $options['options']=$fetchData;
        ?>
        <x-selectField label='focus' className="eventClass" labelCaption="Select Status:" 
        name="status" defaultOption="Select Company Status" :options="$options" />
    </div>

    
    <input type="hidden" name="c_id" value="{{$data['c_id'] }}" />
    
    <div class="col-sm-12 mt-4 text-center">
        <div class="form-group">
            <div class="form-control-wrap">
              <button type="submit" class="btn btn-primary" id="update-ingredent">Update Company</button>
            </div>
        </div>
    </div>
</form>

<script>
$("#edit-company-form-by-admin").on("submit", function (e) {
        e.preventDefault();
        $("#update-ingredent").html('<i class="fa fa-spinner fa-spin"></i><i>please wait</i>');
         var edit_user = new FormData(this);
         var url="{{route('admin.manage-company.update-modal.ajax')}}";
         updateCompanyFormDataByAdmin(edit_user,url);
});


</script>