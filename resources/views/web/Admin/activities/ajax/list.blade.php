<div class="col-md-12 text-center mb-3 mt-3" style="width:100%; background-color:#1967a9;color:white;padding:5px;">
    <h3>Manage Activities</h3>

</div>


<table id="datatable-buttons" class="table  table-bordered dt-responsive nowrap "
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">


    <thead>
        <tr>
            <th style="max-width:50px">Sr. No.</th>
            <th>Title</th>
            <th>type</th>
            <th>Contact Name</th>
            <th style="max-width:100px">Organization</th>
            <th style="max-width:100px">Subject</th>
            <th style="max-width:100px">Priority</th>
            <th style="max-width:100px">Date Time</th>
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
                    <td>{{ $value['title'] }}</td>
                    <td>{{ $value['type'] }}</td>
                    <td>{{ $value['contact']['name'] }}</td>
                    <td>{{ $value['organization']['name'] }}</td>
                    <td>{{ $value['subject'] }}</td>
                    @if($value['priority'] == 'low')
                    @php $priority_badge = 'warning'; @endphp
                        @elseif($value['priority'] == 'medium')
                        @php   $priority_badge = 'success';  @endphp
                            @else
                            @php $priority_badge = 'danger';  @endphp
                            @endif
                    <td><span class="badge-{{ $priority_badge }}">{{ $value['priority'] }}</span></td>
                    <td>{{ $value['date_time'] }}</td>
                    <td><span class="badge-success">{{ $value['status'] }}</span></td>
                    <td>
                        <a href="{{ url('admin/activities/edit/'.$value['id']) }}"  data-id="{{ $value['id'] }}"
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
