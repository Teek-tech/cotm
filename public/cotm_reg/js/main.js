(function ($) {
    // USE STRICT
    "use strict";

    $(".form-radio .radio-item").click(function(){
        //Spot switcher:
        $(this).parent().find(".radio-item").removeClass("active");
        $(this).addClass("active");
    });
  
    $('#couple_type').parent().append('<ul class="list-item" id="newcouple_type" name="couple_type"></ul>');
    $('#couple_type option').each(function(){
        $('#newcouple_type').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#couple_type').remove();
    $('#newcouple_type').attr('id', 'couple_type');
    $('#couple_type li').first().addClass('init');
    $("#couple_type").on("click", ".init", function() {
        $(this).closest("#couple_type").children('li:not(.init)').toggle('slow');
    }); 
//start
    $('#anniversary_month').parent().append('<ul class="list-item" id="newcourse1_type" name="anniversary_month"></ul>');
    $('#anniversary_month option').each(function(){
        $('#newcourse1_type').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#anniversary_month').remove();
    $('#newcourse1_type').attr('id', 'anniversary_month');
    $('#anniversary_month li').first().addClass('init');
    $("#anniversary_month").on("click", ".init", function() {
        $(this).closest("#anniversary_month").children('li:not(.init)').toggle('slow');
    });
//end
    $('#confirm_type').parent().append('<ul class="list-item" id="newconfirm_type" name="confirm_type"></ul>');
    $('#confirm_type option').each(function(){
        $('#newconfirm_type').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#confirm_type').remove();
    $('#newconfirm_type').attr('id', 'confirm_type');
    $('#confirm_type li').first().addClass('init');
    $("#confirm_type").on("click", ".init", function() {
        $(this).closest("#confirm_type").children('li:not(.init)').toggle('slow');
    });
    
    $('#hour_appointment').parent().append('<ul class="list-item" id="newhour_appointment" name="hour_appointment"></ul>');
    $('#hour_appointment option').each(function(){
        $('#newhour_appointment').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#hour_appointment').remove();
    $('#newhour_appointment').attr('id', 'hour_appointment');
    $('#hour_appointment li').first().addClass('init');
    $("#hour_appointment").on("click", ".init", function() {
        $(this).closest("#hour_appointment").children('li:not(.init)').toggle('slow');
    });

    var allOptions = $("#couple_type").children('li:not(.init)');
    $("#couple_type").on("click", "li:not(.init)", function() {
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#couple_type").children('.init').html($(this).html());
        allOptions.toggle('slow');
    });
     var allOptionss = $("#anniversary_month").children('li:not(.init)');
    $("#anniversary_month").on("click", "li:not(.init)", function() {
        allOptionss.removeClass('selected');
        $(this).addClass('selected');
        $("#anniversary_month").children('.init').html($(this).html());
        allOptionss.toggle('slow');
    });

    var FoodOptions = $("#confirm_type").children('li:not(.init)');
    $("#confirm_type").on("click", "li:not(.init)", function() {
        FoodOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#confirm_type").children('.init').html($(this).html());
        FoodOptions.toggle('slow');
    });

    var AppointmentOptions = $("#hour_appointment").children('li:not(.init)');
    $("#hour_appointment").on("click", "li:not(.init)", function() {
        AppointmentOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#hour_appointment").children('.init').html($(this).html());
        AppointmentOptions.toggle('slow');
    });
})(jQuery);