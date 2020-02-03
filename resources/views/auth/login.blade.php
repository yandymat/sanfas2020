@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
					<span class="login100-form-title p-b-30">
                        <h3>ESPACE ADMINISTRATION</h3>
                        <p>CONNECTEZ-VOUS à votre espace</p>
					</span>

					<div class="wrap-input100 validate-input m-b-30" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Adresse mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
                        </span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="wrap-input100 validate-input m-b-30" data-validate = "Password is required">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Mot de passe" required autocomplete="current-password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					
					<div class="container-login100-form-btn p-b-50">
						<button class="login100-form-btn">
							Se connecter
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
