<div class="modal-dialog modal-xs" role="document" style="width:100%">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#loginModal').modal('hide');">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="<?php echo e(url('quick-login')); ?>">
                <?php echo csrf_field(); ?>

                <!-- Email Address -->
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="email" ><?php echo e(__('Email')); ?> </label>

                    <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="password" ><?php echo e(__('Password')); ?> </label>
                    
                    
                    <input class="form-control" id="password" 
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600"><?php echo e(__('Remember me')); ?></span>
                    </label>
                </div>
                
                <div class="flex items-center justify-end mt-4">
               
                    <?php if(Route::has('password.request')): ?>
                        <a class="" href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('Forgot your password?')); ?>

                        </a>
                    <?php endif; ?>
                
                </div>
                <button type="submit" class="btn btn-color btn-block" >Login</button>
            </form>
        </div>
    </div>
</div><?php /**PATH /home/u390945238/domains/umove.london/resources/views/frontend/template1/elements/login_modal.blade.php ENDPATH**/ ?>