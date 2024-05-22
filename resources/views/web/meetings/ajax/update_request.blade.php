<p class="text-primary">Note: You have rejected meeting Request, please set another request before rejecting the current one. Thank You!</p>

<form id="update-meeting-request-form" class="mt-3">
    @csrf
    <div class="alert alert-danger print-error-msg1" style="display:none">
        <ul></ul>
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
    <input type="hidden" name="id" value={{ $data['id'] }} />
    <input type="hidden" name="type" value={{ $data['type'] }} />





    <div class="col-sm-12 mt-4 text-center">
        <div class="form-group">
            <div class="form-control-wrap">
                <button type="submit" class="btn btn-primary" id="update-ingredent">Add Request</button>
            </div>
        </div>
    </div>
</form>


<script>
    $("#update-meeting-request-form").on("submit", function(e) {
        e.preventDefault();

        $("#update-ingredent").html('<i class="fa fa-spinner fa-spin"></i><i>please wait</i>');
        $("#update-ingredent").attr("disabled", true)
        var edit_user = new FormData(this);
        var url = "{{ route('user.update-meeting-request-form-ajax') }}";
        setTimeout(() => {
            UpdateMeetingRequest(edit_user, url);
        }, 500);
      
    });
</script>
