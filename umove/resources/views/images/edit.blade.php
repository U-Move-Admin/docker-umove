<div class="modal-dialog modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title">Edit Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="img-container">
                    <img style="max-width: 100%;" src="{{ asset($imgPath.'/'.$imgName)}}" id="image_cropper">
                </div> </div>
            </div>
              <p class="text-center">
              <button type="button" class="btn btn-primary rotate" data-method="rotate" data-option="-90"><i class="fa fa-undo"></i></button>
              <button type="button" class="btn btn-primary rotate" data-method="rotate" data-option="90"><i class="fa fa-repeat"></i></button> </p>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-primary" id="Save" value="Save">  </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="hidden" name="cropped_value" id="cropped_value" value="">
        </div>
    </div>
</div>
<style>
    .cropper-container{
        margin: 0 auto 20px auto;
    }
    .fa-rotate-right:before,
    .fa-repeat:before {
    content: "\f01e";
    }
</style>
<script type="text/javascript">
$(function() {
    var cropper;
    var options = {
        aspectRatio: 16 / 9,
        minContainerWidth: 570,
        minContainerHeight: 320,
        minCropBoxWidth: 570,
        minCropBoxHeight: 320,
        rotatable: true,
        cropBoxResizable: false,
        //autoCrop: false,
        movable:false,
        cropBoxMovable: false,
        toggleDragModeOnDblclick: false,
        //zoomable:false,
        //zoomOnWheel:false,
        //zoomOnTouch:false,
        crop: function(e) {
            $("#cropped_value").val(parseInt(e.detail.width) + "," + parseInt(e.detail.height) + "," + parseInt(e.detail.x) + "," + parseInt(e.detail.y) + "," + parseInt(e.detail.rotate));
        }
    };
    var image = document.getElementById('image_cropper');
    cropper = new Cropper(image, options);
    ///// Rotate Image
    $("body").on("click", ".rotate", function() {
         var degree = $(this).attr("data-option");
         cropper.rotate(degree);
     });
    ///// Saving Image with Ajax Call
    $("body").on("click", "#Save", function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            url: "{{ url('img-update') }}", // Url to which the request is send
            data: "cropped_value="+$("#cropped_value").val()+"&imgPath={{$imgPath}}&imgName={{$imgName}}&_token="+ CSRF_TOKEN, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            //contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            //processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function(data){
                console.log(data);
            }
        });
     });

    ////// When user upload image
    $(document).on("change", "#cropper", function() {
         var imagecheck = $(this).data('imagecheck'),
         file = this.files[0],
         imagefile = file.type,
         _URL = window.URL || window.webkitURL;
         img = new Image();
         img.src = _URL.createObjectURL(file);
         img.onload = function() {
         var match = ["image/jpeg", "image/png", "image/jpg"];
         if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
            alert('Please Select A valid Image File');
            return false;
         } else {
           var reader = new FileReader();
           reader.readAsDataURL(file);
           reader.onloadend = function() { // set image data as background of div
           $(document).find('#image_cropper').attr('src', "");
           $(document).find('#image_cropper').attr('src', this.result);
           $('#image_edit').val("")
           $("#myModal").modal("show");
         }
       }
      }
      });



});
</script>
