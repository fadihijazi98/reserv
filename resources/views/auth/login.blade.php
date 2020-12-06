@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center" style="min-height: 60vh">
            <div class="col-md-8">

                <div class="">

                    <div class="text-right bg-gray-400 text-md p-3 font-semibold">
                        <a href="{{route('login')}}">
                            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sign-in-alt"
                                 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                 class="inline-block w-4">
                                <path fill="currentColor"
                                      d="M32 217.1c0-8.8 7.2-16 16-16h144v-93.9c0-7.1 8.6-10.7 13.6-5.7l141.6 143.1c6.3 6.3 6.3 16.4 0 22.7L205.6 410.4c-5 5-13.6 1.5-13.6-5.7v-93.9H48c-8.8 0-16-7.2-16-16v-77.7m-32 0v77.7c0 26.5 21.5 48 48 48h112v61.9c0 35.5 43 53.5 68.2 28.3l141.7-143c18.8-18.8 18.8-49.2 0-68L228.2 78.9c-25.1-25.1-68.2-7.3-68.2 28.3v61.9H48c-26.5 0-48 21.6-48 48zM512 400V112c0-26.5-21.5-48-48-48H332c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h132c8.8 0 16 7.2 16 16v288c0 8.8-7.2 16-16 16H332c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h132c26.5 0 48-21.5 48-48z"
                                      class=""></path>
                            </svg>
                            تسجيل الدخول
                        </a>
                    </div>

                    <div class="card-body bg-gray-200">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-left">الايميل</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>خطأ في الايميل</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row text-right">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-left">كلمة المرور</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>خطأ في كلمة المرور</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-md bg-gray-400 font-weight-bold">
                                        تسجيل الدخول
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
