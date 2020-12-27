// ---------- DASHBOARD.JS START
$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //----- OPEN
    $(document).on('click', '[data-pd-popup-open]', function (e) {
        var targeted_popup_class = $(this).attr("data-pd-popup-open");
        $('[data-pd-popup="' + targeted_popup_class + '"]').fadeIn(100);
        $("body").addClass("popup-open");
        e.preventDefault();
    });

    //----- CLOSE
    $(document).on('click', '[data-pd-popup-close]', function (e) {
        var targeted_popup_class = $(this).attr("data-pd-popup-close");
        $('[data-pd-popup="' + targeted_popup_class + '"]').fadeOut(200);
        $("body").removeClass("popup-open");
        e.preventDefault();
    });

    $('#withDraw').submit(function (e) {
        e.preventDefault();

        var withdraw_in = $('#withdraw_in').val();
        var wallet_number = $('#wallet_number').val();
        var withdraw_amt = $('#withdraw_amt').val();
        var flag = 1;
        if (!withdraw_in) {
            $('#withdraw_in-error').text('Please select withdraw in');
            $('#withdraw_in-error').addClass('error');
            $('#withdraw_in-error').show();
            flag = 0;
        }

        if (!wallet_number) {
            $('#wallet_number-error').text('Please enter mobile number');
            $('#wallet_number-error').addClass('error');
            $('#wallet_number-error').show();
            flag = 0;
        } else if (!$.isNumeric(wallet_number)) {
            $('#wallet_number-error').text('Please enter numeric value');
            $('#wallet_number-error').addClass('error');
            $('#wallet_number-error').show();
            flag = 0;
        } else if (wallet_number.length != 10) {
            $('#wallet_number-error').text('Please enter 10 digit mobile number');
            $('#wallet_number-error').addClass('error');
            $('#wallet_number-error').show();
            flag = 0;
        }

        if (!withdraw_amt) {
            $('#withdraw_amt-error').text('Please enter amount');
            $('#withdraw_amt-error').addClass('error');
            $('#withdraw_amt-error').show();
            flag = 0;
        } else if (!$.isNumeric(withdraw_amt)) {
            $('#withdraw_amt-error').text('Please enter numeric value');
            $('#withdraw_amt-error').addClass('error');
            $('#withdraw_amt-error').show();
            flag = 0;
        } else if (withdraw_amt < 50) {
            $('#withdraw_amt-error').text('Amount should be greater than 50');
            $('#withdraw_amt-error').addClass('error');
            $('#withdraw_amt-error').show();
            flag = 0;
        }

        if (flag) {
            $form = $(this);

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: 'dashboard/withdraw-request',
                data: $form.serialize(),
                beforeSend: function () {
                    $('.loading').show();
                },
                success: function (data) {
                    if (data.success) {
                        $('#error-msg').text('');
                        $('#error-msg').hide();
                        $('#withdraw-modal').hide();
                        swal(data.success);
                        $('#withDraw')[0].reset();
                        $("#withDraw").trigger("reset");
                    } else {
                        $('#error-msg').text(data.error);
                        $('#error-msg').show();
                    }
                    if (data.wallet_amount) {
                        $('#wallet_amount').text(data.wallet_amount);
                    }
                },
                complete: function (data) {
                    $('.loading').hide();
                    $('#withDraw')[0].reset();
                    $("#withDraw").trigger("reset");
                }

            });
        }
    });

    $('#withdraw_in').change(function () {
        var withdraw_in = $('#withdraw_in').val();
        if (withdraw_in) {
            $('#withdraw_in-error').text('');
            $('#withdraw_in-error').removeClass('error');
            $('#withdraw_in-error').hide();
        } else {
            $('#withdraw_in-error').text('Please select withdraw in field');
            $('#withdraw_in-error').addClass('error');
            $('#withdraw_in-error').show();
        }
    });

    $('#wallet_number').keyup(function () {
        var wallet_number = $(this).val();
        if (!wallet_number) {
            $('#wallet_number-error').text('Please enter mobile number');
            $('#wallet_number-error').addClass('error');
            $('#wallet_number-error').show();
        } else if (!$.isNumeric(wallet_number)) {
            $('#wallet_number-error').text('Please enter numeric value');
            $('#wallet_number-error').addClass('error');
            $('#wallet_number-error').show();
        } else if (wallet_number.length != 10) {
            $('#wallet_number-error').text('Please enter 10 digit mobile number');
            $('#wallet_number-error').addClass('error');
            $('#wallet_number-error').show();
        } else {
            $('#wallet_number-error').text('');
            $('#wallet_number-error').removeClass('error');
            $('#wallet_number-error').hide();
        }
    });

    $('#withdraw_amt').keyup(function () {
        var withdraw_amt = $('#withdraw_amt').val();
        if (!withdraw_amt) {
            $('#withdraw_amt-error').text('Please enter amount');
            $('#withdraw_amt-error').addClass('error');
            $('#withdraw_amt-error').show();
        } else if (!$.isNumeric(withdraw_amt)) {
            $('#withdraw_amt-error').text('Please enter numeirc value');
            $('#withdraw_amt-error').addClass('error');
            $('#withdraw_amt-error').show();
        } else if (withdraw_amt < 50) {
            $('#withdraw_amt-error').text('Amount should be greater than 50');
            $('#withdraw_amt-error').addClass('error');
            $('#withdraw_amt-error').show();
        } else {
            $('#withdraw_amt-error').text('');
            $('#withdraw_amt-error').removeClass('error');
            $('#withdraw_amt-error').hide();
        }
    });

    $('#add-money').submit(function (e) {
        e.preventDefault();
        var add_money = $('#add_money').val();
        var flag = 1;
        if (!add_money) {
            $('#add_money-error').text('Please enter amount');
            $('#add_money-error').addClass('error');
            $('#add_money-error').show();
            flag = 0;
        } else if (!$.isNumeric(add_money)) {
            $('#add_money-error').text('Please enter numeric value');
            $('#add_money-error').addClass('error');
            $('#add_money-error').show();
            flag = 0;
        } else if (add_money < 0) {
            $('#add_money-error').text('Amount should be less than 0');
            $('#add_money-error').addClass('error');
            $('#add_money-error').show();
            flag = 0;
        }

        if (flag) {
            e.currentTarget.submit();
        }
    });

    $('#add_money').keyup(function () {
        var add_money = $('#add_money').val();
        if (!add_money) {
            $('#add_money-error').text('Please enter amount');
            $('#add_money-error').addClass('error');
            $('#add_money-error').show();
        } else if (!$.isNumeric(add_money)) {
            $('#add_money-error').text('Please enter numeirc value');
            $('#add_money-error').addClass('error');
            $('#add_money-error').show();
        } else if (add_money < 0) {
            $('#add_money-error').text('Amount should be less than 0');
            $('#add_money-error').addClass('error');
            $('#add_money-error').show();
        } else {
            $('#add_money-error').text('');
            $('#add_money-error').removeClass('error');
            $('#add_money-error').hide();
        }
    });

    $('#unique-id').focusout(function (e) {
        e.preventDefault();
        var uid = $(this).val();
        var flag = 1;
        if (!uid) {
            swal("Unique ID may not be empty!");
            flag = 0;
        }

        var regex = new RegExp("^[a-zA-Z0-9]+$");

        if (!regex.test(uid)) {
            swal("Special characters are not allowed in Unique ID!");
            flag = 0;
        }

        if (flag) {
            $form = $(this);

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: 'dashboard/change-unique-id',
                data: $form.serialize(),
                success: function (data) {
                    if (data.message) {
                        swal(data.message);
                    }
                }

            });
        }

    });

});

// ---------- DASHBOARD.JS END

// ---------- REGISTER.JS START
$(function () {
			
    //----- CLOSE
        $(document).on('click','[data-pd-popup-close]', function(e) {
            var targeted_popup_class = $(this).attr("data-pd-popup-close");
            $('[data-pd-popup="' + targeted_popup_class + '"]').fadeOut(200);
            $("body").removeClass("popup-open");
            e.preventDefault();
        });
        
    $('#signup-btn').attr('disabled',true);
    
    $(document).on('click','[data-pd-popup-open]', function(e) {
        
        var mobile	=	$('#mobile-no').val();
        if(!mobile){
            swal('Please insert mobile no. first.');
        }else{
            var token	=	'DDYkFFNN19cpMaMyCF3yHLNIzWqSgkOPc1BEfNlT';
            $('.loading').show();
            
            $.ajax({
            type: "POST",
            dataType: 'json',
            url: 'https://bygame.in/verify-mobile',
            data: {'_token':token,'mobile': mobile},
            success:function(data){
                $('.loading').hide();
                if(data.success){
                    $('#successMsg').show();
                    $('#successMsg').text(data.success);
                    $('[data-pd-popup]').fadeIn(100);
                }
           },
           complete:function(data){ 
               
           }
            
        });
            
        }
    });
        
    $('#otp-submit').click(function(e){
        e.preventDefault();
        
        var otp	=	$('#otp-val').val();
        var mobile	=	$('#mobile-no').val();
        if(!otp){
            $('#otp-error').show();
            $('#otp-error').text('Insert OTP');
        }else{
            var token	=	'DDYkFFNN19cpMaMyCF3yHLNIzWqSgkOPc1BEfNlT';
            $('.loading').show();
            
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: 'https://bygame.in/verify-otp',
                data: {'_token':token,'otp': otp,'mobile':mobile},
                success:function(data){
                    $('.loading').hide();
                    if(data.success){
                        $('#otp-error').text('');
                        $('#otp-error').hide();
                        
                        $('#signup-btn').attr('disabled',false);
                        $('[data-pd-popup]').fadeOut(200);
                        swal(data.success);
                        $('#otp-val').val('');
                    }else{
                        $('#otp-error').show();
                        $('#otp-error').text(data.error);
                    }
               },
               error:function(data){
                   $('.loading').hide();
                   var response = JSON.parse(data.responseText);
                   $('#otp-error').show();
                   $('#otp-error').text(response.errors['otp']);
               },
               complete:function(data){ 
                   
               }
                
            });
        }
        
    });
    
});

// ---------- REGISTER.JS END


// ---------- CANCELLED_MATCH.JS, PENDING_MATCHES.JS,PLAYING_MATCHES.JS, TOTAL_LOSS.JS ,TOTAL_WIN.JS, RECENTLY_PLAYED.JS  START

$(function () {
    //----- OPEN
      $(document).on('click', '[data-pd-popup-open]', function (e) {
           
        var targeted_popup_class = $(this).attr("data-pd-popup-open");
        $('[data-pd-popup="' + targeted_popup_class + '"]').fadeIn(100);
        $("body").addClass("popup-open");
        e.preventDefault();
      });

      //----- CLOSE
      $(document).on('click', '[data-pd-popup-close]', function (e) {
           
        var targeted_popup_class = $(this).attr("data-pd-popup-close");
        $('[data-pd-popup="' + targeted_popup_class + '"]').fadeOut(200);
        $("body").removeClass("popup-open");
        e.preventDefault();
      });
 
    $(document).on('click', '[data-pd-popup-open]', function (e) {
        $('.popup').fadeIn(100);
        var omobile	=	$(this).attr('omobile');
        var cmobile	=	$(this).attr('cmobile');
        var cid	=	$(this).attr('cid');
        var oid	=	$(this).attr('oid');
        var amount	=	$(this).attr('amount');
        var opponentname	=	$(this).attr('opponentname');
        var creatorname	=	$(this).attr('creatorname');
        var user_id			=	1134;
        
        $('#opponentname').php(opponentname);
        $('#creatorname').php(creatorname);
        $('#amount').php(amount);
        
        if(cid == user_id && oid){
            $('#href').attr('href','https://wa.me/91'+omobile+'?text=How+To+Play,+Please+Guide+Me');
        }else if(oid == user_id && cid){
            $('#href').attr('href','https://wa.me/91'+cmobile+'?text=How+To+Play,+Please+Guide+Me');
        }else{
            $('#href').attr('href','javascript:void(0)');
            $('#href').removeAttr('target');
        }
        
    });
});


// ---------- CANCELLED_MATCH.JS, PENDING_MATCHES.JS,PLAYING_MATCHES.JS, TOTAL_LOSS.JS ,TOTAL_WIN.JS, RECENTLY_PLAYED.JS  END

// ---------- TRANSACTION.JS START
$(function () {
    //----- OPEN
    $(document).on("click", "[data-pd-popup-open]", function (e) {
      var targeted_popup_class = $(this).attr("data-pd-popup-open");
      $('[data-pd-popup="' + targeted_popup_class + '"]').fadeIn(100);
      $("body").addClass("popup-open");
      e.preventDefault();
    });

    //----- CLOSE
    $(document).on("click", "[data-pd-popup-close]", function (e) {
      var targeted_popup_class = $(this).attr("data-pd-popup-close");
      $('[data-pd-popup="' + targeted_popup_class + '"]').fadeOut(200);
      $("body").removeClass("popup-open");
      e.preventDefault();
    });
  });

  //Initialize Table
  $(document).ready(function () {
    var table = $("#example").DataTable({
      responsive: true,
    });

    new $.fn.dataTable.FixedHeader(table);
});


// ---------- TRANSACTION.JS END