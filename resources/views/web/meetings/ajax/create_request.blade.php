<p class="text-primary">Note: You are about to request Admin for 1:1 Meeting .</p>

<form id="add-meeting-request-form" class="mt-3">
    @csrf
    <div class="alert alert-danger print-error-msg1" style="display:none">
        <ul></ul>
    </div>
    <div class="col-md-12">
        <x-inputField label='user_name' labelCaption="Enter Your Name" id="user_name" type="text" name="name"
            placeholder="Enter Your Name" />
    </div>

    <div class="col-md-12">
        <x-inputField label='user_name' labelCaption="Enter Your Email" id="user_name" type="email"
            name="email" placeholder="Enter Your Email" />
    </div>

    <div class="col-md-12">
        <x-inputField label='user_name' labelCaption="Enter Contact Number" id="user_name" type="text"
            name="phone_no" placeholder="Enter Your Contact Number" />
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="appointment-date">Select Date:</label>
            <input type="date" id="appointment-date" name="date" class="form-control" placeholder="Select Date" required min="<?= date('Y-m-d'); ?>">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="appointment-time">Select Time:</label>
            <input type="time" id="appointment-time" name="time" class="form-control" >
        </div>
      
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="exampleTextarea">Message (Optional)</label>
            <textarea class="form-control" name="message"  rows="4"></textarea>
        </div>
    </div>





    <div class="col-sm-12 mt-4 text-center">
        <div class="form-group">
            <div class="form-control-wrap">
                <button type="submit" class="btn btn-primary" id="update-ingredent">Add Request</button>
            </div>
        </div>
    </div>
</form>


<script>
    $("#add-meeting-request-form").on("submit", function(e) {
        e.preventDefault();
        $("#update-ingredent").html('<i class="fa fa-spinner fa-spin"></i><i>please wait</i>');
        $("#update-ingredent").attr("disabled", true)
        var edit_user = new FormData(this);
        var url = "{{ route('save-meeting-request') }}";
        setTimeout(() => {
            addMeetingRequest(edit_user, url);
        }, 500);
       
    });
</script>
