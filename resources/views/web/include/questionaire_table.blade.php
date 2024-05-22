<div class="">
    <div class="services-block-three">


        <h4 class="mt-2">Questionaire</h4>

        @if (empty($data['company']))
            <div class="row" style="width:100%">
                <div class="col-md-12">
                    <a href="" class="btn btn-xs   mb-2"
                        style="float:right; background:#7393B3; color:#fff; position: relative;
                    z-index: 12;"
                        id="create-api-modal">
                        <i class="mdi mdi-shape-rectangle-plus"></i>
                        <b> Create API</b>
                    </a>
                </div>
            </div>
        @endif
        <table class="table qn-table table-responsive">
            <thead>
                <tr>
                    <th scope="col">Company Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="min-width:300px">Link</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            @if (!empty($data['company']))
                <tbody>
                    <?php $increment = 1; ?>
                    @foreach ($data['company'] as $value)
                        <tr>
                            <td>{{ $value['c_name'] }}</td>
                            <td>{{ $value['c_email'] }}</td>
                            <td>
                                @if ($value['status'] == 1)
                                    <span class="badge badge-pill badge-primary">Active</span>
                                @else
                                    <span class="badge badge-pill badge-warning">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div  style="position: relative; z-index: 12;">
                                    <div class="row">
                                        <input type="text" id="textToCopy" class="form-control" style="
                                            padding: 7px 0px;
                                            color: #ffffff;
                                            background: #bfce6a;
                                            font-weight: 300;
                                            text-decoration: none;
                                            font-size: 17px;
    margin-bottom: 9px;
    margin-top: 13px;
                                        "
                                            value="<?php
                                            echo '<a href=' . route('view.questionnaire', ['id' => encodeTo16Char($value['c_id'])]) . ' target=_blank >Questionnaire</a> '; ?>" readonly>
                                    </div>
                                    <div class="row">
                                        <p id="copyStatus">Click to Copy</p>
                                    </div>


                                </div>
                            </td>

                            <td style="position: relative; z-index: 12;">
                                <a href="" id="edit-user-company" data-id="{{ $value['c_id'] }}"
                                    class="btn btn-primary btn-sm"
                                    style="position: relative;
                        z-index: 12;"><i
                                        class="ti-pencil-alt"></i></a>
                                <a href="" id="trash-user-company" data-id="{{ $value['c_id'] }}"
                                    class="btn btn-danger btn-sm"
                                    style="position: relative;
                        z-index: 12;"><i
                                        class="ti-trash"></i></a>
                            </td>
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
    // function copyCodeToClipboard(increment) {
    //     var codeInput = document.getElementById("codeInput" + increment);
    //     codeInput.select();
    //     codeInput.setSelectionRange(0, 99999);
    //     document.execCommand("copy");
    //     $(".copy-button").each(function() {
    //         $(this).html("Copy");
    //     })
    //     var copyButton = document.getElementById("copy-button" + increment);

    //     copyButton.innerHTML = "Copied!";
    // }
</script>

@push("custom-scripts")
<script>
    $(document).ready(function() {
        $('#textToCopy').click(function() {
            const inputElement = document.getElementById('textToCopy');
            inputElement.select();
            document.execCommand('copy');
            $('#copyStatus').text('Copied text to clipboard');
        });
    });
</script>
@endpush
