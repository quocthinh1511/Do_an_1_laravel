@extends('layouts.app')
@section('content')
<section class="ftco-section img js-fullheight" style="background-image: url(images/bg.jpg);">
		<div class="container">
            <div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form action="#" class="signin-form" method="POST" action="{{ route('login') }}">
                    @csrf
		      		<div class="form-group">
		      			<input style="color:black !important" placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>
	            <div class="form-group">
	              <input style="color:black !important" placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button style="color:black !important" type="submit" class="form-control submit px-3">
                        {{ __('Login') }}
                    </button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary" style="color:white !important">Remember Me
							<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
								<span class="checkmark"></span>
						</label>
					</div>
					<div class="w-50 text-md-right">
								 @if (Route::has('password.request'))
                                    <a style="color:#fff;text-decoration:none" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
					</div>
	            </div>
	          </form>
              <p class="w-100 text-center">
                    <a href="register" style="color:white !important">&mdash; Create your account &mdash;</a>
                </p>
	          <p class="w-100 text-center" style="margin-top:35px;color:white !important">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
</div>
	</section>
@endsection
