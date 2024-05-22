<div class="col-md-12 text-center mb-3 mt-3" style="width:100%; background-color:#1967a9;color:white;padding:5px;">
    <h3>Manage Companies</h3>
</div>




<table id="datatable-buttons" class="table  table-bordered dt-responsive nowrap "
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

    <thead>
        <tr>
            <th style="max-width:50px">Sr. No.</th>
            <th>Request No.</th>
            <th>Created By</th>
            <th style="max-width:100px">Ticket Status</th>
            <th style="max-width:100px">Action</th>

        </tr>
    </thead>


    <tbody>
        @if (!empty($data))

            <?php $serial = 1; ?>
            @foreach ($data as $value)
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>REQUEST000{{ $value['m_id'] }}</td>
                    <td>{{ ucfirst($value['fetch_user_details']['name']) }}</td>
                    <td>
                        @if ($value['status'] == '1')
                            "OPEN"
                        @else
                            "CLOSED"
                        @endif
                    </td>
              
                  
                   
                    <td>
                        <a href="{{ route('admin.view.meeting', ['meetingId' => urlParam($value['m_id'])]) }}" 
                            class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                            {{-- <a id="delete-company-admin"  data-id="{{ $value['m_id'] }}" 
                                class="btn btn-primary"><i style="color:#fff" class="ti-pencil-alt"></i></a> --}}
                       
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
