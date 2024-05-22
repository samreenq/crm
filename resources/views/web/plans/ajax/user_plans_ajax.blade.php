<table id="datatable-buttons" class="table  table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">

    <thead>
    <tr>
        <th style="max-width:50px">Sr. No.</th>
        <th style="max-width:100px" >Company Name</th>
        <th style="max-width:100px">Email</th>
        <th style="max-width:100px">Created Date</th>
        <th style="max-width:50px">Account Type</th>
        <th style="max-width:100px">Status</th>
        <th style="max-width:450px">Link</th>
        <th style="max-width:100px">Action</th>
    </tr>
    </thead>


    <tbody>
    @if(!empty($data))

        <?php $serial=1; $increment=0;?>
        @foreach($data as $value)
            
            <tr>
                <td>{{ $serial++ }}</td>
                <td>{{ $value['c_name'] }}</td>
                <td>{{ $value['c_email'] }}</td>
                <td>{{ date("jS M-Y",strtotime($value['created_at'])) }} </td>
                <td>{{ $value['accountType'] }}</td>
                <td>
                    @if ($value['status']==1)
                        <span class="badge badge-pill badge-primary">Active</span>
                    @else
                        <span class="badge badge-pill badge-warning">Inactive</span>
                    @endif
                </td>
                <td>
                    <div class="input-group mb-3">
                        <input type="text" id="codeInput{{ $increment }}" class="form-control" value="<?php 
                        echo '<a href='. route('view.questionnaire',['id'=>encodeTo16Char($value['c_id'])]) .' target=_blank >Questionnaire</a> ' ?>" readonly>
                        <div class="input-group-append">
                            <button class="btn btn-primary copy-button " id="copy-button{{ $increment }}" type="button" onclick="copyCodeToClipboard({{ $increment++ }})">Copy</button>
                        </div>
                    </div>
                </td>
                <td>
                    <a href="" id="edit-user-company" data-id="{{ $value['c_id'] }}" class="btn btn-primary"><i class="ti-pencil-alt"></i></a>
                    <a href="" id="trash-user-company" data-id="{{ $value['c_id'] }}" class="btn btn-danger"><i class="ti-trash"></i></a>
                   </td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/clipboard@1.5.1/dist/clipboard.min.js"></script>
<script>

    $('#datatable-buttons').DataTable({
   dom: 'Bfrtip',
   buttons: [
      {
         extend: 'excel',
         text: 'Export to excel',
         className: 'btn btn-default',
         exportOptions: {
            columns: 'th:not(:last-child)'
         }
      },
      {
         extend: 'pdf',
         text: 'Export to pdf',
         className: 'btn btn-default',
         exportOptions: {
            columns: 'th:not(:last-child)'
         }
      }
   ]
});
 
function copyCodeToClipboard(increment) {
            var codeInput = document.getElementById("codeInput"+increment);
            codeInput.select();
            codeInput.setSelectionRange(0, 99999); // For mobile devices

            /* Copy the text inside the text field to the clipboard */
            document.execCommand("copy");

            /* Update the button text after copying */
            $(".copy-button").each(function(){
                $(this).html("Copy");
            })
            var copyButton = document.getElementById("copy-button"+increment);
           
            copyButton.innerHTML = "Copied!";
        }

        /* Initialize ClipboardJS */
                                     

</script>