
<html>

<head>


    <style type="text/css">
        @media screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }

        .Invoice-table tr td {
            font-size: 14px;
            padding: 5px 4px
        }

        .Invoice-table tr th {
            background: #7393B3;
            color: #fff;
            width: 1%;
            text-align: left;

            padding: 7px 4px;

        }
    </style>

</head>

<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#7393B3" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 700px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#7393B3" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 700px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top"
                            style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size: 48px; font-weight: 400; margin: 1;">Invoice</h1>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 700px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left"
                            style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <div style="display: flex;justify-content: space-between;">
                                <div>
                                    <p style="font-size: 14px;color: #000;margin: 0px;">To: <b>{{ ucfirst(session()->get("userName")) }}</b></p>

                                </div>
                                <div>
                                    <p style="font-size: 14px;color: #000;margin: 0px;">Invoice</p>
                                    <p style="font-size: 14px;color: #000;margin: 0px;">ID:
                                        <b>#000{{ $dataDetail['invoiceData']['invoice_id'] }}</b></p>
                                    <p style="font-size: 14px;color: #000;margin: 0px;"> Issue Date:
                                       <b> {{ date('d M Y', strtotime($dataDetail['invoiceData']['created_at'])) }}</b> </p>
                                    <p style="font-size: 14px;color: #000;margin: 0px;"> Status: Paid</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 700px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left"
                            style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                            <table class="Invoice-table">
                                <tr>
                                    <th>#</th>
                                    <th>Plan</th>
                                    <th> Plan Description</th>
                                    <th>Type</th>
                                    <th>Amount</th>

                                </tr>
                                <?php $serial=1; $total=0;?>

                                <tr >
                                    <td>{{ $serial++ }}</td>
                                    <td >{{ $dataDetail['invoiceData']['invoice_plan'] }}</td>
                                    <td >{{ $dataDetail['invoiceData']['invoice_desc'] }}</td>
                                    <td>{{ ($dataDetail['invoiceData']['invoice_package']=="Month") ? "Monthly" : "Yearly" }}</td>
                                    <td> {{ $dataDetail['invoiceData']['invoice_currency'].$dataDetail['invoiceData']['invoice_amount'] }}</td>

                                </tr>


                                <tr>
                                    <th colspan=4
                                        style="    text-align: right;
                                    font-size: 16px;
                                    font-weight: 600;
                                    text-transform: uppercase;
                                    font-style: italic;">
                                        Total :</th>
                                    <th
                                        style="
                                    font-size: 16px;
                                    font-weight: 600;
                                    text-transform: uppercase;
                                    font-style: italic;">
                                        <b>{{ $dataDetail['invoiceData']['invoice_currency'].$dataDetail['invoiceData']['invoice_amount'] }}</b>
                                    </th>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>



    </table>
</body>

</html>