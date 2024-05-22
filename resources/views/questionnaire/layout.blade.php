<!DOCTYPE html>
<html lang="en">

@include("questionnaire.includes.header")


  @section('body_container')

         @show
</body>
@include("questionnaire.includes.footer")
@include("include.admin_scripts")
</html>


@if(session("jsonMessage")!="")

<script>
jsonMessage("{{ session('response') }}","{{ session('message') }}");


</script>
@endif

@if(session("jsonMessage2")!="")

<script>
jsonMessage2("{{ session('response') }}","{{ session('message') }}");


</script>
@endif



    
     
