<style>
    .custom-image-uploader  {
            width: 300px;
            height: 300px;
            border: 2px solid #aaa;
            border-radius: 50%; /* Added border-radius property */
            
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }
        
       .custom-image-uploader .preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: relative;
        }
        
       .custom-image-uploader .edit-icon {
               position: absolute;
				top: 40%;
				right: 40%;
				background-color: rgba(255, 255, 255, 0.7);
				color: #aaa;
				border: none;
				padding: 5px;
				font-size: 50px;
				cursor: pointer;
				z-index: 9999;
        }
        
       .custom-image-uploader .edit-icon:hover {
            color: #5dcb85;
        }

     .custom-image-uploader   .cross-icon {
               position: absolute;
    top: 0px;
    right: 50%;
    background-color: rgba(255, 255, 255, 0.7);
    color: #aaa;
    border: none;
    padding: 5px;
    font-size: 18px;
    cursor: pointer;
    z-index: 9999;
        }
        
      .custom-image-uploader  .cross-icon:hover {
            color: #5dcb85;
        }
        .custom-image-uploader input#upload{
            position: absolute;
            top: 50%;
            left: 22%
        }
      
</style>
@if(!empty($inputData))
<style>
    .custom-image-uploader  {
        left:150px!important;
        width: 150px;
        height: 150px;
    }
</style>
@endif
<div class="custom-file">
    <label class="form-label" for="customFile">{{$labelCaption}}</label>
    {{-- <input type="file" class="form-control" id="customFile"  /> --}}
        <div class="upload-container custom-image-uploader">
            <input type="file" id="upload" accept="image/*" name="{{$name}}">
           
        </div>
     
</div>


<script>
    var uploadInput = document.getElementById('upload');
    var container = document.querySelector('.upload-container');
    var imgElement = null;
    var editIcon = null;
    var crossIcon = null;


    

    uploadInput.addEventListener('change', function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            if (imgElement) {
                container.removeChild(imgElement);
                container.removeChild(editIcon);
                container.removeChild(crossIcon);
            }
            
            imgElement = document.createElement('img');
            imgElement.src = e.target.result;
            imgElement.classList.add('preview-image');
            imgElement.addEventListener('click', function() {
                uploadInput.click();
            });
            
            editIcon = document.createElement('span');
            editIcon.innerHTML = '<i class="fa fa-edit"></i>';
            editIcon.classList.add('edit-icon');
            editIcon.addEventListener('click', function() {
                uploadInput.click();
            });

            crossIcon = document.createElement('span');
            crossIcon.innerHTML = '<i class="ion-close-round"></i>';
            crossIcon.classList.add('cross-icon');
            crossIcon.addEventListener('click', function() {
                container.removeChild(imgElement);
                container.removeChild(editIcon);
                container.removeChild(crossIcon);
                imgElement = null;
                editIcon = null;
                crossIcon = null;
                uploadInput.value = ''; // Clear the input value
            });
            
            container.appendChild(imgElement);
            container.appendChild(editIcon);
            container.appendChild(crossIcon);
        };
        reader.readAsDataURL(file);
    });
    
    uploadInput.addEventListener('click', function() {
        this.value = '';
    });
    
    uploadInput.addEventListener('input', function() {
        if (this.files.length > 0) {
            if (imgElement) {
                container.removeChild(imgElement);
                container.removeChild(editIcon);
                container.removeChild(crossIcon);
            }
            
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.classList.add('preview-image');
                imgElement.addEventListener('click', function() {
                    uploadInput.click();
                });
                
                editIcon = document.createElement('span');
                editIcon.innerHTML = '<i class="fas fa-edit"></i>';
                editIcon.classList.add('edit-icon');
                editIcon.addEventListener('click', function() {
                    uploadInput.click();
                });
                
                crossIcon = document.createElement('span');
                crossIcon.innerHTML = '<i class="fas fa-times"></i>';
                crossIcon.classList.add('cross-icon');
                crossIcon.addEventListener('click', function() {
                    container.removeChild(imgElement);
                    container.removeChild(editIcon);
                    container.removeChild(crossIcon);
                    imgElement = null;
                    editIcon = null;
                    crossIcon = null;
                    uploadInput.value = ''; // Clear the input value
                });
                
                container.appendChild(imgElement);
                container.appendChild(editIcon);
                container.appendChild(crossIcon);
            };
            reader.readAsDataURL(file);
        }
    });
</script>

