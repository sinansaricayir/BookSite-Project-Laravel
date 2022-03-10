@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{route('index')}}"><strong>Anasayfa</strong></a></li>
                    <li class="active">Kayıt Ol</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="register">
        <div class="container">
            <div class="register-top heading">
                <h2>KAYIT OL</h2>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="register-main">
                <div class="col-md-6 account-left">
                    <input class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Adınız" type="text" tabindex="1" required>
                    @error('name')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                    @enderror
                    <input class="@error('name') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail Adresiniz" type="text" tabindex="3" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                    @enderror


                    <input id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Şifreniz" type="password" tabindex="4" required>
                    @error('password')
                       <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                       </span>
                    @enderror
                    <input id="password-confirm" type="password" placeholder="Şifreniz" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="address submit">
                <input type="submit" value="Submit">
            </div>
            </form>
        </div>
    </div>










@endsection
