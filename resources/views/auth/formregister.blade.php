<div class="p-4">
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group row">
        <input id="name" placeholder="Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group row">
        <input id="no_hp" placeholder="Phone Number" type="text" class="form-control{{ $errors->has('no_hp') ? ' is-invalid' : '' }}" name="no_hp" value="{{ old('no_hp') }}" required autofocus>
        @if ($errors->has('no_hp'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('no_hp') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group row">
        <input id="tgl" type="date" placeholder="Birth" class="form-control{{ $errors->has('tgl') ? ' is-invalid' : '' }}" name="tgl" value="{{ old('tgl') }}" required autofocus>
    </div>
    <div class="custom-group pb-3   ">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="j_ksatu" name="j_k" value="L" checked class="custom-control-input {{ $errors->has('j_k') ? ' is-invalid' : '' }}">
                <label class="custom-control-label" for="j_ksatu">Laki-Laki</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="j_kdua" name="j_k" value="P" class="custom-control-input {{ $errors->has('j_k') ? ' is-invalid' : '' }}">
                <label class="custom-control-label" for="j_kdua">Perempuan</label>
            </div>
    </div>
    <div class="form-group row">
        <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group row">
        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group row">
        <input id="password-confirm" placeholder="Password Confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
    <div class="form-group row mb-0">
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
    </div>
</form>
</div>