<!-- Search area start -->
<div class="widget search-area">
    <h5 class="sidebar-title">Filter</h5>
    <div class="search-area-inner">
        <div class="search-contents ">
            <form method="GET" id="search_listing_form">
                <div class="form-group">
                    <label>City</label>
                    <select class="selectpicker search-fields" name="city" id="city">
                        <option value="">City</option>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(isset($data['city']) && $data['city'] === $item ? 'selected': ''); ?> value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Bedroom Number</label>
                    <select class="selectpicker search-fields" name="bedroom" id="bedroom">
                        <option value="">Bedroom</option>
                        <option <?php echo e(isset($data['bedroom']) && $data['bedroom'] === "1" ? 'selected': ''); ?> value="1">1</option>
                        <option <?php echo e(isset($data['bedroom']) && $data['bedroom'] === "2" ? 'selected': ''); ?>  value="2">2</option>
                        <option <?php echo e(isset($data['bedroom']) && $data['bedroom'] === "3" ? 'selected': ''); ?>  value="3">3</option>
                        <option <?php echo e(isset($data['bedroom']) && $data['bedroom'] === "4" ? 'selected': ''); ?>  value="4">4</option>
                        <option <?php echo e(isset($data['bedroom']) && $data['bedroom'] === "5" ? 'selected': ''); ?>  value="5">5</option>
                        <option <?php echo e(isset($data['bedroom']) && $data['bedroom'] === "6" ? 'selected': ''); ?>  value="6">6</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Bathroom</label>
                    <select class="selectpicker search-fields" name="bathroom">
                        <option value="">Bath</option>
                        <option <?php echo e(isset($data['bathroom']) && $data['bathroom'] === "1" ? 'selected': ''); ?> value="1">1</option>
                        <option <?php echo e(isset($data['bathroom']) && $data['bathroom'] === "2" ? 'selected': ''); ?> value="2">2</option>
                        <option <?php echo e(isset($data['bathroom']) && $data['bathroom'] === "3" ? 'selected': ''); ?> value="3">3</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label>Price</label>
                    <div class="fiyat">
                        <input id="" type="text" name="min_price" placeholder="Min Price" value="<?php echo e(isset($data['min_price']) && $data['min_price'] != null ? $data['min_price'] : ''); ?>" >
                        <input id="" type="text" name="max_price" placeholder="Max Price" value="<?php echo e(isset($data['max_price']) && $data['max_price'] != null ? $data['max_price'] : ''); ?>">
                    </div>
                </div>
                <br>
                
                <!-- <div class="form-group">
                    <label>M2</label>
                    <div class="price-range">
                        <input id="meter-reinput" type="text" name="m2" value="150;300">
                    </div>
                </div>
                <br/> -->
                <button class="search-button btn-md btn-color" onclick="search_listing()">SEARCH</button>
            </form>
        </div>
    </div>
</div>    
<?php /**PATH /home/u390945238/domains/umove.london/resources/views/frontend/template1/elements/search_listing.blade.php ENDPATH**/ ?>