@extends('layouts.master_auth')
@section('auth_content')
    <div class="col-md-12 col-lg-8 col-xl-6">
        <div class="card bg-pattern">

            <div class="card-body p-4">

                <div class="text-center w-75 m-auto">
                    <div class="auth-logo mb-4">
                        <a href="index.html" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="22">
                                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="22">
                                            </span>
                        </a>
                    </div>

                    <div class="mb-4 text-sm text-gray-600">
                        از ثبت نام شما سپاسگزاریم! قبل از شروع، آیا می توانید آدرس ایمیل خود را با کلیک کردن روی پیوندی که به تازگی برای شما ایمیل کرده ایم تأیید کنید؟ اگر ایمیلی را دریافت نکردید، ما با کمال میل ایمیل دیگری را برای شما ارسال خواهیم کرد.
                    </div>
                    @if (session('status') == 'verification-link-sent')
                        <div class="text-muted mb-4 mt-3">
                            یک پیوند تأیید جدید به آدرس ایمیلی که هنگام ثبت نام ارائه کرده اید ارسال شده است.
                        </div>
                    @endif
                </div>
                <div class="col-12 text-center ">
                    <div class="row g-2">
                        <div class="col-md">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button class="btn btn-primary waves-effect waves-light " type="submit"> فرستادن تایید ایمیل / پست الکرترونیک</button>


                            </form>
                        </div>
                        <div class="col-md">

                            <a href="{{ route('logout') }}" class="btn btn-danger waves-effect waves-light">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>
                        </div>

                    </div>




                </div>
            </div> <!-- end card-body -->
        </div>
        <!-- end card -->



    </div> <!-- end col -->
@endsection

