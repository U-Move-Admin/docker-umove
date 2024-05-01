<div class="modal-dialog modal-xs" role="document" style="width:100%">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#loginModal').modal('hide');">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('quick-login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="email" >{{ __('Email') }} </label>

                    <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="password" >{{ __('Password') }} </label>
                    
                    
                    <input class="form-control" id="password" 
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                
                <div class="flex items-center justify-end mt-4">
               
                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                
                </div>
                <button type="submit" class="btn btn-color btn-block" >Login</button>
            </form>
        </div>
    </div>
</div>