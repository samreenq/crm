@extends('web/Admin/layout')
@push('css')
    <style>
        .noteClass {
            padding: 8px 11px;
            font-size: 12px;
            font-weight: 500;
            font-style: italic;
            background: yellow;
        }

        i.fa-solid.fa-check {
            color: green;
            font-size: 21px;
            font-weight: bold;
            padding: 0px 17px;
            transition: .3s ease;
        }

        i.fa-solid.fa-check:hover {
            font-size: 26px;
        }

        i.fa-solid.fa-xmark {
            color: red;
            font-size: 21px;
            font-weight: bold;
            padding: 0px 17px;
            transition: .3s ease;
        }

        i.fa-solid.fa-xmark:hover {
            font-size: 26px;
        }

        .barLine {
            font-size: 29px;
            color: #dee2e6;
            font-weight: 200;
        }

        .act-status {
            font-size: 14px;
            font-weight: 300;
            margin-left: 21px;
        }

        .pending-style {
            font-size: 14px;
            font-style: italic;
            color: blue;

        }
    </style>
    @include('web.Admin.meetings.includes.reject_meeting_request_modal')
@endpush
@section('body_container')

    <div class="row" style="justify-content: center;">

        <p class="noteClass">User <b>"{{ strtoupper($data[0]['fetch_user_details']['name']) }}"</b> has requested for for a
            meeting filled with possibilities!</p>
    </div>
    <div class="row">
        <div class="container">
            <h2 class="text-center my-4"
                style="color: #333; background-color: #f8f9fa; padding: 10px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                User Contact Details</h2>
            <table class="table table-bordered" style="width: 500px; border-radius: 9px; margin: 22px auto;">
                <tbody>
                    <tr class="table-secondary">
                        <td style="width: 30%;"><strong>Name:</strong></td>
                        <td style="width: 70%; text-align: right;">{{ $data[0]['name'] }}</td>
                    </tr>

                    <tr class="table-secondary">
                        <td style="width: 30%;"><strong>Email:</strong></td>
                        <td style="width: 70%; text-align: right;">{{ $data[0]['email'] }}</td>
                    </tr>
                    <tr class="table-secondary">
                        <td style="width: 30%;"><strong>Contact No:</strong></td>
                        <td style="width: 70%; text-align: right;">{{ $data[0]['phone_no'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
    <div class="row">
        <div class="container">
            <h2 class="text-center my-4"
                style="color: #333; background-color: #f8f9fa; padding: 10px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                Meeting Detail</h2>

        </div>
        <div class="container">
            <form action="{{ route('updateMeetingLink') }}" method="post">
                @csrf
                <x-inputField label='user_name' labelCaption="Meeting Link" id="user_name" type="text"
                    name="meeting Link" placeholder="Enter Meeting Link" :inputData="$data[0]['meeting_link']" />
                    <input type="hidden" name="m_id" value="{{ $data[0]['m_id'] }}" />
                <input type="submit" class="btn btn-primary text-right" style="float: right;" value="Update Meeting Link">
            </form>
        </div>

        <div class="container mt-4">
            <div class="card">
                <div class="card-body">
                    <ol>
                        @foreach ($data[0]['fetch_meeting_details'] as $value)
                            @if (
                                ($value['user_approval'] == 1 && $value['admin_approval'] == 0) ||
                                    ($value['user_approval'] == 0 && $value['admin_approval'] == 1))
                                <li class="mb-4">
                                    <h6 class="font-weight-bold mb-2" style="font-size: 15px;">
                                        <strong>{{ ucfirst($value['fetch_user_details']['name']) }}</strong> has requested
                                        this date

                                        @php
                                            $isAdmin = false;
                                            $dateStr = $value['date'];
                                            $timestamp = strtotime($dateStr);
                                            $formattedDate = date('( d-M-Y | h:iA )', $timestamp);

                                            echo $formattedDate;

                                        @endphp

                                        @php

                                            if (session()->get('userType') != '2') {
                                                $isAdmin = true;
                                            }
                                        @endphp

                                        @if (!$isAdmin)
                                            @if ($value['user_approval'] == 0 && $value['admin_approval'] == 1)
                                                <span>
                                                    <small class="act-status">Action Status </small>
                                                    (<a href="#" data-type="user_approval" id="accept-meeting-request"
                                                        data-id="{{ $value['md_id'] }}"><i
                                                            class="fa-solid fa-check"></i></a>
                                                    <span class="barLine">|</span>
                                                    <a href="#"><i class="fa-solid fa-xmark"></i></a>)
                                                </span>
                                            @else
                                                <span>
                                                    <small class="act-status">Action Status </small>
                                                    <span class="pending-style">( Pending )</span>
                                                </span>
                                            @endif
                                        @else
                                            @if ($value['user_approval'] == 1 && $value['admin_approval'] == 0)
                                                <span>
                                                    <small class="act-status">Action Status </small>
                                                    (<a href="#" data-type="admin_approval"
                                                        id="admin-accept-meeting-request" data-id="{{ $value['md_id'] }}"><i
                                                            class="fa-solid fa-check"></i></a>
                                                    <span class="barLine">|</span>
                                                    <a href="#" data-type="admin_approval"
                                                        id="admin-reject-meeting-request" data-id="{{ $value['md_id'] }}"><i
                                                            class="fa-solid fa-xmark"></i></a>)
                                                </span>
                                            @else
                                                <span>
                                                    <small class="act-status">Action Status </small>
                                                    <span class="pending-style">( Pending )</span>
                                                </span>
                                            @endif
                                        @endif



                                    </h6>
                                    <div class="bg-white p-3 shadow-sm border rounded" style="width: 91%;">
                                        {{ $value['message'] }}
                                    </div>
                                </li>
                            @elseif ($value['user_approval'] == 1 && $value['admin_approval'] == 1)
                                <li class="mb-4">
                                    <h6 class="font-weight-bold mb-2" style="font-size: 15px;">
                                        <strong>{{ ucfirst($value['fetch_user_details']['name']) }}</strong> has requested
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
                        <h5 class="font-weight-bold text-center text-danger border-bottom border-white mb-4">Previous
                            Meeting
                            History</h5>
                        <ul>
                            @foreach ($data[0]['fetch_meeting_details'] as $value)
                                @if ($value['user_approval'] == 2 && $value['admin_approval'] == 2)
                                    <li class="mb-4">
                                        <h6 class="font-weight-bold mb-2" style="font-size: 15px;">
                                            {{ ucfirst($value['fetch_user_details']['name']) }}</strong> has requested
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
                                                <span class="">( Rejected )</span>
                                            </span>
                                        </h6>
                                        <div class="bg-white p-3 shadow-sm border rounded" style="width: 91%;">
                                            {{ $value['message'] }}
                                        </div>
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
