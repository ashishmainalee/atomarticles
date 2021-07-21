@extends('frontend.layouts.app')

@section('main-content')
<!--Page Title-->
<section class="page-title">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h2>Contact Page</h2>
            </div>
            <div class="pull-right">
                <ul class="page-title-breadcrumb">
                    <li><a href="{{ route('frontend.home') }}"><span class="fa fa-home"></span>Home</a></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Contact Section-->
<section class="contact-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Form Column-->
            <div class="form-column col-md-8 col-sm-12 col-xs-12" style="margin-top: -80px;">
                <div class="sec-title">
                    <h2>Contact Form</h2>
                </div>
                <div class="text">We will reach you during 24 hours in working days.</div>
                <!--Contact Form-->
                <div class="contact-form">
                    <div class="contact-form">
                        {!! Form::open(array('method'=>'POST','route' => 'frontend.submit-form')) !!}


                            <div class="form-group">
                                <input type="text" placeholder="Name*" class="form-control" id="form-name" name="name" data-error="Name field is required" required>
                            </div>
                     
                            <div class="form-group">
                                <input type="email" placeholder="Email*" class="form-control" id="form-email" name="email" required>
                            </div>
                        </div>
                       
                            <div class="form-group">
                                <input type="text" placeholder="Mobile Number*" class="form-control" id="form-email" name="phone" required>
                            </div>
                        
                       
                            <div class="form-group">
                                <textarea placeholder="Message*" class="textarea form-control" id="form-message" rows="8" cols="20" name="message" required></textarea>
                            </div>
                        
                     
                            <div class="form-group margin-b-0">
                                <button type="submit" style="background-color: tomato" class="theme-btn submit-btn" value="Send Message">Send Message</button>

                            </div>
                       

                    </div>
                </div>
                <!--Info Column-->
                <div class="info-column col-md-4 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2>Contact Info</h2>
                        </div>
                        <ul class="social-icon-one alternate">
                            <li><a href="{{ $about->facebook }}"><span class="fa fa-facebook"></span></a></li>
                            <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li class="g_plus"><a href="#"><span class="fa fa-google-plus"></span></a></li>
                        </ul>
                        <ul class="info-list">
                            <li>Address : {{ $about->address }}</li>
                            <li>Phone : {{ $about->contact_number }}</li>
                            <li>Email : {{ $about->email }}</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
</section>
<!--End Contact Section-->

@endsection

@section('footerelements')

<script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>

@if (Session::has('success') || Session::has('error'))
    
<script type="text/javascript">
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}")
    @elseif(Session::has('error'))
    toastr.error("{{Session::get('error')}}")
    @endif

</script>

@endif

@endsection

@section('headerStyles')
  <link rel="stylesheet" href="http://newsblog.test/backend/plugins/toastr/toastr.min.css">

@endsection
