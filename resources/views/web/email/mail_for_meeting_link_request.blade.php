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
                        <p>User <b>"{{ strtoupper($data[0]['fetch_user_details']['name']) }}"</b> has requested for
                            a meeting Link, Please update Meeting Link</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr style="    padding: 30px;
    display: flex;
    justify-content: center;">

        <td class="header" style="    padding: 0px 0px;">
            <table border="0"
                style="color: #bfce6a; text-align: center; width: 764px; margin: 0 auto; font-family: Arial, Helvetica, sans-serif;"
                cellspacing="0" width="600">
                <tr>
                    <td colspan="2">
                        <a href="{{ route('admin.view.meeting', ['meetingId' => urlParam($data[0]['m_id'])]) }}"
                            style="background: #bfce6a;color: #fff; border: none; width: 111px; height: 37px; border-radius: 6px; font-size: 15px; font-weight: 600; font-style: italic; text-decoration:none;
cursor: pointer;padding: 10px;">Go
                            To Meeting</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
