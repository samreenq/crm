<script>
    function manageUsers() {
        dataUrl = "{{ route('admin.manage-users.ajax') }}"

        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-users').html(data);
                hideExportsBtn();
            }
        })
    }

    function manageOrganization() {
        dataUrl = "{{ route('admin.manage-organization.ajax') }}"

        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-organization').html(data);
                hideExportsBtn();
            }
        })
    }

    function manageContacts()
    {
        dataUrl = "{{ route('admin.manage-contacts.ajax') }}";

        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-contacts').html(data);
                hideExportsBtn();
            }
        })
    }

    function hideExportsBtn()
    {
        $(".buttons-excel").hide();
        $(".buttons-pdf").hide();
    }

    function manageLeads()
    {
        dataUrl = "{{ route('admin.manage-leads.ajax') }}";
        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-leads').html(data);
                hideExportsBtn();
            }
        })
    }

    function manageActivities()
    {
        dataUrl = "{{ route('admin.manage-activities.ajax') }}";
        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-activities').html(data);
                hideExportsBtn();
            }
        })
    }
    
    $(document).ready(function(){

    $(document).on('click', '#delete-admin-module-row', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        var moduleName = $(this).attr("data-name");

        if($.trim(moduleName) == "user"){
            var dataUrl = deleteUserUrl(dataId);
        }
        swal({
            title:  'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
          
            $.ajax({
                url: dataUrl,
                success: function(data) {
                  //  alert(data);
                    var result = JSON.parse(data);
                    if (result['code'] == '302') {
                        jsonMessage('error', 'Required Field cannot be left empty')
                        printErrorMsg(result['message']);
                    } else if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                            setTimeout(function(){
                                location.reload();
                            }, 2000);
                    }
                }
            })
        }).catch(swal.noop);
    });

});

function deleteUserUrl(id)
{
    var deleteUrl  = "{{ route('admin.users.delete') }}";
    var delete_url =  deleteUrl + "?id=" + id;
    return delete_url;
}
</script>
