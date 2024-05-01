<div id="image<?php echo e($imageNo); ?>" align="center" class="port-content sort">
    <?php if($is_image): ?>
		<span class="port-header-arrow port-header" style="position: absolute;left: 25px;top: 6px;"><i class="fa fa-arrows-alt text-info"></i></span>
		<div class="form-group port-header" style="padding-top:3px;margin-bottom:0;" > &nbsp; </div>
	<?php endif; ?>
	<?php if($is_image && isset($imageName)): ?>
		<div class="image-container port-header" style="height:150px;">
            <img src="<?php echo e(asset('/img/uploads/'.$property->id.'/'.$imageName)); ?>" class="scale img-fluid" id="<?php echo e($imageName); ?>" style="height:128px">
            <input type="hidden" name="image[<?php echo e($imageNo); ?>]" value="<?php echo e($imageName); ?>">
        </div>
    <?php endif; ?>
    <?php if($is_image && isset($imageName)): ?>
        <div id="deleteLink<?php echo e($imageNo); ?>" width="100%" align="center" style="margin-top:4px;">
        <?php if(isset($img)): ?>    
        <a href="javascript:;" class="btn btn-icon-only green tooltips" style="margin-right:10px;" data-original-title="Edit" data-container="body" data-placement="bottom" onclick="rot(<?php echo e($imageNo); ?>, '<?php echo e('/img/uploads/'.$property->id); ?>','<?php echo e($imageName); ?>')"><i class="fa fa-magic"></i></a>
        <?php endif; ?>
        <a href="javascript:;" class="btn btn-icon-only red tooltips" data-original-title="Delete" data-container="body" data-placement="bottom" onclick="deletedImage(<?php echo e($imageId); ?>,<?php echo e($imageNo); ?>);"><i class="fa fa-trash"></i></a>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/u390945238/domains/umove.london/resources/views/admin/properties/upload.blade.php ENDPATH**/ ?>