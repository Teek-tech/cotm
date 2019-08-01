<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                @if(session()->has('success'))
                  <div class="alert alert-solid alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      {{ session()->get('success') }}
                  </div>
              @endif
                <div class="links">
                    <form class="form-group" name="contestform" action="{{route('user.register')}}"  enctype="multipart/form-data" method="post">
                    @csrf
                    @method('POST')
                   Couple One (First name) <input type="text" class="form-group" name="first_name_one" placeholder="" > <br>
                   Couple One (Last name) <input type="text" class="form-group" name="last_name_one" placeholder="" > <br>  
                   Couple two (First name) <input type="text" class="form-group" name="first_name_two" placeholder="" > <br>
                   Couple two (Last name) <input type="text" class="form-group" name="last_name_two" placeholder="" > <br>
                   Email  <input type="email" class="form-group" name="email" placeholder="" id="email"> <br>
                   Phone  <input type="text" class="form-group" name="phone_no" placeholder="" > <br>
                   WhatsApp  <input type="text" class="form-group" name="whatsApp_no" placeholder="" > <br>
                   Anniversary Date  <input type="date" class="form-group" name="anniversary_date" placeholder="" > <br>
                   Couple Type  <select name="couple_type"  class="form-group" >
                   <option value="dating">Dating</option>
                   <option value="engaged">Engaged</option>
                   <option value="married">Married</option>
                   </select><br>
                  State of Residence  <input type="text" class="form-group" name="state_of_res" placeholder="" > <br>
                  Receipt  <input type="file" class="form-group" name="receipt" placeholder="" ><br>
                  Anniversary Month : <select name="anniversary_month" onClick="sum()" required>
						<option value="birth-month">None</option>
						<option value="January">January</option>
						<option value="February">February</option>
						<option value="March">March</option>
						<option value="April">April</option>
						<option value="May">May</option>
						<option value="June">June</option>
						<option value="July">July</option>
						<option value="August">August</option>
						<option value="Septemebr">Septemebr</option>
						<option value="Ocotber">Ocotber</option>
						<option value="November">November</option>
						<option value="December">December</option>
					</select>
                  Couple Picture  <input type="file" class="form-group" name="couple_picture" ><br>
                    <!-- <input type="text" class="form-group" name="online_teller" ><br> -->
                    <input class="form-group" type="text" name="reference" value="{{ old('reference') }}" id="refcode">
                    <input type="text" id="add" name="contest_fee">
                    <input type="submit" value="register">
                    <button type="button" onclick="payWithPaystack()" class="contact100-form-btn">
								Pay
							</button>
                    </form>
                </div>
                
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://js.paystack.co/v1/inline.js"></script>
    </body>
</html>
<script>
             
    function payWithPaystack(){
var handler = PaystackPop.setup({
key: 'pk_test_4e1a285859f273d837b6f3a1aae6afc0adf46b2e',
email: document.getElementById("email").value,
amount: document.getElementById("add").value,
currency: "NGN",
ref: 'KOTM-'+(Math.random().toString(36).substring(2, 16) + Math.random().toString(36).substring(2, 16)).toUpperCase(),
//'KOTM-'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
// metadata: {
//    custom_fields: [
//       {
//           display_name: "Mobile Number",
//           variable_name: "mobile_number",
//           value: "+2348012345678"
//       }
//    ]
// },
callback: function(response){
  
 alert('success. registration ref is ' + response.reference);
 //alert(hello);
 document.getElementById("refcode").value = response.reference;
   
},
onClose: function(){
   alert('window closed');
}
});
handler.openIframe();

}


    function sum()
{
const monthNames = ["January", "February", "March", "April", "May", "June",
"July", "August", "September", "October", "November", "December"
]; 
const d = new Date();

var getSelectedMonth = document.contestform.anniversary_month.value;
var getCurrentMonth =monthNames[d.getMonth()];
var status = 0;
var earlyPayment = 100000;
var latePayment= 200000;
if(getCurrentMonth == getSelectedMonth && status ==0){
document.getElementById('add').value = earlyPayment*0.015+earlyPayment;
}else if(getCurrentMonth == getSelectedMonth && status ==1){
document.getElementById('add').value = latePayment*0.015+latePayment;
}else if(getCurrentMonth != getSelectedMonth){
document.getElementById('add').value = earlyPayment*0.015+earlyPayment;
}
// document.getElementById('yolo').value = getSelectedMonth;

// document.getElementById('vvv').value =getCurrentMonth;
// var num1 = 0.015;
// var num2 = document.myform.number2.value;
// var sum = parseInt(num1) + parseInt(num2);
// document.getElementById('add').value = sum*0.015+sum;

  
}   
window.setTimeout(function() {  
    $(".alert-success").animate({opacity: 0}, 500).hide('slow');
}, 6000);

$("div.alert").on("click", "button.close", function() {
    $(this).parent().animate({opacity: 0}, 500).hide('slow');
});  
</script>
