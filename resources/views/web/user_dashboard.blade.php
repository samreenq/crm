@extends('web.dashboard-panel')

@section('dynamic-dashboard-data')
    <div class="row mb-3 welcome-card ">
        <p class=""> Welcome <b>{{ session()->get('userName') }} </b></p>
    </div>

    @if (session()->get('accountType') == 'paid')
        <div class="alert alert-success" role="alert">
            <p> You are subscribed to <b>{{ session()->get('planName') }}</b> {{ session()->get('packageType') }}
        </div>
    @else
        <div class="alert alert-primary" role="alert"> Please Purchase plan to avail features, accordingly</div>
    @endif

    @if (!empty($plan))
        @if ($plan[0]['questionaire'] == 1)
            @include('web.include.questionaire_table')
        @endif

        @if ($plan[0]['pdf'] == 1)
            @include('web.include.pdf_section')
        @endif

        @if ($plan[0]['meeting'] == 1)
            @include('web.include.google_meeting')
        @endif
    @endif
@endsection
