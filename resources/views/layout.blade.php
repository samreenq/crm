<!DOCTYPE html>
<html lang="en">
@include('include.header')
@stack('css')

<!-- Loader -->

<div class="" style="background: #fff">
    <div class="content-page">
        @section('body_container')

        @show
    </div>
</div>
<div class="" style="width: 100%">
    @include('include.footer')
    @stack('custom-scripts')
    @include('include.admin_scripts')
</div>
</div>


</body>



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
