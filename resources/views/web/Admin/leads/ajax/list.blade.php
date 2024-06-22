<div class="col-md-12 text-center mb-3 mt-3" style="width:100%; background-color:#1967a9;color:white;padding:5px;">
    <h3>Manage Leads</h3>

</div>


<table id="datatable-buttons" class="table  table-bordered dt-responsive nowrap "
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">


    <thead>
        <tr>
            <th style="max-width:50px">Sr. No.</th>
            <th>Name</th>
            <th>Contact Name</th>
            <th style="max-width:100px">Organization</th>
            <th style="max-width:100px">Type</th>
            <th style="max-width:100px">Source</th>
            <th style="max-width:100px">Expected Close Date</th>
            <th style="max-width:100px">Status</th>
            <th style="max-width:100px">Action</th>

        </tr>
    </thead>


    <tbody>
        @if (!empty($data))

            <?php $serial = 1; ?>
            @foreach ($data as $value)
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{ $value['name'] }}</td>
                    <td>{{ $value['contact']['name'] }}</td>
                    <td>{{ $value['organization']['name'] }}</td>
                    <td>{{ $value['type'] }}</td>
                    <td><span class="badge-primary">{{ $value['source'] }}</span></td>
                    <td>{{ $value['expected_close_date'] }}</td>
                    <td><span class="badge-success">{{ $value['status'] }}</span></td>
                    <td>
                        <a href="" id="edit-company-admin" data-id="{{ $value['id'] }}"
                            class="btn btn-primary"><i class="ti-pencil-alt"></i></a>
                        <a href="" id="delete-company-admin" data-id="{{ $value['id'] }}"
                            class="btn btn-danger"><i class="ti-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

<script>
    $('#datatable-buttons').DataTable({
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excel',
                text: 'Export to excel',
                className: 'btn btn-default',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                text: 'Export to pdf',
                className: 'btn btn-default',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            }
        ]
    });
</script>