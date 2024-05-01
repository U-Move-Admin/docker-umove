<div class="modal-dialog modal-lg" role="document" style="width:100%">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Big Photo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#myModal').modal('hide');$('#myModal').html('');">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div style="position:relative;top:0;left:0;width:100%;height:100%;overflow:hidden;">
                <div id="jssor_big" style="position:relative;margin:0 auto;top:0px;left:0px;width:800px;height:600px;overflow:hidden;visibility:hidden;">
                    <!-- Loading Screen -->
                    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="/frontend/templates/img/jssor/spin.svg" />
                        </div>
                         <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:800px;height:600px;overflow:hidden;">
                        <?php $__currentLoopData = $emlak->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div data-p="267">
                                <img data-u="image" src="<?php echo e(asset('/img/uploads/'.$emlak['id'].'/big/'.$image->image_name)); ?>"  alt="<?php echo e($image->name); ?>" style="width:100%" /> 
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                    <!-- Bullet Navigator -->
                    <div data-u="navigator" class="jssorb064" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                        <div data-u="prototype" class="i" style="width:16px;height:16px;">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                            </svg>
                        </div>
                    </div>
                    <!-- Arrow Navigator -->
                    <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                        </svg>
                    </div>
                    <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
    
            var jssor_big_options = {
                $AutoPlay: 0,
                $Idle: 2000,
                $SlideEasing: $Jease$.$InOutSine,
                $DragOrientation: 3,
                $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
                }
            };
    
            var jssor_big_slider = new $JssorSlider$("jssor_big", jssor_big_options);
    
            //make sure to clear margin of the slider container element
            jssor_big_slider.$Elmt.style.margin = "";
    
            /*#region responsive code begin*/
    
            /*
                parameters to scale jssor slider to fill parent container
    
                MAX_WIDTH
                    prevent slider from scaling too wide
                MAX_HEIGHT
                    prevent slider from scaling too high, default value is original height
                MAX_BLEEDING
                    prevent slider from bleeding outside too much, default value is 1
                    0: contain mode, allow up to 0% to bleed outside, the slider will be all inside parent container
                    1: cover mode, allow up to 100% to bleed outside, the slider will cover full area of parent container
                    0.1: flex mode, allow up to 10% to bleed outside, this is better way to make full window slider, especially for mobile devices
            */
    
            var MAX_WIDTH = 800;
            var MAX_HEIGHT = 600;
            var MAX_BLEEDING = 1;
    
            function ScaleSlider() {
                var containerElement = jssor_big_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;
    
                if (containerWidth) {
                    var originalWidth = jssor_big_slider.$OriginalWidth();
                    var originalHeight = jssor_big_slider.$OriginalHeight();
    
                    var containerHeight = containerElement.clientHeight || originalHeight;
    
                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
                    var expectedHeight = Math.min(MAX_HEIGHT || containerHeight, containerHeight);
    
                    //scale the slider to expected size
                    jssor_big_slider.$ScaleSize(expectedWidth, expectedHeight, MAX_BLEEDING);
    
                    //position slider at center in vertical orientation
                    jssor_big_slider.$Elmt.style.top = ((containerHeight - expectedHeight) / 2) + "px";
    
                    //position slider at center in horizontal orientation
                    jssor_big_slider.$Elmt.style.left = ((containerWidth - expectedWidth) / 2) + "px";
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
    
            function OnOrientationChange() {
                ScaleSlider();
                window.setTimeout(ScaleSlider, 800);
            }
    
            ScaleSlider();
    
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", OnOrientationChange);
            /*#endregion responsive code end*/
        });
    </script>
    <style>
        html {
            position:fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
    
        body {
            position: relative;
            margin: 0;
            padding: 0;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
    
        /* jssor slider loading skin spin css */
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }
    
        @keyframes  jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }
    
            to {
                transform: rotate(360deg);
            }
        }
    
    
        .jssorb064 {position:absolute;}
        .jssorb064 .i {position:absolute;cursor:pointer;}
        .jssorb064 .i .b {fill:#000;fill-opacity:.5;stroke:#fff;stroke-width:400;stroke-miterlimit:10;stroke-opacity:0.5;}
        .jssorb064 .i:hover .b {fill-opacity:.8;}
        .jssorb064 .iav .b {fill:#ffe200;fill-opacity:1;stroke:#ffaa00;stroke-opacity:.7;stroke-width:2000;}
        .jssorb064 .iav:hover .b {fill-opacity:.6;}
        .jssorb064 .i.idn {opacity:.3;}
    
        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
    </style>
<?php /**PATH /home/u390945238/domains/umove.london/resources/views/frontend/template1/big_photo.blade.php ENDPATH**/ ?>