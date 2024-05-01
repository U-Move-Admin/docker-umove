<?php header('content-type: text/html; charset=iso-8859-9');?>
<span class="port-header-arrow port-header" style="position: absolute;left: 25px;top: 6px;"><i class="fa fa-arrows-alt text-info"></i></span>
<div class="form-group port-header" style="padding-top:3px;margin-bottom:0;" > &nbsp; </div>

<div class="image-container port-header" style="height:150px;">
	<img src="{{ asset('/img/imagetmp/'.$imagePath.'/'.$imageName) }} " alt="" class="scale img-fluid" id="{{$imageName}}" style="height:128px">
    <input type="hidden" name="image[{{$imageNo}}]" value="{{$imageName}}">
</div>
<div id="deleteLink{{$imageNo}}" width="100%" align="center" style="margin-top:4px;">
    <a href="javascript:void(0)" class="btn btn-icon-only red tooltips" data-original-title="Edit" data-container="body" data-placement="bottom" onclick=""><i class="fa fa-magic"></i></a>
    <a href="javascript:void(0)" class="btn btn-icon-only red tooltips" data-original-title="Delete" data-container="body" data-placement="bottom" onclick=""><i class="fa fa-trash"></i></a>
</div>
