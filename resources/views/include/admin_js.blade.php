<script>
    function manageUsers() {
        dataUrl = "{{ route('admin.manage-users.ajax') }}"

        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-users').html(data);
            }
        })
    }

    function manageOrganization() {
        dataUrl = "{{ route('admin.manage-organization.ajax') }}"

        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-organization').html(data);
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
            }
        })
    }

</script>
