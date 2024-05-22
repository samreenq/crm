@extends('web.dashboard-panel')
@push('css')
    <style>
        span.badge.badge-secondary {
            background: #505050;
            font-size: 15px;
            padding: 9px 22px;
            margin-bottom: -8px;
        }

        .package-detail {
            margin-top: 30px;
            font-style: italic;
            font-weight: 500;
            text-align: left;
            font-size: 17px;
            margin-bottom: 20px;
        }

        #unsubscribe-user-package {
            color: #fff;
            background-color: #7393B3;
            border-color: #7393B3;
            display: flex;
            justify-content: center;
        }

        .card-body {
            padding: 20px 0px 8px 0px !important;
        }

        .border-success {
            border-color: #7393B3 !important;
        }

        .btn-primary {
            border-color: #7393B3 !important;
        }

        label {
            margin-bottom: 4px;
        }
    </style>
@endpush
@section('dynamic-dashboard-data')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="main-view0-card">
                    <div class="row mb-3 welcome-card ">
                        <p class=""> Invoices</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <table class="table qn-table table-bordered  ">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Package Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>


                        </tr>
                    </thead>
                    @if (!empty($data))
                        <tbody>
                            <?php $increment = 1; ?>
                            @foreach ($data as $value)
                                <tr>
                                    <td>{{ $increment++ }}</td>
                                    <td> <a href="{{ route('user.dashboard.purchase-history.view-invoice', ['id' => $value['invoice_id']]) }}"  target="_blank" >{{ $value['invoice_plan'] }}</a></td>
                                    <td>${{ $value['invoice_amount'] }}</td>
                                    <td>
                                        {{ date('d-M-Y', strtotime($value['created_at'])) }}
                                    </td>
                                    <td style="text-align:center">
                                        <a href="{{ route('user.dashboard.purchase-history.download-invoice', ['id' => $value['invoice_id']]) }}"   class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-download"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    @else
                        <tbody>
                            <tr>
                                <td style="text-align: center" colspan="4"> -- NO INVOICE YET -- </td>
                            </tr>
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
