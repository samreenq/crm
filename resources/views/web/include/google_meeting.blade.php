<div class="mt-3">
    <div class="services-block-three">


        <h4 class="mt-2"> Meetings</h4>
        <div class="row" style="width:100%">
            <div class="col-md-12">
                <a href="" class="btn btn-xs   mb-2"
                    style="float:right; background:#7393B3; color:#fff; position: relative;
                z-index: 12;"
                    id="create-meeting-request">
                    <i class="mdi mdi-shape-rectangle-plus"></i>
                    <b> Add Request</b>
                </a>
            </div>
        </div>

    <div class="table-responsive">
        <table class="table qn-table ">
            <thead>
                <tr>
                    <th scope="col">Sr. No. </th>
                    <th scope="col">Request ID </th>
                    <th scope="col">Ticket Status</th>
                    <th scope="col">Link</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @if (!empty($data['meetings']))
                <tbody>
                    <?php $increment = 1; ?>
                    @foreach ($data['meetings'] as $value)
                        <tr>
                            <td>{{ $increment++ }}</td>
                            <td>REQUEST000{{ $value['m_id'] }}</td>
                            <td>
                                @if ($value['status'] == '1')
                                    "OPEN"
                                @else
                                    "CLOSED"
                                @endif
                            </td>
                            <td>
                                @if (empty($value['meeting_link']))
                                    -
                                @else
                                    {{ $value['meeting_link'] }}
                                @endif
                            </td>



                            <td style="position: relative; z-index: 12;">
                                <a href="{{ route('user.view.meeting', ['meetingId' => urlParam($value['m_id'])]) }}"
                                    class="btn btn-primary btn-sm"
                                    style="position: relative;
                        z-index: 12;"><i class="fa-solid fa-eye"></i></a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            @else
                <tbody>
                    <tr>
                        <td style="text-align: center" colspan="5"> -- NO REQUEST MADE YET -- </td>
                    </tr>
                </tbody>
            @endif
        </table>
    </div>

    </div>
</div>
