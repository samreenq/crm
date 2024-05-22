<!-- See the settings for some head CSS styles -->
<table class="email" width="100%" border="0;" cellspacing="0;" cellpadding="20"
    style="border-bottom-style: solid; border-bottom-color: #bfce6a;">
    <tr>
        <td class="header" style="padding: 30px 0px 30px 0px; background-color: #bfce6a;">
            <table border="0"
                style="color: #fff; text-align: center; width: 600px; margin: 0 auto; font-family: Arial, Helvetica, sans-serif;"
                cellspacing="0" width="600">
                <tr>
                    <td colspan="2">
                        <h1>Growing Effect</h1>
                        {{-- <p><i>admin@email.com</i></p> --}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="content" style="background-color: #eee; padding: 36px 10px;">
            <table border="0" ;
                style="color: #444; width: 800px; margin: 0 auto; font-family: Arial, Helvetica, sans-serif; line-height: 1.4;"
                cellpadding="15" cellspacing="1" width="600">
                <tr>
                    <td width="100%"
                        style="padding: 8px 11px; font-size: 17px; font-weight: 500; font-style: italic; background: yellow;">
                        <p>User <b>"{{ strtoupper($data[0]['fetch_user_details']['name']) }}"</b> has requested for for
                            a
                            meeting filled with possibilities!</p>
                    </td>
                </tr>
            </table>
            <table border="0" ;
                style="color: #444; width: 500px; border: 2px dashed #bfce6a; border-radius: 9px; margin: 22 auto; font-family: Arial, Helvetica, sans-serif; line-height: 1.4;"
                cellpadding="15" cellspacing="1" width="600">
                <tr style="background-color: #eee;">
                    <td width="30%" style="border-right: 1px solid #d5d5d5;"><strong>Name:</strong></td>
                    <td width="30%" style="text-align: right;">{{ $data[0]['name'] }}</td>
                </tr>
                <tr style="background-color: #eee;">
                    <td width="30%" style="border-right: 1px solid #d5d5d5;"><strong>Email:</strong></td>
                    <td width="30%" style="text-align: right;">{{ $data[0]['email'] }}</td>
                </tr>
                <tr style="background-color: #eee;">
                    <td width="30%" style="border-right: 1px solid #d5d5d5;"><strong>Number:</strong></td>
                    <td width="30%" style="text-align: right;">{{ $data[0]['phone_no'] }}</td>
                </tr>
            </table>

    <tr>
        <td class="header" style="padding: 50px 0px 0px 0px;">
            <table border="0"
                style="color: #bfce6a; text-align: center; width: 600px; margin: 0 auto; font-family: Arial, Helvetica, sans-serif;"
                cellspacing="0" width="600">
                <tr>
                    <td colspan="2">
                        <h1>Meeting Schedule</h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>

        <td class="header" style="    padding: 0px 0px;">
            <table border="0"
                style="color: #bfce6a; text-align: right; width: 764px; margin: 0 auto; font-family: Arial, Helvetica, sans-serif;"
                cellspacing="0" width="600">
                <tr>
                    <td colspan="2">
                        <a @if($data['mailTo']=="Admin") href="{{  route('admin.view.meeting', ['meetingId' => urlParam($data[0]['m_id'])]) }}" @else href="{{  route('user.view.meeting', ['meetingId' => urlParam($data[0]['m_id'])]) }}" @endif
                            style="background: #bfce6a;color: #fff; border: none; width: 111px; height: 37px; border-radius: 6px; font-size: 15px; font-weight: 600; font-style: italic; text-decoration:none;
cursor: pointer;padding: 10px;">Go To Meeting</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <table border="0" ;
        style="color: #444; width: 800px; border-radius: 9px; margin: 22 auto; font-family: Arial, Helvetica, sans-serif; line-height: 1.4;"
        cellpadding="15" cellspacing="1" width="600">
        <tr style="background-color: #eee;">
            <td width="100%" style="border-right: 1px solid #d5d5d5; padding: 28px 10px 15px 10px;">
                <strong>
                    <ol>
                        @foreach ($data[0]['fetch_meeting_details'] as $value)
                            @if (
                                ($value['user_approval'] == 1 && $value['admin_approval'] == 0) ||
                                    ($value['user_approval'] == 0 && $value['admin_approval'] == 1))
                                <li style="margin-bottom: 30px;">
                                    <h6 style="font-size: 15px; font-weight: 600; margin: 9px 0px;">
                                        {{ ucfirst($value['fetch_user_details']['name']) }} has
                                        requested
                                        this date

                                        @php
                                            $isAdmin = false;
                                            $dateStr = $value['date'];
                                            $timestamp = strtotime($dateStr);
                                            $formattedDate = date('( d-M-Y | h:iA )', $timestamp);

                                            echo $formattedDate;

                                        @endphp
                                        <span>
                                            <small class="act-status">Action Status </small>
                                            <span class="pending-style">( Pending )</span>
                                        </span>
                                    </h6>
                                    <div
                                        style="
                                                background: #fff;
                                                padding: 10px;
                                                font-size: 14px;
                                                border: 1px solid transparent;
                                                box-shadow: 0 2px 5px 1px rgba(64, 60, 67, 0.16);
                                                border-radius: 6px;
                                                font-weight: 400;
                                                font-style: italic;
                                                width: 91%;
                                            ">
                                        <a href="#"> {{ $value['message'] }}</a>
                                    </div>
                                </li>
                            @elseif ($value['user_approval'] == 1 && $value['admin_approval'] == 1)
                                <li style="margin-bottom: 30px;">
                                    <h6 style="font-size: 15px; font-weight: 600; margin: 9px 0px;">
                                        {{ ucfirst($value['fetch_user_details']['name']) }} has
                                        requested
                                        this date

                                        @php
                                            $isAdmin = false;
                                            $dateStr = $value['date'];
                                            $timestamp = strtotime($dateStr);
                                            $formattedDate = date('( d-M-Y | h:iA )', $timestamp);

                                            echo $formattedDate;

                                        @endphp
                                        <span>
                                            <small class="act-status">Action Status </small>
                                            <span class="pending-style">( Approved )</span>
                                        </span>
                                    </h6>
                                    <div
                                        style="
                                            background: #fff;
                                            padding: 10px;
                                            font-size: 14px;
                                            border: 1px solid transparent;
                                            box-shadow: 0 2px 5px 1px rgba(64, 60, 67, 0.16);
                                            border-radius: 6px;
                                            font-weight: 400;
                                            font-style: italic;
                                            width: 91%;
                                        ">
                                        <span href="#"> {{ $value['message'] }}</span>
                                    </div>
                                </li>
                            @endif
                        @endforeach

                    </ol>
                    @php
                        $previousHistory = false;
                    @endphp
                    @foreach ($data[0]['fetch_meeting_details'] as $value)
                        @if ($value['user_approval'] == 2 && $value['admin_approval'] == 2)
                            @php
                                $previousHistory = true;
                                break;
                            @endphp
                        @endif
                    @endforeach
                    @if ($previousHistory)
                        <h5
                            style="    font-size: 16px;
                            padding: 3px 39px;
                            margin: 34px 23px;
                            font-weight: bold;
                            color: red;
                            font-style: italic;
                            text-align: center;
                            border-bottom: 4px solid #fff;">
                            Previous Meeting History</h5>
                        <ul>
                            @foreach ($data[0]['fetch_meeting_details'] as $value)
                                @if ($value['user_approval'] == 2 && $value['admin_approval'] == 2)
                                    <li style="margin-bottom: 30px;">
                                        <h6 style="font-size: 15px; font-weight: 600; margin: 9px 0px;">
                                            {{ ucfirst($value['fetch_user_details']['name']) }} has requested
                                            this date

                                            @php
                                                $isAdmin = false;
                                                $dateStr = $value['date'];
                                                $timestamp = strtotime($dateStr);
                                                $formattedDate = date('( d-M-Y | h:iA )', $timestamp);

                                                echo $formattedDate;
                                            @endphp
                                            <span>
                                                <small class="act-status">Action Status </small>
                                                <span class="" style="color:red">( Rejected )</span>
                                            </span>
                                        </h6>
                                        <div
                                            style="
                                            background: #fff;
                                            padding: 10px;
                                            font-size: 14px;
                                            border: 1px solid transparent;
                                            box-shadow: 0 2px 5px 1px rgba(64, 60, 67, 0.16);
                                            border-radius: 6px;
                                            font-weight: 400;
                                            font-style: italic;
                                            width: 91%;
                                        ">
                                            <span href="#"> {{ $value['message'] }}</span>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </strong>
            </td>
        </tr>
    </table>
    </td>
    </tr>
</table>
