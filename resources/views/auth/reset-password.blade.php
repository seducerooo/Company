@extends('layouts.master_auth')
@section('title')
    Reset | Company
@endsection
@section('auth_content')

    <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="card bg-pattern">

            <div class="card-body p-4">

                <div class="text-center w-75 m-auto">
                    <div class="auth-logo">
                        <a href="#" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="22">
                                            </span>
                        </a>

                        <a href="#" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="22">
                                            </span>
                        </a>
                    </div>
                    <p class="text-muted mb-4 mt-3">ایمیل و گذر واژه خود را وارد کنید تا به حساب خود دسترسی پیدا کنید .</p>
                </div>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">ایمیل / پست الکترونیک : </label>
                        <input name="email" class="form-control" type="email" id="emailaddress" required="" placeholder="لطفا ایمیل / پست الکترونیک خود را وارد کنید ...">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">رمز / گذرواژه : </label>
                        <div class="input-group input-group-merge">
                            <input name="password" type="password" id="password" class="form-control" placeholder="لطفا رمز / گذرواژه خود را وارد کنید ...">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">تایید رمزعبور / گذرواژه : </label>
                        <div class="input-group input-group-merge">
                            <input name="password_confirmation" type="password" id="password_confirmation" class="form-control" placeholder="لطفا رمز / گذرواژه خود را وارد کنید ...">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>


                    <div class="text-center d-grid">
                        <button class="btn btn-primary" type="submit"> وارد شوید </button>
                    </div>

                </form>


            </div> <!-- end card-body -->
        </div>
        <!-- end card -->


    </div> <!-- end col -->
@endsection
