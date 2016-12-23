@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row section">
        <div class="col m8 offset-m2">
            <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#login">Login</a></li>
                    <li class="tab col s3"><a href="#register">Registrasi</a></li>
                  </ul>
                </div>
                <form id="register" class="col s12" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <br>
                    <h5 class="row">Register Your Account</h5>
                    <div class="row section">

                        <div class="input-field col s12">
                            <i class="fa fa-user-circle prefix" aria-hidden="true"></i>
                            <input id="name" type="text" class="validate" name="name"
                            value="{{ old('name') }}" required="" aria-required="true">
                            <label for="name" data-error="required">Full Name</label>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s3">
                                    <i class="fa fa-phone prefix" aria-hidden="true"></i>
                                    <input id="area_code" type="text" class="validate" name="area_code"
                                     required="" aria-required="true" value="{{ old('area_code') ? 
                                     old('area_code') : '+62'}}">
                                </div>
                                <div class="input-field col s9">
                                    <input id="phone" type="number" class="validate" name="phone"
                                     required="" aria-required="true" value="{{ old('phone') }}">
                                    <label for="phone" data-error="required">Phone</label>
                                </div>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <i class="fa fa-envelope prefix" aria-hidden="true"></i>
                            <input id="email" type="email" class="validate" name="email"
                             required="" aria-required="true" value="{{ old('email') }}">
                            <label for="email" data-error="not a valid email address">E-Mail</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="fa fa-lock prefix" aria-hidden="true"></i>
                            <input id="password" type="password" class="validate" name="password"
                             required="" aria-required="true">
                            <label for="password" data-error="required">Password</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="fa fa-lock prefix" aria-hidden="true"></i>
                            <input id="password-confirm" type="password" class="validate"
                             required="" aria-required="true" name="password-confirm">
                            <label for="password-confirm" data-error="required">Confirm Password</label>
                        </div>

                        <div class="row container">
                            <div class="input-field col s4 offset-s2 m3 offset-m1">
                                <input class="with-gap" name="gender" type="radio" class="validate" id="male" value="male">
                                <label for="male">Male</label>
                            </div>
                            <div class="input-field col s4 m3">
                                <input class="with-gap" name="gender" type="radio" id="female" value="female">
                                <label for="female">Female</label>
                            </div>
                        </div>


                        <div class="input-field col s12">
                            <i class="fa fa-lock prefix" aria-hidden="true"></i>
                            <input id="birthdate" type="date" class="datepicker validate" name="birthdate"
                             required="" aria-required="true" value="{{ old('birthdate') }}">
                            <label for="birthdate" data-error="required">Birth Date</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="fa fa-map-marker prefix" aria-hidden="true"></i>
                            <textarea id="address" class="materialize-textarea" name="address"
                             required="" aria-required="true">{{ old('address') }}</textarea>
                            <label for="address" data-error="required">Address</label>
                        </div>



                        <div class="input-field col s12">
                            <i class="fa fa-lock prefix" aria-hidden="true"></i>
                            <input id="city" type="text" class="validate" name="city"
                             required="" aria-required="true" value="{{ old('city') }}">
                            <label for="city" data-error="required">City</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="fa fa-lock prefix" aria-hidden="true"></i>
                            <input id="postalcode" type="text" class="validate" name="postalcode"
                             required="" aria-required="true" value="{{ old('postalcode') }}">
                            <label for="postalcode" data-error="required">Postal Code</label>
                        </div>


                    {{--
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city">

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    --}}

                        <div class="input-field col s12">
                            <input id="newsletter" type="checkbox" checked name="newsletter">
                            <label for="newsletter">Sign me up for the newsletter</label>
                        </div>

                    </div>

                    @if (count($errors)>0)
                        {{count($errors)}}
                    @endif
                    @foreach ($errors as $key)
                    {{9999}}
                    @endforeach
                    @foreach ($errors as $key)
                        <span class="red">
                            dd<strong>{{ $key }}</strong>
                        </span>
                    @endforeach

                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Create Account
                                </button>
                                <br><br>
                                <a href="{{ url('/login') }}">I already have an account</a>
                            </div>
                        </div>
                    </div>
                </form>

                <form id="login" class="col s12" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <br>
                    <h5 class="row">Login Your Account</h5>
                    <div class="row section">

                        <div class="input-field col s12">
                            <i class="fa fa-envelope prefix" aria-hidden="true"></i>
                            <input id="email" type="email" class="validate" name="email"
                             required="" aria-required="true" value="{{ old('email') }}">
                            <label for="email" data-error="not a valid email address">E-Mail</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="fa fa-lock prefix" aria-hidden="true"></i>
                            <input id="password" type="password" class="validate" name="password"
                             required="" aria-required="true">
                            <label for="password" data-error="required">Password</label>
                        </div>

                        <div class="input-field col s12">
                            <input id="remember" type="checkbox" name="remember">
                            <label for="remember">Remember Me</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Login
                                </button>
                                <br><br>
                                <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>

    //documentation: google "pickadate.js"
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 100, // Creates a dropdown of 70 years to control year
        max: true, // `true` sets it to today. `false` removes any limits.
        formatSubmit: 'yyyy-mm-dd',
        hiddenName: true,
        ////seems to be buggy:
        // closeOnSelect: true, // When a date is selected, the picker closes
    });

</script>
@endsection
