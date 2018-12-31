<div class="p-4">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group row">
                <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-group row">
                <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-group row">
            <div class="col p-0">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input"  name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                </div>
            </div>
            <div class="col text-right p-0">
                    @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">{{ __('Forgot Password?') }} </a>
                @endif
            </div>
        </div>
        <div class="form-group row">
                <button type="submit" class="btn btn-primary col-12">
                    {{ __('Login ke Toko') }}
                </button>
        </div>
        <div class="form-group text-center mb-0">
           <span class="text-muted pb-0">Belum punya akun TokoKu ? <a href="{{ url('/register') }}" class="pb-0"> Daftar</a></span>
        </div>
    </form>
</div>
