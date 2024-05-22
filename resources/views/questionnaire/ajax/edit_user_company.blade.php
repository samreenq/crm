
<form id="edit-user-company-form">
    @csrf
    <div class="alert alert-danger print-error-msg1" style="display:none">
        <ul></ul>
    </div>
    <div class="col-md-12">
        
        <x-inputField label='user_name' labelCaption="*Company Name" 
        id="user_name" type="text" name="c_name"
        placeholder="Enter Company name" :inputData="$data[0]['c_name']" />
    </div>

    <div class="col-md-12">
        <x-inputField label='user_name' labelCaption="*Company's Email" 
        id="user_name" type="text" name="c_email"
        placeholder="Enter Company's Email" :inputData="$data[0]['c_email']" />
    </div>
 
    <div class="col-sm-12 mt-2">
        <?php  
                        
               
                    $ingUnits[1]="Active";
                    $ingUnits[0]="Inactive";
               
                $options['options']=$ingUnits;
                $options['userSelectedOption']['Key']=$data[0]['status'];
               
                ?>
        
        <x-selectField label='focus' className="ClassStatus" labelCaption="*Select Status" id="focus" 
        name="c_status" defaultOption="Select Status" :options="$options" />
      
    </div>

    


    <input type="hidden" name="companyId" value="{{$data[0]['c_id'] }}" />
    
    
    <div class="col-sm-12 mt-4 text-center">
        <div class="form-group">
            <div class="form-control-wrap">
              <button type="submit" class="btn btn-primary" id="update-customer">Update Company</button>
            </div>
        </div>
    </div>
</form>

<script>
     
     

      $("#edit-user-company-form").on("submit", function (e) {
        
        var edit_user = new FormData(this);
         
        e.preventDefault();
        updateCompanyModal(edit_user);

    });

   

    

</script>