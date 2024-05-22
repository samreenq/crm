<!DOCTYPE html>
<html lang="en">
@include('web.Admin.includes.header')

@stack('css')

<body class="fixed-left">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>
    <div id="wrapper">
        @include('web.Admin.includes.sidebar')

        <div class="content-page">
            <div class="content">
                @include('web.Admin.includes.topbar')
                <div class="page-content-wrapper">
                    @section('body_container')

                    @show
                </div>
                @include('web.Admin.includes.footer')
                @stack('custom-scripts')
                @include('include.admin_scripts')
                @include('include.admin_js')
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        countmeetings();
    });
</script>
@if (session('jsonMessage') != '')
    <script>
        jsonMessage("{{ session('response') }}", "{{ session('message') }}");
    </script>
@endif

@if (session('jsonMessage2') != '')
    <script>
        jsonMessage2("{{ session('response') }}", "{{ session('message') }}");
    </script>
@endif
