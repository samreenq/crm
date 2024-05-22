<!-- See the settings for some head CSS styles -->
<table class="email" width="100%" border=0; cellspacing=0; cellpadding="20"
    style="
              border-bottom-style: solid;
              border-bottom-color: #bfce6a">

    <tr>
        <td class="header" style="padding: 30px 0px 30px 0px;
       background-color: #bfce6a;">

            <table border="0"
                style="color: #fff; 
                 text-align: center;
                    width: 600px; 
                    margin: 0 auto; 
                    font-family: Arial, Helvetica, sans-serif;"
                cellspacing="0" width="600">
                <tr>
                    <td colspan="2">
                        <h1>Company Name: {{ strtoupper($dataDetail['companyData']['c_name']) }}</h1>
                        <p><i>{{ $dataDetail['companyData']['c_email'] }}</i></p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td class="content" style="background-color: #eee;    padding: 36px 10px;">

            <table border="0"
                style="color: #444; 
                  width: 600px; 
                  margin: 0 auto; 
                  border-bottom-width: 1px;
                  border-bottom-style: solid;
                  border-bottom-color: #ddd;
                  font-family: Arial, Helvetica, sans-serif;
									line-height: 1.4;"
                cellpadding="15" cellspacing="1" width="600">

                <tr style="background-color:#cfcfcf">
                    <td width="30%"><strong>Name:</strong></td>
                    <td>{{ isset($dataDetail['mainArray'][0]['answers']['name']) ?strtoupper($dataDetail['mainArray'][0]['answers']['name']) : null }}</td>
                </tr>
                <tr style="background-color:#cfcfcf">
                    <td width="30%"><strong>Address:</strong></td>
                    <td>{{ isset($dataDetail['mainArray'][0]['answers']['address']) ? strtoupper($dataDetail['mainArray'][0]['answers']['address']) :null }}</td>
                </tr>
                <tr style="background-color:#cfcfcf">
                    <td width="30%"><strong>Email:</strong></td>
                    <td>{{ isset($dataDetail['mainArray'][0]['answers']['email']) ? strtoupper($dataDetail['mainArray'][0]['answers']['email']) : null }}</td>
                </tr>
                <tr style="background-color:#cfcfcf">
                    <td width="30%"><strong>Number:</strong></td>
                    <td>{{ isset($dataDetail['mainArray'][0]['answers']['phone']) ? strtoupper($dataDetail['mainArray'][0]['answers']['phone']) : null }}</td>
                </tr>

            </table>

    <tr>
        <td class="header" style="    padding: 50px 0px 0px 0px;">
            <table border="0"
                style="color: #bfce6a; 
                 text-align: center;
                    width: 600px; 
                    margin: 0 auto; 
                    font-family: Arial, Helvetica, sans-serif;"
                cellspacing="0" width="600">
                <tr>
                    <td colspan="2">
                        <h1>Feed Back</h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr>





    <table border="0"
        style="color: #444; 
            width: 800px; 
            background: #bfce6a;
            margin: 65 auto; 
            border-bottom-width: 1px;
            border-bottom-style: solid;
            border-bottom-color: #ddd;
            font-family: Arial, Helvetica, sans-serif;
                              line-height: 1.4;"
        cellpadding="15" cellspacing="1" width="600">

        <tr style="background-color:#fff">
            <td width="10%"><strong>Sr.No</strong></td>
            <td width="30%"><strong>Question</strong></td>
            <td width="60%"><strong>Response</strong></td>
        </tr>
        @php
            $increment=1;
        @endphp
        @foreach ($dataDetail['mainArray'] as $key => $value)
            @if ($key == 0)
                @php
                    continue;
                @endphp
            @endif
                <tr style="background-color:#fff">
                    <td width="10%">{{ $increment++ }}</td>
                    <td width="30%">{{ $value['question'] }}</td>
                    <td width="30%">{{ $value['answers']['Choice'] }}</td>
                </tr>
            @endforeach



    </table>
    </td>
    </tr>
</table>
