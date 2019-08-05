<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTER | COUPLE OF THE MONTH</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="cotm_reg/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="cotm_reg/css/style.css">
</head>
<body>

    <div class="main">

        <div class="container">
        @if(session()->has('success'))
                  <div class="alert alert-solid alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                     <b style="color:black;"> {{ session()->get('success') }}</b>
                  </div>
              @endif
            <form class="appointment-form" id="appointment-form"name="contestform" action="{{route('user.register')}}"  enctype="multipart/form-data" method="post">
                    @csrf
                    @method('POST')
                <h2>couple of the month registration form</h2>
                <div class="form-group-1">
                    <input type="text" name="first_name_one" id="title" value="{{ old('first_name_one') }}" placeholder="Enter First name [couple-one]" required />
                    <input type="text" name="last_name_one" id="title" value="{{ old('last_name_one') }}" placeholder="Enter last name [couple-one]" required />
                     <input type="text" name="first_name_two" id="title" value="{{ old('first_name_two') }}" placeholder="Enter First name [couple-two]" required />
                    <input type="text" name="last_name_two" id="title" value="{{ old('last_name_two') }}" placeholder="Enter last name [couple-two]" required />
                    <input type="email" name="email" id="email" placeholder="Email" required />
                    <input type="number" name="phone_no" placeholder="Phone number" required />
                    <input type="number" name="whatsApp_no" placeholder="WhatsApp number" value="{{ old('whastApp_no') }}" required />
                      <div class="">
                        <select name="couple_type" id="">
                            <option slected value="">Couple Type</option>
                            <option value="dating">Dating</option>
                            <option value="engaged">Engaged</option>
                            <option value="married">Married</option>

                        </select>
                         
                    </div>
                    <i style="color:black;">Enter Anniversary date.</i>
                    <input type="date" name="anniversary_date" id="name" placeholder="Anniversary Date" required />

                     <div class="">
                       <select name="anniversary_month" id="" onClick="sum()" required>
                        <option slected value="">Anniversary Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>

                        </select>
                    </div>
                     <input type="text" name="state_of_res" placeholder="Enter State of Residence" required />
                    
                </div>
                <div class="form-group-2">
                    <i style="color:black; font-style:bold;">Upload a picture of you and your partner?</i>
                     <input type="file" name="couple_picture" required />
                </div>
                 <div class="form-group-2">
                    <i style="color:black; font-style:bold;">Upload Receipt [Upload a screenshot of your payment receipt if you paid direclty to our account]</i>
                      <input type="file" name="receipt" />
                </div>
                <input class="form-group" type="hidden" name="reference" value="{{ old('reference') }}" id="refcode">
                    <input type="hidden" id="add" name="contest_fee">
                <div class="form-check">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree to the  <a href="https://mybirthdaysplash.com/contests/terms" class="term-service">Terms and Conditions</a></label>
                </div>
                <div class="form-submit">
                <!-- <input type="button" onclick="payWithPaystack()"  value="Make Payment" /> -->
                <button type="button" onclick="payWithPaystack()" class="submit">Make Payment</button> <br><br>
                    <input type="submit" name="submit" id="submit" class="submit" value="Complete Registration" />
                    
                </div>
               
            </form>
       
        </div>

    </div>

    <!-- JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> -->
        <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="cotm_reg/vendor/jquery/jquery.min.js"></script>
    <script src="cotm_reg/js/main.js"></script>
    <script src="cotm_reg/js/paystack.js"></script>
</html>
