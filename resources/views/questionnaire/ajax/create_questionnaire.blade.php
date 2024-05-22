<p class="text-primary">Note: The API will be setup with the Company's name and email address.</p>

<form id="create-questionaire-api-form" class="mt-3">
    @csrf
    <div class="alert alert-danger print-error-msg1" style="display:none">
        <ul></ul>
    </div>
    <div class="col-md-12">
        <x-inputField label='user_name' labelCaption="Enter Company's Name" id="user_name" type="text" name="c_name"
            placeholder="Enter Company's Name" />
    </div>

    <div class="col-md-12">
        <x-inputField label='user_name' labelCaption="Enter Company's Email" id="user_name" type="text"
            name="c_email" placeholder="Enter Company's Email" />
    </div>





    <div class="col-sm-12 mt-4 text-center">
        <div class="form-group">
            <div class="form-control-wrap">
                <button type="submit" class="btn btn-primary" id="update-ingredent">Create API</button>
            </div>
        </div>
    </div>
</form>


<script>
    $("#create-questionaire-api-form").on("submit", function(e) {
        e.preventDefault();
        $("#update-ingredent").html('<i class="fa fa-spinner fa-spin"></i><i>please wait</i>');
        var edit_user = new FormData(this);
        var url = "{{ route('users.save-questionaire.ajax') }}";
        CreateQuestionaireAPI(edit_user, url);
    });
</script>
