<div class="col-md-12 text-center mb-3 mt-3" style="width:100%; background-color:#1967a9;color:white;padding:5px;">
    <h3>Manage Companies</h3>
</div>




<table id="datatable-buttons" class="table  table-bordered dt-responsive nowrap "
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

    <thead>
        <tr>
            <th style="max-width:50px">Sr. No.</th>
            <th>Company Name</th>
            <th>Company Email</th>
            <th style="max-width:100px">Company Status</th>
            <th style="max-width:150px">Subscription Status</th>
            <th style="max-width:100px">Package Information</th>
            <th>Created By</th>
            <th style="max-width:100px">Action</th>

        </tr>
    </thead>


    <tbody>
        @if (!empty($data))

            <?php $serial = 1; ?>
            @foreach ($data as $value)
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{ $value['c_name'] }}</td>
                    <td>{{ $value['c_email'] }}</td>
                    <td>
                        @if ($value['status'] == 1)
                            Active
                        @else
                            Inactive
                        @endif
                    </td>
                    <td>@if(isset($value['packageUpdate'])) {{ ucfirst($value['packageUpdate']) }} @else {{ "-" }} @endif</td>
                    <td>
                        @if(isset($value['expiry']))
                        @if ($value['expiry'] == 'subscribed')
                            {{ Str::ucfirst($value['expiry']) }}
                        @elseif($value['expiry'] == 'unsubscribed')
                            {{ Str::ucfirst($value['expiry']) . ' ( Expiry Date: ' . date('d-M-Y', strtotime($value['get_plan_detail'][0]['expiry_date'])) . ' )' }}
                        @else
                            {{ $value['expiry'] }}
                        @endif
                        @else {{ "-" }}
                         @endif
                    </td>
                    <td>{{ $value['get_user_detail'][0]['name'] }}</td>
                    <td>
                        <a href="" id="edit-company-admin" data-id="{{ $value['c_id'] }}"
                            class="btn btn-primary"><i class="ti-pencil-alt"></i></a>
                        <a href="" id="delete-company-admin" data-id="{{ $value['c_id'] }}"
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
