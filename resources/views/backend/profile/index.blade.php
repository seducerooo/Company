@extends('layouts.master_dashboard')
@section('mainContent')<!-- Start container-fluid  -->
<div class="container-fluid">
    <br><br><br><br>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">نمایه ادمین</a></li>

                    </ol>
                </div>
                <h4 class="page-title">نمایه ادمین</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="@if(isset($UserData['profile']['photo']))
                         {{ url( $UserData['profile']['photo'] )  }}
                                  @else
                             {{      url('upload/no_image.jpg') }}
                                   @endif
                                   "
                         class="rounded-circle avatar-lg img-thumbnail"
                         alt="profile-image">



                    <div class="text-start mt-3">

                        <p class="text-muted mb-2 font-13"><strong> نام  : </strong> <span class="ms-2">
                                @if(isset($UserData['name']))
                                {{ $UserData['name']}}
                                @else
                                {{  null }}
                                @endif
                            </span></p>

                        <p class="text-muted mb-2 font-13"><strong>ایمیل / پست الکترونبک : </strong> <span class="ms-2">
                                @if(isset($UserData['email']))
                                    {{ $UserData['email'] }}
                                @else
                                    {{  null }}
                                @endif
                            </span></p>
                        <p class="text-muted mb-2 font-13"><strong>تاریخ تولد : </strong> <span class="ms-2">
                                @if(isset($UserData['profile']['dob']))
                                    {{ Hekmatinasser\Verta\Verta::parse($UserData['profile']['dob'],'Asia/Tehran')->format('Y/m/d') }}
                                @else
                                    {{  null }}
                                @endif
                            </span></p>
                        <p class="text-muted mb-2 font-13"><strong>نام شهر : </strong> <span class="ms-2">
                                @if(isset($UserData['profile']['city']))
                                    {{ $UserData['profile']['city'] }}
                                @else
                                    {{  null }}
                                @endif
                            </span></p>
                        <p class="text-muted mb-2 font-13"><strong>نام کشور : </strong> <span class="ms-2">
                                @if(isset($UserData['profile']['country']))
                                    {{ $UserData['profile']['country'] }}
                                @else
                                    {{  null }}
                                @endif
                            </span></p>
                        <p class="text-muted mb-2 font-13"><strong>شماره: </strong> <span class="ms-2">
                                @if(isset($UserData['profile']['phone']))
                                    {{ str_replace(',', ' ', $UserData['profile']['phone']) }}
                                @else
                                    {{  null }}
                                @endif
                            </span></p>

                    </div>

                </div>
            </div> <!-- end card -->


        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">

                    <div class="tab-content">

                        <div class="modalroozbeh" id="settings">
                            <form  id="profileForm" action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> اطلاعات شخصی</h5>
                                <div class="row">
                                    <div class="col-md-12 datepicker">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">تاریخ تولد : </label>
                                            <input name="dob"
                                                   id="dob"
                                                   value="{{ !empty($UserData['profile']['dob']) ?
                                                                    $UserData['profile']['dob'] :
                                                                    now()->toJalali()->format('Y/m/d') }}"
                                                   data-jdp>
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">عکس نمایه</label>
                                            <input  name="photo" type="file" id="image" class="form-control">
                                            <br>
                                            <img src="{{ !empty($UserData['profile']['photo']) ?
                                                          url($UserData['profile']['photo']) :
                                                          url('upload/no_image.jpg')}}"
                                                 class="rounded-circle avatar-lg img-thumbnail"
                                                 id="showImage"
                                                 alt="profile-image">
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">شماره تلفن همراه :  </label>
                                                <input
                                                    type="text"
                                                    name="phone"
                                                    class="selectize-close-btn"
                                                    value="
                                                    @if(isset($UserData['profile']['phone']))
                                                        {{ $UserData['profile']['phone'] }}
                                                    @endif
                                                   "
                                                    placeholder="شماره تلفن همراه خود را وارد کنید ..." >
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="country" class="form-label">نام کشور:  </label>
                                            <input type="text"
                                                   name="country"
                                                   class="form-control"
                                                   id="country"
                                                   placeholder="نام کشور خود را وارد کنید ..."
                                                   value="{{ !empty( $UserData['profile']['country'] ) ?
                                                                trim($UserData['profile']['country']) : ''}}">
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="city" class="form-label">نام شهر:  </label>
                                            <input type="text"
                                                   name="city"
                                                   class="form-control"
                                                   id="city"
                                                   placeholder="نام شهر خود را وارد کنید ..."
                                                   value="{{ !empty( $UserData['profile']['city'] ) ?
                                                                trim($UserData['profile']['city']) : ''}}">
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->

                    </div> <!-- end tab-content -->
                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->






    </div>
    <!-- end row-->

    <script type="text/javascript">

        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script>

        jalaliDatepicker.startWatch({
            container: '.modalroozbeh',
            minDate: "attr",
            maxDate: "attr",
            minTime: "attr",
            maxTime: "attr",
            hideAfterChange: true,
            autoHide: true,
            showTodayBtn: true,
            showEmptyBtn: true,
            topSpace: 10,
            bottomSpace: 30,
             dayRendering(opt,input){
                return {
                    isHollyDay:opt.day==1
                }
            }

        });



    </script>
@endsection
