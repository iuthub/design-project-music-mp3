@extends('layouts.app')

@section('content')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register</title>
    </head>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-change ">
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>
                        <div class="register-popup">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="register-avatar">
                                                <i class="fa fa-user"></i>


                                            </div>

                                        </div>
                                        <div class="col-md-8 register-info">
                                            <div class="form-group row">
                                                <label for="name" class="col-md-5 col-form-label register-names" >{{ __('Name') }}</label>
                                                <div class="col-md-6 register-value">
                                                    <input id="name" type="text" class="register-type form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-md-5 col-form-label register-names">{{ __('E-Mail Address') }}</label>
                                                <div class="col-md-6 register-value">
                                                    <input id="email" type="email" class="register-type form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-md-5 col-form-label register-names">{{ __('Password') }}</label>
                                                <div class="col-md-6 register-value">
                                                    <input id="password" type="password" class="register-type form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password-confirm" class="col-md-5 col-form-label register-names">{{ __('Confirm Password') }}</label>
                                                <div class="col-md-6 register-value">
                                                    <input id="password-confirm" type="password" class="register-type form-control" name="password_confirmation" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0 register-submit">
                                                <div class="col-md-8">
                                                    <button type="submit" class="register-submit-button">
                                                        {{ __('Submit') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <div class="col-md-12 notamember">

                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
