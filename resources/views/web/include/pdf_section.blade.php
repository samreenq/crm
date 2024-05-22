<div class="mt-3">
    <div class="services-block-three">


        <h4 class="mt-2">Client Courses</h4>


        <table class="table qn-table ">
            <thead>
                <tr>
                    <th scope="col">Sr. No</th>
                    <th scope="col">Courses</th>
                </tr>
            </thead>
            @if (!empty($data['files']))
                <tbody>
                    <?php $increment = 1; ?>
                    @foreach ($data['files'] as $key=> $value)
                        <tr>
                           <td> {{ $increment++ }}</td>
                            <td> <a href="{{ asset('client_courses/'. $value) }}" download style="cursor: pointer; position: relative; z-index:1"> {{ $key }} </a> </td>

                        </tr>
                    @endforeach


                </tbody>
                @else
                <tbody>
                    <tr>
                        <td style="text-align: center" colspan="5"> -- NO API SET -- </td>
                    </tr>
                </tbody>
            @endif
        </table>

    </div>
</div>


<script>
    function copyCodeToClipboard(increment) {
        var codeInput = document.getElementById("codeInput" + increment);
        codeInput.select();
        codeInput.setSelectionRange(0, 99999); // For mobile devices

        /* Copy the text inside the text field to the clipboard */
        document.execCommand("copy");

        /* Update the button text after copying */
        $(".copy-button").each(function() {
            $(this).html("Copy");
        })
        var copyButton = document.getElementById("copy-button" + increment);

        copyButton.innerHTML = "Copied!";
    }

    /* Initialize ClipboardJS */
</script>
