<x-admin-layout>
    <x-slot name="header">{{ __('Investments') }} </x-slot>
    <div class="row">
        <div class="col-lg-12">
        <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Create a Investment <small>try to scroll the page</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="{{ route('customers.index') }}" class="btn btn-clean kt-margin-r-10">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-brand" id="submit">
                                <i class="la la-check"></i>
                                <span class="kt-hidden-mobile">Save</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <form class="kt-form" id="kt_form_1" action="{{ route('investments.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="kt-form__content">
                            <div class="kt-alert m-alert--icon alert alert-danger kt-hidden" role="alert" id="kt_form_1_msg">
                                <div class="kt-alert__icon">
                                    <i class="la la-warning"></i>
                                </div>
                                <div class="kt-alert__text">
                                    Oh snap! Change a few things up and try submitting again.
                                </div>
                                <div class="kt-alert__close">
                                    <button type="button" class="close" data-close="alert" aria-label="Close">
                                    </button>
                                </div>
                            </div>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">*Title</label>
                                            <div class="col-9">
                                            {!! Form::text('title', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Description</label>
                                            <div class="col-9">
                                            {!! Form::textarea('description', null, array('class' => 'form-control', 'id'=> 'description')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">*Image</label>
                                            <div class="col-9">
                                                <div id="fine-uploader-manual-trigger"></div>
                                                    <div class="pt-1 mt-element-card mt-element-overlay">
                                                        <div class="row" id="imageupload"></div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-group  row">
                                            <label class="col-3 col-form-label">*Files</label>
                                            <div class="col-9">
                                            <div class="m-dropzone dropzone m-dropzone--success"  id="m-dropzone-three" enctype="multipart/form-data">
                                                    <div class="m-dropzone__msg dz-message needsclick">
                                                        <h3 class="m-dropzone__msg-title">
                                                            Click or Drop your file in here
                                                        </h3>
                                                        <span class="m-dropzone__msg-desc">
                                                            Only pdf, doc or similar files
                                                        </span>
                                                    </div>
                                                </div>
                                                <div id="prDp" >
                                                    <table class="table m-table table-striped m-table--head-bg-success">
                                                        <thead>
                                                            <tr>
                                                                <th>Title</th>
                                                                <th>File Name</th>
                                                                <th>Status </th>
                                                                <th>Delete</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2"></div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('/assets/global/plugins/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/fine-uploader/fine-uploader.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.1.3/cropper.min.js"></script>
    <script type="text/template" id="qq-template-manual-trigger">

        <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop Your Image ">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="buttons">
                <div class="qq-upload-button-selector btn m-btn--square m-btn--icon  m-btn m-btn--gradient-from-brand m-btn--gradient-to-info">
                    <div><i class="flaticon-add"></i> Choose Image</div>
                </div>
                <button type="button" id="trigger-upload" class="btn m-btn--square m-btn--icon  m-btn m-btn--gradient-from-brand m-btn--gradient-to-info" style="padding:0.80rem 1rem">
                    <i class="flaticon-folder-4 "></i> Upload
                </button>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Images uploading...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul id="ulPhotoInfoList" class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <div class="qq-progress-bar-container-selector">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <img class="qq-thumbnail-selector" qq-max-size="1" qq-server-scale>
                    <span class="qq-upload-file-selector qq-upload-file"></span>
                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                    <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Again</button>
                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>
    <script>
        $(document).ready(function(){
            $( "form" ).validate({
                //debug:true,
                rules:{
                    title:{
                        required: true,
                    },
                    description:{
                        required: true,
                    },
                    // video:{
                    //     //extension: "mimes:mp4,mov,ogg,webm",
                    //     accept: "video/*",
                    // }
                },
                invalidHandler: function(event, validator) {     
                    var alert = $('#m_form_1_msg');
                    alert.removeClass('m--hide').show();
                    mApp.scrollTo(alert, -200);
                    $('.btn-primary').removeClass('m-loader');
                },
                submitHandler: function (form) {
                    var sortImage = [];
                    var sortTitle = [];
                    var sortDesc = [];
                    if($('#imageupload .mt-card-item').length > 0){
                        $('#imageupload .mt-card-item').each(function(){
                            var id = $('img',this).attr('id');
                            var title = $(".input-group input",this).val();
                            var desc = $("textarea",this).val();
                            sortImage.push(id);
                            sortTitle.push(title);
                            sortDesc.push(desc);
                        });
                        $('#image_new_sort').val(sortImage);
                        $('#image_new_sort_title').val(sortTitle);
                        $('#image_new_sort_desc').val(sortDesc);
                    }
                    var sortFile = [];
                    var sortFileTitle = [];
                    if($('#prDp .sortFile').length > 0){
                        $('#prDp .sortFile').each(function(){
                            var id = $('.name',this).attr('id');
                            var title = $(".input-group input",this).val();
                            sortFile.push(id);
                            sortFileTitle.push(title);
                        });
                        $('#file_new_sort').val(sortFile);
                        $('#file_new_sort_title').val(sortFileTitle);
                    }
                    $('#desc').val(tinyMCE.get('description').getContent({format : 'text'}));
                    form.submit(); // submit the form
                    $('.btn-primary').addClass('m-loader').attr('disabled', true);
                }
            });
            $('#m_maxlength').maxlength({
                threshold: 25,
                warningClass: "m-badge m-badge--success m-badge--rounded m-badge--wide",
                limitReachedClass: "m-badge m-badge--danger m-badge--rounded m-badge--wide"
            });
           
            
        });
        
    </script>
    <script title="editor">
        var editor_config = {
            fontsize_formats: "8px 10px 12px 14px 18px 24px 36px 64px",
            path_absolute : "/",
            // plugins: [
            //     'advlist autolink lists link charmap print preview anchor textcolor',
            //     'searchreplace visualblocks code fullscreen',
            //     'insertdatetime table contextmenu paste help wordcount'
            // ],
            branding: false,
            toolbar: "insertfile undo redo | styleselect | fontsizeselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link ",
            relative_urls: false,
            height:300,
            entity_encoding : "raw",
            selector:'textarea#description',
            /*file_browser_callback:function(field_name,url,type,win){
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name='+field_name;
                if(type == 'image')
                    cmsURL = cmsURL + "&type=Image";
                else {
                    cmsURL = cmsURL + "&type=File";
                }
                tinyMCE.activeEditor.windowManager.open({
                    file:cmsURL,
                    title:'Filemanager',
                    width:x*0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }*/
        };
        tinymce.init(editor_config);
        
    </script>
    <script title="image">
        $(document).ready(function(){
            $( "#imageupload" ).sortable({
                connectWith: ".sort",
                handle: ".input-group-prepend",
            });
        });
        maxfiles = '1';
        imageCount = $("#imageupload img").length;
        if(imageCount == 0) $("#imageupload").html('<div id="empty-image" class="has-danger" style="padding-left:15px;"><input type="hidden" name="image[0]"  /></div>');
     	if(imageCount > 0){
     		xmaxfiles = maxfiles - imageCount;
    		n = imageCount;
     	}
     	else{
     		n = 0;
     	}
         var manualUploader = new qq.FineUploader({
            element: document.getElementById('fine-uploader-manual-trigger'),
            template: 'qq-template-manual-trigger',
            request: {
                endpoint: "{{ url('upload') }}",
                customHeaders:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                params: {"num": n,"divId": n}
            },
            thumbnails: {
                placeholders: {
                    waitingPath: "{{ asset('js/fine-uploader/placeholders/waiting-generic.png') }}",
                    notAvailablePath: "{{ asset('js/fine-uploader/placeholders/not_available-generic.png') }}"
                }
            },
            // retry: {
            //     enableAuto: true // defaults to false
            // },
            validation: {
                itemLimit: 1,
                acceptFiles: 'image/*',
                //allowedExtensions: ['.jpe', '.jpg', '.jpeg', '.gif', '.png', '.bmp', '.ico', '.svg', '.svgz', '.tif', '.tiff', '.ai', '.drw', '.pct', '.psp', '.xcf', '.psd', '.raw']
                //sizeLimit: 15000000
            },
            autoUpload: false,
            debug: true,
            scaling: {
                sendOriginal: false,
                sizes: [
                    {maxSize: 1200}
                ]
            },
            callbacks: {
                onComplete: function(id, fileName, responseText){
                    // if(responseText.success){
                    //     var imageNo = $(".image-container img").length;
                    //     $('#imageEmpty'+imageNo).hide();
                    //     console.log(responseText.imageNo);
                    //     var image = '<span class="port-header-arrow port-header" style="position: absolute;left: 25px;top: 6px;"><i class="fa fa-arrows-alt text-info"></i></span>'+
                    //     '<div class="form-group port-header" style="padding-top:3px;margin-bottom:0;" > &nbsp; </div>'+
                    //     '<div class="image-container port-header" style="height:150px;">'+
                    //     '<img src="{{ asset('/img/imagetmp/') }}/'+responseText.uuid+'/'+fileName +'" class="scale img-fluid" id="'+fileName+'" style="height:128px">'+
                    //     '<input type="hidden" name="image['+imageNo+']" value="'+fileName+'">'+
                    //     '</div>'+
                    //     '<div id="deleteLink'+imageNo+'" width="100%" align="center" style="margin-top:4px;">'+
                    //     //'<a href="javascript:;" class="btn btn-icon-only green tooltips" style="margin-right:10px;" data-original-title="Edit" data-container="body" data-placement="bottom" onclick="rot('+imageNo+', \''+responseText.uuid+'\',\''+fileName+'\')"><i class="fa fa-magic"></i></a>'+
                    //     '<a href="javascript:;" class="btn btn-icon-only red tooltips" data-original-title="Delete" data-container="body" data-placement="bottom" onclick="delete_image(0,'+imageNo+',\''+fileName+'\');"><i class="fa fa-trash"></i></a>'+
                    //     '</div>';
                    //     $('#ulPhotoInfoList').html('');
                    //     $('#image'+imageNo).prepend(image);
                    //     $('#deleteLink'+imageNo+' a').tooltip();
                    // }
                    if(responseText.success){
                        var imageNo = $("#imageupload img").length;
                        if(imageNo == 0){
                            $('#empty-image').remove();
                        }
                        var image ='<div class="col-sm-4 sort" id="image_'+imageNo+'"><div class="mt-card-item"><div class="mt-card-avatar mt-overlay-1 mb-0">'+
                            '<img src="{{ asset('/img/imagetmp/') }}/'+responseText.uuid+'/'+responseText.uploadName +'" id="'+responseText.uploadName+'" style="height:128px">'+
                            '<input type="hidden" name="image['+imageNo+']" value="'+responseText.uploadName+'">'+
                            '<div class="mt-overlay"><ul class="mt-info"><li>'+
                                '<a class="btn btn-outline-metal m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x" href="javascript:;" onclick="rot('+imageNo+',\''+responseText.uuid+'\' ,\''+responseText.uploadName+'\')" title="Düzenle"><i class="la la-magic"></i></a>'+
                                '</li><li>'+
                                '<a class="btn btn-outline-metal m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x red" href="javascript:;" onclick="delete_image('+imageNo+',0,\''+responseText.uploadName+'\',\'image_'+imageNo+'\');" title="Sil"><i class="la la-trash"></i></a></li>'+
                            '</ul></div></div>'+
                            '<div class="mt-card-content"><div class="input-group m-input-group">'+
                            '<div class="input-group-prepend"><span class="input-group-text fa fa-arrows-alt"></span></div>'+
                            '<input type="text" class="form-control m-input m-input--square" placeholder="Title" name="imagetitle['+imageNo+']">'+
                            '</div><textarea class="form-control m-input m-input--square" name="imagetext['+imageNo+']" placeholder="açıklama giriniz"></textarea>'+
                            '</div></div></div>';
                         
                        $('.qq-file-id-'+id+'.qq-upload-success').remove();
                        $('#imageupload').append(image);
                        $('#deleteLink'+imageNo+' a').tooltip();
                    }
                },
                onUpload: function(id) {
                    console.log(id);
                }
            },
            messages:{
                tooManyItemsError:'Your upload limit is {itemLimit}!'
            }
        });
        
        qq(document.getElementById("trigger-upload")).attach("click", function() {
            manualUploader.uploadStoredFiles();
        });

        
        function delete_image(id,uuid,name,image_id) {
            swal({
                title: 'Are you sure to delete?',
                type: 'warning',
                showCancelButton: true,
                allowOutsideClick: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then(function(result) {
                if(result.value){
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        beforeSend: function(xhr){
                            $('#' + image_id+' .mt-overlay').addClass('m-loader');
                            $('#' + image_id+' .mt-overlay').css('opacity','1');
                        },
                        complete: function(){
                            $('#' + image_id+' .mt-overlay').removeClass('m-loader');
                            $('#' + image_id+' .mt-overlay').css('opacity','0');
                        },
                        type: "POST",
                        url: '/img-del/',
                        data: "imageId=" + id + "&imageNo=" + uuid + "&name="+name+"&_token="+ CSRF_TOKEN,
                        cache: false,
                        success: function(data){
                            if(data == 'success'){
                                $('#' + image_id).remove();
                            }else{
                                showAlert('Upps','The image couldn`t deleted!Please try again.','error',false);
                            }
                        }
                    });
                }       
            });
        }
        function rot(id,imgPath,imgName){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                beforeSend: function(){
        			mApp.blockPage();
        	   	},
        	   	complete: function(){
        			mApp.unblockPage();
        	   	},
        		type:"POST",url: '/img-edit',
                data: "imgPath=" + imgPath + "&imgName=" + imgName + "&_token="+ CSRF_TOKEN,
                cache:false,success:function(html)
        		{
        			$("#img_modal").html(html);
        			$('#img_modal').modal({
        			  backdrop :'static'
        			});
        			$('#rotate_onay').click(function() {
        				$('#img_modal').modal('hide');
        				var url_data = "imgPath="+imgPath+"&imgName="+imgName+"&imgRotateAngle="+$('#imgRotateAngle').val()+"&imgNo="+id;
        				$.ajax({
        					beforeSend: function(){
        						$('#loader'+id).show();
        						$("#deleteLink"+id).hide();
        						$('#image'+id).html("");
        						$('#image'+id).hide();

        					},
        					complete: function(){
        						$('#loader'+id).hide();
        						$('#img_modal').html('');
        					},
        					type:"POST",url:HOST+'/images/rotate_save',data:url_data,cache:false,success:function(html){
        						$('#image'+id).html(html);
        						$('#image'+id+' img.scale').load(function() {
        							$( this ).imageScale({scale: 'best-fit'});
        							$('#image'+id).show();
        							$( this ).css('max-height','140px');
        						});
        					}
        				});
        			});
        		}
        	});
        }
    </script>
    <script title="file">
       
        //Kayıtlı Dosya Silme 
        function deletedFile(id){
            $('#row_'+id+' .fa-trash ').addClass('m-btn--custom m-loader m-loader--primary');
            swal({
                title: 'Are You Sure?',
                type: 'warning',
                showCancelButton: true,
                allowOutsideClick: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then(function(result) {
                if(result.value){
                    $('#row_'+id).remove();
                    $('#deleteFile').append('<input type="hidden" name="deleteFile[]" value="'+id+'" />');
                }else{
                    $('#row_'+id+' .fa-trash ').removeClass('m-btn--custom m-loader m-loader--primary');
                }
            });
        }
        // Tmp Dosya Silme
        function deletedFileTmp(id,name){
            swal({
                title: 'Are You Sure?',
                type: 'warning',
                showCancelButton: true,
                allowOutsideClick: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then(function(result) {
                if(result.value){
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        beforeSend: function(xhr){
                            $('#tmp_'+id+' .fa-trash ').addClass('m-btn--custom m-loader m-loader--primary');
                        },
                        complete: function(){
                            $('#tmp_'+id+' .fa-trash ').removeClass('m-btn--custom m-loader m-loader--primary');
                        },
                        type: "POST",
                        url: '/file-delete',
                        data: "&name="+name+"&_token="+ CSRF_TOKEN,
                        cache: false,
                        success: function(data){
                            if(data.status == 'success'){
                                $('#tmp_'+id).remove();
                            }else{
                                showAlert('İşlem Başarısız','File couldn`t deleted! Please try agin.','error',false);
                            }
                        }
                    });
                }       
            });
        }
        // Dosya Ekleme
        var DropzoneDemo = function () {    
            var demos = function () {
                Dropzone.options.mDropzoneThree = {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('file-upload') }}",
                    method:'post',
                    addRemoveLinks : true,
                    //maxFilesize: 5,
                    timeout:0,
                    acceptedFiles: "application/*,text/*,.doc,.docx",
                    //dictDefaultMessage: 'Dosyaları yüklemek için buraya bırakın.',
                    //dictResponseError: 'Yükleme hatası!',
                    //dictFallbackMessage : "Tarayıcınız sürükle bırak dosya yüklemelerini desteklemiyor.",
                    //dictFallbackText : "Please use the fallback form below to upload your files like in the olden days.",
                    //dictFileTooBig : "Dosya çok büyük.",
                    //dictInvalidFileType : "Bu tür dosyaları yükleyemezsiniz!",
                    //dictCancelUpload : "İptal",
                    //dictCancelUploadConfirmation : "Bu yüklemeyi iptal etmek istediğinize emin misiniz?",
                    //dictRemoveFile : "Sil",
                    //dictMaxFilesExceeded : "Daha fazla dosya yükleyemezsiniz.",
                    init: function () {
                        this.on("complete", function(file) {
                            var file_count = $('table tbody tr').length+1;
                            if(file.status == 'success'){
                                $('#prDp tbody').append('<tr id="tmp_'+file_count+'" class="sortFile">'+
                                    '<td><div class="input-group m-input-group"><div class="input-group-prepend">'+
                                    '<span class="input-group-text fa fa-arrows-alt"></span></div>'+
                                    '<input type="text" class="form-control m-input m-input--square" placeholder="Title" name="fileTitle[]" ></div></td>'+
                                    '<td class="name" id="'+file.name+'">'+file.name+'<input type="hidden" name="file[]" value="'+file.name+'"/></td>'+
                                    '<td><span class="fa fa-check"> Successful </span></td>'+
                                    '<td><a class="fa fa-trash" href="javascript:;" onclick="deletedFileTmp(\''+file_count+'\',\''+file.name +' \');"></a></td>'+
                                '</tr>');
                                this.removeFile(file);
                                $('#prDp').show();
                            }else if(file.status == 'error'){
                                $('#prDp tbody').append('<tr id="tmp_'+file_count+'"  class="sortFile">'+
                                    '<td></td><td class="name" id="'+file.name+'">'+file.name+'</td>'+
                                    '<td><span class="fa fa-close"></span> Failed </td>'+
                                    '<td><a class="fa fa-trash" href="javascript:;" onclick="deletedFileTmp(\''+file_count+'\',\''+file.name +' \');"></a></td>'+
                                '</tr>');
                                this.removeFile(file);
                                $('#prDp').show();
                            }
                        });
                    }
                };
            }
            return {
                init: function() {
                    demos();
                    $( "#prDp tbody" ).sortable({
                        connectWith: ".sortFile",
                        placeholder: "ui-state-highlight",
                        handle: ".input-group-prepend",
                    });
                }
            };
        }();
        DropzoneDemo.init();
    </script>
    @endpush
    @push('css')
    <link href="{{ asset('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('js/fine-uploader/fine-uploader-new.css') }}" rel="stylesheet">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.1.3/cropper.css" rel="stylesheet">
    <style>
        .ui-state-highlight { height: 60px; }
        #fine-uploader-manual-trigger .qq-upload-button {
            margin-right: 15px;
        }
        #fine-uploader-manual-trigger .qq-uploader .qq-total-progress-bar-container {
            width: 50%;
        }
        .mt-element-card .mt-card-item {
            border: 1px solid;
            border-color: #e7ecf1;
            position: relative;
            margin-bottom: 30px; 
        }
        .mt-element-card .mt-card-item .mt-card-avatar {
            margin-bottom: 15px; 
        }
        .mt-element-card .mt-card-item .mt-card-content {
            text-align: center; 
        }
            .mt-element-card .mt-card-item .mt-card-content .mt-card-name {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px; 
        }
            .mt-element-card .mt-card-item .mt-card-content .mt-card-desc {
            font-size: 14px;
            margin: 0 0 10px 0; 
        }
            .mt-element-card .mt-card-item .mt-card-content .mt-card-social > ul {
            padding: 0;
            margin-bottom: 10px; 
        }
        .mt-element-card .mt-card-item .mt-card-content .mt-card-social > ul > li {
            list-style: none;
            display: inline-block;
            margin: 0 3px; 
        }
            .mt-element-card .mt-card-item .mt-card-content .mt-card-social > ul > li > a {
            color: #000;
            font-size: 18px; 
        }
        .mt-element-card .mt-card-item .mt-card-content .mt-card-social > ul > li > a.mt-card-btn {
            color: #fff; 
        }
            .mt-element-card .mt-card-item .mt-card-content .mt-card-social > ul > li > a.mt-card-btn:hover {
            color: #36c6d3; 
        }
        .mt-element-card .mt-card-item .mt-card-content .mt-card-social > ul > li > a:hover {
            color: #F1C40F; 
        }
        .mt-element-card.mt-card-round .mt-card-item {
            padding: 40px 40px 10px 40px; 
        }
        .mt-element-card.mt-card-round .mt-card-item .mt-card-avatar {
            border-radius: 50% !important;
            -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC); 
        }
        .mt-element-card.mt-card-round .mt-card-item .mt-card-avatar .mt-overlay {
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            border-radius: 50%; 
        }
        .mt-element-overlay .mt-overlay-1 {
            width: 100%;
            height: 100%;
            float: left;
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: default; 
        }
        .mt-element-overlay .mt-overlay-1 img {
            display: block;
            position: relative;
            -webkit-transition: all .4s linear;
            transition: all .4s linear;
            width: 100%;
            height: auto; 
        }
        .mt-element-overlay .mt-overlay-1 h2 {
            text-transform: uppercase;
            color: #fff;
            text-align: center;
            position: relative;
            font-size: 17px;
            background: rgba(0, 0, 0, 0.6);
            -webkit-transform: translatey(-100px) translateZ(0);
            -ms-transform: translatey(-100px) translateZ(0);
            transform: translatey(-100px) translateZ(0);
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            padding: 10px; 
        }
        .mt-element-overlay .mt-overlay-1 .mt-info {
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            color: #fff;
            background-color: transparent;
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            padding: 0;
            margin: auto;
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%) translateZ(0);
            -webkit-transform: translateY(-50%) translateZ(0);
            -ms-transform: translateY(-50%) translateZ(0); }
            .mt-element-overlay .mt-overlay-1 .mt-info > li {
            list-style: none;
            display: inline-block;
            margin: 0 3px; 
        }
        .mt-element-overlay .mt-overlay-1 .mt-info > li:hover {
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            cursor: pointer; 
        }
        .mt-element-overlay .mt-overlay-1:hover .mt-overlay {
            opacity: 1;
            filter: alpha(opacity=100);
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0); 
        }
        .mt-element-overlay .mt-overlay-1:hover img {
            -ms-transform: scale(1.2) translateZ(0);
            -webkit-transform: scale(1.2) translateZ(0);
            transform: scale(1.2) translateZ(0); 
        }
        .mt-element-overlay .mt-overlay-1:hover .mt-info {
            opacity: 1;
            filter: alpha(opacity=100);
            -webkit-transition-delay: .2s;
            transition-delay: .2s; 
        }
        .mt-element-overlay .mt-overlay-1 .mt-overlay {
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.7);
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out; 
        }
        .mt-element-overlay .mt-overlay-1.mt-scroll-up:hover .mt-overlay {
            bottom: 0; 
        }
        .mt-element-overlay .mt-overlay-1.mt-scroll-up .mt-overlay {
            bottom: -100%;
            top: auto; 
        }
        .mt-element-overlay .mt-overlay-1.mt-scroll-down:hover .mt-overlay {
            top: 0; 
        }
        .mt-element-overlay .mt-overlay-1.mt-scroll-down .mt-overlay {
            top: -100%; 
        }
        .mt-element-overlay .mt-overlay-1.mt-scroll-left:hover .mt-overlay {
            right: 0; }
        .mt-element-overlay .mt-overlay-1.mt-scroll-left .mt-overlay {
            right: -100%;
            left: auto; 
        }
        .mt-element-overlay .mt-overlay-1.mt-scroll-right:hover .mt-overlay {
            left: 0; 
        }
        .mt-element-overlay .mt-overlay-1.mt-scroll-right .mt-overlay {
            left: -100%; 
        }
              
        .mt-element-overlay .mt-overlay-2 {
            width: 100%;
            height: 100%;
            float: left;
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: default; 
        }
        .mt-element-overlay .mt-overlay-2 img {
            display: block;
            position: relative;
            -webkit-transition: all 0.4s ease-in;
            transition: all 0.4s ease-in;
            width: 100%;
            height: auto; }
        .mt-element-overlay .mt-overlay-2 h2 {
            text-transform: uppercase;
            text-align: center;
            position: relative;
            font-size: 17px;
            padding: 10px;
            background: rgba(0, 0, 0, 0.6); 
        }
        .mt-element-overlay .mt-overlay-2 .mt-info,.mt-element-overlay .mt-overlay-2 h2 {
            -webkit-transform: scale(0.7);
            -ms-transform: scale(0.7);
            transform: scale(0.7);
            -webkit-transition: all 0.4s ease-in;
            transition: all 0.4s ease-in;
            opacity: 0;
            filter: alpha(opacity=0);
            color: #fff;
            text-transform: uppercase; 
        }
        .mt-element-overlay .mt-overlay-2 .mt-info {
            display: inline-block;
            text-decoration: none;
            margin: auto;
            position: absolute;
            top: 50%;
            -webkit-transform: scale(0.7) translateY(-50%) translateX(-50%);
            -ms-transform: scale(0.7) translateY(-50%) translateX(-50%);
            transform: scale(0.7) translateY(-50%) translateX(-50%); 
        }
        .mt-element-overlay .mt-overlay-2 .mt-info:hover {
            box-shadow: 0 0 5px #fff; 
        }
        .mt-element-overlay .mt-overlay-2:hover img {
            filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feColorMatrix type="matrix" color-interpolation-filters="sRGB" values="0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0 0 0 1 0" /><feGaussianBlur stdDeviation="3" /></filter></svg>#filter');
            filter: blur(3px);
            -webkit-filter: blur(3px);
            -webkit-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2); 
        }
        .mt-element-overlay .mt-overlay-2:hover .mt-overlay {
            opacity: 1;
            filter: alpha(opacity=100);
            -webkit-transition-delay: 0s;
            transition-delay: 0s;
            -webkit-transform: translate(0px, 0px);
            -ms-transform: translate(0px, 0px);
            transform: translate(0px, 0px); 
        }
        .mt-element-overlay .mt-overlay-2:hover h2 {
            -webkit-transition-delay: 0.5s;
            transition-delay: 0.5s; 
        }
        .mt-element-overlay .mt-overlay-2:hover .mt-info,
        .mt-element-overlay .mt-overlay-2:hover h2 {
            opacity: 1;
            filter: alpha(opacity=100);
            -webkit-transform: scale(1) translateY(-50%);
            -ms-transform: scale(1) translateY(-50%);
            transform: scale(1) translateY(-50%); 
        }
        .mt-element-overlay .mt-overlay-2:hover .mt-info {
            -webkit-transform: scale(1) translateY(-50%) translateX(-50%);
            -ms-transform: scale(1) translateY(-50%) translateX(-50%);
            transform: scale(1) translateY(-50%) translateX(-50%); 
        }
        .mt-element-overlay .mt-overlay-2 .mt-overlay {
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0; 
        }
        .mt-element-overlay .mt-overlay-2.mt-overlay-2-grey:hover img {
            filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feColorMatrix type="matrix" color-interpolation-filters="sRGB" values="0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0 0 0 1 0" /><feGaussianBlur stdDeviation="3" /></filter></svg>#filter');
            filter: grayscale(1) blur(3px);
            -webkit-filter: grayscale(1) blur(3px); 
        }
        .mt-element-overlay .mt-overlay-2.mt-overlay-2-icons .mt-info {
            border: none;
            width: 100%;
            padding: 0;
            -webkit-transform: scale(0.7) translateY(-50%) translateX(-50%);
            -ms-transform: scale(0.7) translateY(-50%) translateX(-50%);
            transform: scale(0.7) translateY(-50%) translateX(-50%); 
        }
        .mt-element-overlay .mt-overlay-2.mt-overlay-2-icons .mt-info:hover {
            box-shadow: none; 
        }
        .mt-element-overlay .mt-overlay-2.mt-overlay-2-icons .mt-info > li {
            list-style: none;
            display: inline-block;
            margin: 0 3px; 
        }
        .mt-element-overlay .mt-overlay-2.mt-overlay-2-icons .mt-info > li:hover {
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            cursor: pointer; 
        }
        .mt-element-overlay .mt-overlay-2.mt-overlay-2-icons:hover .mt-info {
            -webkit-transform: scale(1) translateY(-50%) translateX(-50%);
            -ms-transform: scale(1) translateY(-50%) translateX(-50%);
            transform: scale(1) translateY(-50%) translateX(-50%); 
        }
        .mt-element-overlay .mt-overlay-3 {
            width: 100%;
            height: 100%;
            float: left;
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: default; 
        }
        .mt-element-overlay .mt-overlay-3 img {
            display: block;
            position: relative;
            width: 100%;
            height: auto; 
        }
        .mt-element-overlay .mt-overlay-3 h2 {
            text-transform: uppercase;
            color: #fff;
            text-align: center;
            position: relative;
            font-size: 17px;
            padding: 10px;
            background: rgba(0, 0, 0, 0.6);
            -webkit-transform: translateY(100px);
            -ms-transform: translateY(100px);
            transform: translateY(100px);
            -webkit-transition: all 0.4s cubic-bezier(0.88, -0.99, 0, 1.81);
            transition: all 0.4s cubic-bezier(0.88, -0.99, 0, 1.81); 
        }
        .mt-element-overlay .mt-overlay-3 .mt-info {
            display: inline-block;
            text-decoration: none;
            text-transform: uppercase;
            color: #fff;
            border: 1px solid #fff;
            background-color: transparent;
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transform: scale(0);
            -ms-transform: scale(0);
            transform: scale(0);
            -webkit-transition: all 0.4s cubic-bezier(0.88, -0.99, 0, 1.81);
            transition: all 0.4s cubic-bezier(0.88, -0.99, 0, 1.81);
            font-weight: normal;
            position: absolute;
            top: 15px;
            bottom: 15px;
            left: 15px;
            right: 15px;
            margin: auto;
            padding: 45% 0 0 0; 
        }
        .mt-element-overlay .mt-overlay-3 .mt-info:hover {
            box-shadow: 0 0 5px #fff; 
        }
        .mt-element-overlay .mt-overlay-3:hover .mt-overlay {
            background-color: rgba(48, 152, 157, 0.7); 
        }
        .mt-element-overlay .mt-overlay-3:hover h2 {
            -webkit-transform: translateY(5px);
            -ms-transform: translateY(5px);
            transform: translateY(5px); 
        }
        .mt-element-overlay .mt-overlay-3:hover .mt-info {
            opacity: 1;
            filter: alpha(opacity=100);
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1); 
        }
        .mt-element-overlay .mt-overlay-3 .mt-overlay {
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
            background-color: rgba(75, 75, 75, 0.7);
            -webkit-transition: all 0.4s cubic-bezier(0.88, -0.99, 0, 1.81);
            transition: all 0.4s cubic-bezier(0.88, -0.99, 0, 1.81); 
        }
        .mt-element-overlay .mt-overlay-3.mt-overlay-3-icons .mt-info {
            padding: 40% 0 0 0; 
        }
        .mt-element-overlay .mt-overlay-3.mt-overlay-3-icons .mt-info > li {
            list-style: none;
            display: inline-block;
            margin: 0 3px; 
        }
        .mt-element-overlay .mt-overlay-3.mt-overlay-3-icons .mt-info > li:hover {
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            cursor: pointer; 
        }
        .mt-element-overlay .mt-overlay-4 {
            width: 100%;
            height: 100%;
            float: left;
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: default; 
        }
        .mt-element-overlay .mt-overlay-4 img {
            display: block;
            position: relative;
            -webkit-transition: all 0.4s cubic-bezier(0.88, -0.99, 0, 1.81);
            transition: all 0.4s cubic-bezier(0.88, -0.99, 0, 1.81);
            width: 100%;
            height: auto;
        }
        .mt-element-overlay .mt-overlay-4 h2 {
            text-transform: uppercase;
            color: #fff;
            text-align: center;
            position: relative;
            font-size: 17px;
            background: rgba(0, 0, 0, 0.6);
            -webkit-transform: translatey(-100px);
            -ms-transform: translatey(-100px);
            transform: translatey(-100px);
            -webkit-transition: all 0.4s cubic-bezier(0.88, -0.99, 0, 1.81);
            transition: all 0.4s cubic-bezier(0.88, -0.99, 0, 1.81);
            padding: 10px; 
        }
        .mt-element-overlay .mt-overlay-4 .mt-info {
            display: inline-block;
            text-transform: uppercase;
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transition: all 0.4s ease;
            transition: all 0.4s ease;
            margin: 50px 0 0; 
        }
        .mt-element-overlay .mt-overlay-4:hover .mt-overlay {
            opacity: 1;
            filter: alpha(opacity=100); 
        }
        .mt-element-overlay .mt-overlay-4:hover h2,
        .mt-element-overlay .mt-overlay-4:hover .mt-info {
            opacity: 1;
            filter: alpha(opacity=100);
            -ms-transform: translatey(0);
            -webkit-transform: translatey(0);
            transform: translatey(0); 
        }
        .mt-element-overlay .mt-overlay-4:hover .mt-info {
            -webkit-transition-delay: .2s;
            transition-delay: .2s; 
        }
        .mt-element-overlay .mt-overlay-4 .mt-overlay {
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
            opacity: 0;
            filter: alpha(opacity=0);
            background-color: rgba(0, 0, 0, 0.7);
            -webkit-transition: all 0.4s cubic-bezier(0.88, -0.99, 0, 1.81);
            transition: all 0.4s cubic-bezier(0.88, -0.99, 0, 1.81); 
        }
        .mt-element-overlay .mt-overlay-4.mt-overlay-4-icons .mt-info {
            border: none;
            position: absolute;
            padding: 0;
            top: 50%;
            left: 0;
            right: 0;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            margin: auto;
        }
        .mt-element-overlay .mt-overlay-4.mt-overlay-4-icons .mt-info:hover {
            box-shadow: none; 
        }
        .mt-element-overlay .mt-overlay-4.mt-overlay-4-icons .mt-info > li {
            list-style: none;
            display: inline-block;
            margin: 0 3px; 
        }
        .mt-element-overlay .mt-overlay-4.mt-overlay-4-icons .mt-info > li:hover {
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            cursor: pointer; 
        }
        .mt-element-overlay .mt-overlay-5 {
            width: 100%;
            height: 100%;
            float: left;
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: default;
            background: -webkit-linear-gradient(45deg, #ff89e9 0%, #05abe0 100%);
            background: linear-gradient(45deg, #ff89e9 0%, #05abe0 100%); 
        }
        .mt-element-overlay .mt-overlay-5 .mt-overlay {
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
            padding: 3em;
            text-align: left; 
        }
        .mt-element-overlay .mt-overlay-5 .mt-overlay:before {
            position: absolute;
            top: 20px;
            right: 20px;
            bottom: 20px;
            left: 20px;
            border: 1px solid #fff;
            content: '';
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
            transition: opacity 0.35s, transform 0.45s;
            -webkit-transform: translate3d(-20px, 0, 0);
            transform: translate3d(-20px, 0, 0); 
        }
        .mt-element-overlay .mt-overlay-5 img {
            display: block;
            position: relative;
            max-width: none;
            width: calc(113% + 60px);
            -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
            transition: opacity 0.35s, transform 0.45s;
            -webkit-transform: translate3d(-40px, 0, 0);
            transform: translate3d(-40px, 0, 0); 
        }
        .mt-element-overlay .mt-overlay-5 h2 {
            text-transform: uppercase;
            color: #fff;
            position: relative;
            font-size: 17px;
            background-color: transparent;
            padding: 15% 0 10px 0;
            text-align: left; 
        }
        .mt-element-overlay .mt-overlay-5 a,
        .mt-element-overlay .mt-overlay-5 p {
            color: #FFF;
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
            transition: opacity 0.35s, transform 0.45s;
            -webkit-transform: translate3d(-10px, 0, 0);
            transform: translate3d(-10px, 0, 0); 
        }
        .mt-element-overlay .mt-overlay-5 a:hover {
            text-decoration: none;
            opacity: 0.6;
            filter: alpha(opacity=60); 
        }
        .mt-element-overlay .mt-overlay-5:hover img {
            opacity: 0.6;
            filter: alpha(opacity=60);
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0); 
        }
        .mt-element-overlay .mt-overlay-5:hover .mt-overlay:before,
        .mt-element-overlay .mt-overlay-5:hover a,
        .mt-element-overlay .mt-overlay-5:hover p {
            opacity: 1;
            filter: alpha(opacity=100);
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0); 
        }
        .mt-element-overlay .mt-overlay-6 {
            width: 100%;
            height: 100%;
            float: left;
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: default;
            background: #42b078; 
        }
        .mt-element-overlay .mt-overlay-6 .mt-overlay {
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
            padding: 50px 20px; 
        }
        .mt-element-overlay .mt-overlay-6 img {
            display: block;
            position: relative;
            max-width: none;
            width: calc(100% + 20px);
            -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
            transition: opacity 0.35s, transform 0.35s;
            -webkit-transform: translate3d(-10px, 0, 0);
            transform: translate3d(-10px, 0, 0);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden; 
        }
        .mt-element-overlay .mt-overlay-6 h2 {
            text-transform: uppercase;
            color: #fff;
            text-align: center;
            position: relative;
            font-size: 17px;
            overflow: hidden;
            padding: 0.5em 0;
            background-color: transparent; 
        }
        .mt-element-overlay .mt-overlay-6 h2:after {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: #fff;
            content: '';
            -webkit-transition: -webkit-transform 0.35s;
            transition: transform 0.35s;
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0); 
        }
        .mt-element-overlay .mt-overlay-6 a,
        .mt-element-overlay .mt-overlay-6 p {
            color: #FFF;
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
            transition: opacity 0.35s, transform 0.35s;
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0); 
        }
        .mt-element-overlay .mt-overlay-6 p {
            margin-top: 20px; 
        }
        .mt-element-overlay .mt-overlay-6 .mt-info:hover {
            text-decoration: none;
            opacity: 0.6;
            filter: alpha(opacity=60);
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            cursor: pointer; 
        }
        .mt-element-overlay .mt-overlay-6:hover img {
            opacity: 0.4;
            filter: alpha(opacity=40);
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0); 
        }
        .mt-element-overlay .mt-overlay-6:hover h2:after {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0); 
        }
        .mt-element-overlay .mt-overlay-6:hover a,
        .mt-element-overlay .mt-overlay-6:hover p {
            opacity: 1;
            filter: alpha(opacity=100);
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0); 
        }
        </style>
@endpush
</x-admin-layout>

<!-- Script loading  -->

