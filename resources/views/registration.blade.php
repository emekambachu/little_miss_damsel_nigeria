@extends('layouts.main')

@section('title')
    Registration
    @endsection

    @section('contents')
    </header>
    <!--header end-->

    <!--site-main start-->
    <div class="site-main">
        <div class="ttm-page-title-row text-center">
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title">Registration</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="{{ url('/') }}"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">Registration</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="ttm-row contact-form-section2 bg-layer break-991-colum clearfix">
            <div class="container-fluid">
                <div class="row res-1199-mlr-15">

                    <div class="col-lg-4 col-md-4 pr-3">
                        <div class=" section-title clearfix">
                            <h3 style="color: #AF0558;">Payment Procedures</h3>
                            <div class="heading-seperator"><span></span></div>
                            <p><strong>Account Details</strong><br>
                                Little Miss Damsel Nigeria<br>
                                Account number<br>
                                0432091606<br>
                                GTB<br><br>


                                <strong>Step 1:</strong><br>
                                Pay a sum of 5000 Naira to our Nigerian Account. Above are our account details<br><br>

                                <strong>Step 2:</strong><br>
                                Fill in your details accurately and upload a scanned copy of your proof of payment, this will make our selection more efficient.<br><br>

                                <strong>Step 3:</strong><br>
                                Once payment has been approved, you would be sent a confirmation email.<br>

                                For more clarity please call our contacts at the bottom of the page or send us an email at info@littlemissdamselnigeria.com</p>
                        </div>
                    </div>

                    <div class="col-md-8 col-lg-8">
                        <div class="padding-12 box-shadow">
                            <!-- section title -->
                            <div class="section-title clearfix mb-30">
                                <h3 style="color: #AF0558;">LMDN Sign up</h3>
                            </div><!-- section title end -->

                            @include('includes.alerts')

                            <form class="row contactform wrap-form clearfix" method="post"
                                  action="{{ route('applications.store') }}" novalidate="novalidate"
                                  enctype="multipart/form-data">
                                @csrf
                                <label class="col-md-4">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="surname" type="text"
                                               placeholder="Surname:*" required="required"></span>
                                </label>

                                <label class="col-md-4">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="other_names" type="text"
                                               placeholder="Other Names:*" required="required"></span>
                                </label>

                                <label class="col-md-4">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="age" type="number"
                                               placeholder="Age:*" required="required"></span>
                                </label>

                                <label class="col-md-4">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                    <select name="health_issues" id="billing_state" class="state_select select2-hidden-accessible">
                                            <option selected disabled>Health Issues?</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </span>
                                </label>

                                <label class="col-md-4">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="health_details" type="text"
                                               placeholder="Health Details (If Yes):*"></span>
                                </label>

                                <label class="col-md-4">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                    <select name="country" id="country" class="state_select select2-hidden-accessible" required>
                                        </select>
                                    </span>
                                </label>

                                <label class="col-md-4">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                    <select name="state" id="state" class="state_select select2-hidden-accessible" required>
                                        </select>
                                    </span>
                                </label>

                                <label class="col-md-4">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="city" type="text"
                                               placeholder="City:"></span>
                                </label>

                                <label class="col-md-4">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="address" type="text"
                                               placeholder="Address:*"></span>
                                </label>

                                <label class="col-md-4">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="vital_state" type="text"
                                               placeholder="Vital State"></span>
                                </label>

                                <label class="col-md-4">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="school_name" type="text"
                                               placeholder="School Name" required></span>
                                </label>

                                <label class="col-md-4">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="school_class" type="text"
                                               placeholder="School Class" required></span>
                                </label>

                                <label class="col-md-3">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="height" type="text"
                                               placeholder="Height:*" required></span>
                                </label>

                                <label class="col-md-3">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="bust" type="text"
                                               placeholder="Bust:*"></span>
                                </label>

                                <label class="col-md-3">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="waist" type="text"
                                               placeholder="Waist"></span>
                                </label>

                                <label class="col-md-3">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="hips" type="text"
                                               placeholder="Hips:*" required></span>
                                </label>

                                <label class="col-md-12">
                                    1. In one sentence, what does the word beauty mean to you?
                                <span class="ttm-form-control">
                                    <input class="text-input" name="question1" type="text"
                                           placeholder="In one sentence, what does the word beauty mean to you?:*" required></span>
                                </label>

                                <label class="col-md-12">
                                    2. In one sentence, what is the motivation behind becoming a model?
                                <span class="ttm-form-control">
                                <input class="text-input" name="question2" type="text"
                                       placeholder="In one sentence, what is the motivation behind becoming a model?:*" required></span>
                                </label>

                                <label class="col-md-12">
                                    3. In one sentence, what do you think makes a person attractive?
                                    <span class="ttm-form-control">
                                <input class="text-input" name="question3" type="text"
                                       placeholder="In one sentence, what do you think makes a person attractive?:*" required></span>
                                </label>

                                <label class="col-md-12">
                                    4. Have you been in any other agency before? If yes, Name the year
                                    <span class="ttm-form-control">
                                <input class="text-input" name="question4" type="text"
                                       placeholder="Have you been in any other agency before? If yes, Name the year:*" required></span>
                                </label>

                                <label class="col-md-12">
                                    5. Why did you choose to be part of Little Miss Damsel Nigeria
                                    <span class="ttm-form-control">
                                <input class="text-input" name="question5" type="text"
                                       placeholder="Why did you choose to be part of Little Miss Damsel Nigeria:*" required></span>
                                </label>

                                <label class="col-md-6">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                <input class="text-input" name="parent_surname" type="text"
                                       placeholder="Parent Surname:*" required></span>
                                </label>

                                <label class="col-md-6">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control">
                                <input class="text-input" name="parent_other_names" type="text"
                                       placeholder="Parent Other Names:*" required></span>
                                </label>

                                <label class="col-md-6">
                                    <i class="ti ti-mobile"></i>
                                    <span class="ttm-form-control">
                                <input class="text-input" name="parent_mobile" type="tel"
                                       placeholder="Parent Mobile:*" required></span>
                                </label>

                                <label class="col-md-6">
                                    <i class="ti ti-email"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="parent_email" type="text"
                                               placeholder="Parent Email:*" required="required"></span>
                                </label>

                                <label class="col-md-12">
                                    <i class="ti ti-home"></i>
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="parent_address" type="text"
                                               placeholder="Parent Address:*" required="required"></span>
                                </label>

                                <label class="col-md-6">
                                    Sender Account Name and Number
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="payment_details" type="text"
                                               placeholder="Account Name and Number:*" required="required"></span>
                                </label>

                                <label class="col-md-6">
                                    Scanned copy of teller or Screenshot of online transaction
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="image" type="file"></span>
                                </label>

                                <label class="col-md-4">
                                    I HEREBY AGREE THAT THE INFORMATION PROVIDED ABOVE IS TRUE AND ACCURATE AND WOULD LIKE TO BE INCLUDED IN THIS YEAR'S LMDN BEAUTY PAGEANT
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="terms1" type="checkbox" value="Yes" required="required"></span>
                                </label>

                                <label class="col-md-4">
                                    I HEREBY AGREE THAT AT THE TIME OF THE SUBMISSION OF THIS APPLICATION, I AM AT LEAST 7 YEARS OLD AND NOT OLDER THAN 12 YEARS OLD
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="terms2" type="checkbox" value="Yes" required="required"></span>
                                </label>

                                <label class="col-md-4">
                                    I HEREBY AGREE TO BE BOUND BY THE TERMS AND CONDITIONS STATED IN THE ELIGIBILITY CRITERIA FOR THE LMDN BEAUTY PAGEANT
                                    <span class="ttm-form-control">
                                        <input class="text-input" name="terms3" type="checkbox" value="Yes" required="required"></span>
                                </label>

                                <input name="submit" type="submit" value="Submit" class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20" id="submit" title="Submit">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div><!-- site-main end -->
@endsection

@section('bottom-scripts')

    <script type= "text/javascript" src = "{{ asset('main/js/countries.js') }}"></script>

    <script language="javascript">
        populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
        populateCountries("country2");
        populateCountries("country2");
    </script>
@endsection
