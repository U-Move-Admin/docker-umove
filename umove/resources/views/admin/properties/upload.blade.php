<div id="image{{$imageNo}}" align="center" class="port-content sort">
    @if($is_image)
		<span class="port-header-arrow port-header" style="position: absolute;left: 25px;top: 6px;"><i class="fa fa-arrows-alt text-info"></i></span>
		<div class="form-group port-header" style="padding-top:3px;margin-bottom:0;" > &nbsp; </div>
	@endif
	@if($is_image && isset($imageName))
		<div class="image-container port-header" style="height:150px;">
            <img src="{{ asset('/img/uploads/'.$property->id.'/'.$imageName) }}" class="scale img-fluid" id="{{$imageName}}" style="height:128px">
            <input type="hidden" name="image[{{$imageNo}}]" value="{{$imageName}}">
        </div>
    @endif
    @if($is_image && isset($imageName))
        <div id="deleteLink{{$imageNo}}" width="100%" align="center" style="margin-top:4px;">
        @if(isset($img))    
        <a href="javascript:;" class="btn btn-icon-only green tooltips" style="margin-right:10px;" data-original-title="Edit" data-container="body" data-placement="bottom" onclick="rot({{$imageNo}}, '{{ '/img/uploads/'.$property->id}}','{{ $imageName }}')"><i class="fa fa-magic"></i></a>
        @endif
        <a href="javascript:;" class="btn btn-icon-only red tooltips" data-original-title="Delete" data-container="body" data-placement="bottom" onclick="deletedImage({{$imageId}},{{$imageNo}});"><i class="fa fa-trash"></i></a>
        </div>
    @endif
</div>
