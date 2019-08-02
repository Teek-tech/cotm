function payWithPaystack(){
   //var nameu = "{{ env('PAYSTACK_KEY') }}";
    var handler = PaystackPop.setup({
    key: "{{ env('PAYSTACK_KEY') }}", //'pk_test_4e1a285859f273d837b6f3a1aae6afc0adf46b2e', 
    email: document.getElementById("email").value,
    amount: document.getElementById("add").value,
    currency: "NGN",
    ref: 'COTM-'+(Math.random().toString(36).substring(2, 16) + Math.random().toString(36).substring(2, 16)).toUpperCase(),
   
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