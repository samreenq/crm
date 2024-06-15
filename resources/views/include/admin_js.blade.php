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


</script>
