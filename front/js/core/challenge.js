$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var interval;

    interval = setInterval(function () {
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: 'challenge.php',
            data: '',
            success: function (data) {
                if (data.php) {  //alert('11');
                    $('#challenge-div').php('');
                    $('#challenge-div').php(data.php);
                } else {
                    //alert('Server Error!');
                }
            },
            error: function (data) {
                //alert('ero');
            },
            complete: function (data) { //alert(data.php);
                $('.loading').hide();

                //~ if( $(".popupresut").css('display') == 'block') { 
                //~ //alert('2255'); 
                //~ //var ch_id	=	$('.data-pd-popup-submit-result-open').attr('ch_id');
                //~ //alert(ch_id);
                //~ var ch_id	=	localStorage.getItem('ch_id');
                //~ var user_id	=	1134;

                //~ if(ch_id){
                //~ $.ajax({
                //~ type: "POST",
                //~ dataType: 'json',
                //~ url: '../dashboard/get-room-id',
                //~ data: { 'ch_id' : ch_id } ,
                //~ success:function(data){ 
                //~ if(data.room_id && data.o_id == user_id){ 
                //~ $('#res-room-id-submit').attr("disabled", true);
                //~ $('#res-room-id').attr("disabled", true);
                //~ $('#change-room-id').show();
                //~ $('#res-room-id').val(data.room_id);
                //~ }if(data.room_id && data.c_id == user_id){ 
                //~ $('#res-room-id-submit').attr("disabled", true);
                //~ $('#res-room-id').attr("disabled", true);
                //~ $('#change-room-id').hide();
                //~ $('#res-room-id').val(data.room_id);
                //~ }else if( !data.room_id && data.o_id == user_id){ 
                //~ $('#res-room-id-submit').attr("disabled", true);
                //~ $('#res-room-id').attr("disabled", true);
                //~ $('#change-room-id').hide();
                //~ }else if(!data.room_id && data.c_id == user_id && !$('#res-room-id').val()){ 

                //~ $('#res-room-id').val('');
                //~ $('#res-room-id-submit').attr("disabled", false);
                //~ $('#res-room-id').attr("readonly", false);
                //~ $('#change-room-id').hide();
                //~ }else if(!data.room_id && data.c_id == user_id && $('#res-room-id').val()){

                //~ //$('#res-room-id').val('');
                //~ $('#res-room-id-submit').attr("disabled", false);
                //~ $('#res-room-id').attr("readonly", false);
                //~ $('#res-room-id').attr("disabled", false);
                //~ $('#change-room-id').hide();
                //~ }
                //~ },
                //~ error:function(data){
                //~ //alert('ero');
                //~ },
                //~ complete:function(data){ //alert(data.php);

                //~ }

                //~ });
                //~ }						
                //~ } 



            }

        });
    }, 2000);

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

    function closePopup() {
        $('.popup').fadeOut(200);
    }

    $('#create-challenge').submit(function (e) {
        e.preventDefault();
        var amount = $('#challenge-amount').val();

        var flag = 1;

        if (!amount) {
            $('#challenge-amount-error').text('Please enter amount');
            $('#challenge-amount-error').addClass('error');
            $('#challenge-amount-error').show();
            flag = 0;
        } else if (!$.isNumeric(amount)) {
            $('#challenge-amount-error').text('Please enter numeric value');
            $('#challenge-amount-error').addClass('error');
            $('#challenge-amount-error').show();
            flag = 0;
        } else if (!(amount == 30 || amount == 40 || amount % 50 == 0)) {
            $('#challenge-amount-error').text('Invalid amount!');
            $('#challenge-amount-error').addClass('error');
            $('#challenge-amount-error').show();
            flag = 0;
        } else {
            $('#challenge-amount-error').text('');
            $('#challenge-amount-error').removeClass('error');
            $('#challenge-amount-error').hide();
        }


        if (flag) {
            $form = $(this);

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '../dashboard/create-challenge',
                data: $form.serialize(),
                beforeSend: function () {
                    $('.loading').show();
                },
                success: function (data) {
                    if (data.php) {
                        $('#challenge-amount-error').text('');
                        $('#challenge-amount-error').hide();
                        $('#challenge-amount-error').hide();
                        //swal(data.success);
                        //$("#create-challenge").trigger("reset");
                        $('#challenge-div').php(data.php);
                    } else {
                        $('#challenge-amount-error').text(data.error);
                        $('#challenge-amount-error').show();
                    }
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    $('#challenge-amount-error').text(errors.message);
                    $('#challenge-amount-error').show();
                },
                complete: function () {
                    $('#create-challenge')[0].reset();
                    $('.loading').hide();
                }

            });
        }

    });

    $('#challenge-amount').keyup(function (e) {
        var amount = $('#challenge-amount').val();
        var flag = 1;
        var valid = 1;

        if (!amount) {
            $('#challenge-amount-error').text('Please enter amount');
            $('#challenge-amount-error').addClass('error');
            $('#challenge-amount-error').show();
            flag = 0;
        } else if (!$.isNumeric(amount)) {
            $('#challenge-amount-error').text('Please enter numeric value');
            $('#challenge-amount-error').addClass('error');
            $('#challenge-amount-error').show();
            flag = 0;
        } else if (!(amount == 30 || amount == 40 || amount % 50 == 0)) {
            $('#challenge-amount-error').text('Invalid amount!');
            $('#challenge-amount-error').addClass('error');
            $('#challenge-amount-error').show();
            flag = 0;
        } else {
            $('#challenge-amount-error').text('');
            $('#challenge-amount-error').removeClass('error');
            $('#challenge-amount-error').hide();
        }


    });


    $('.accept-other-challenge').click(function () {
        $('.loading').show();
        var id = $(this).attr('ch-id');
        $form = $('#accept-other-challenge-' + id);

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: '../dashboard/accept-other-challenge',
            data: $form.serialize(),
            beforeSend: function () {

            },
            success: function (data) {
                $('#challenge-div').php(data.php);
                $('.loading').hide();
                if (data.error) {
                    swal(data.error);
                } else if (data.php) {
                    $('#challenge-div').php(data.php);
                } else {

                }
            },
            complete: function () {

            }

        });
    });

    $('.accept-own-challenge').click(function () {
        var id = $(this).attr('ch-id');
        $('.loading').show();
        $form = $('#accept-own-challenge-' + id);

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: '../dashboard/accept-own-challenge',
            data: $form.serialize(),
            beforeSend: function () {

            },
            success: function (data) {
                $('.loading').hide();
                $('#challenge-div').php(data.php);
                if (data.error) {
                    swal(data.error);
                } else if (data.php) {
                    $('#challenge-div').php(data.php);
                } else {

                }
            },
            complete: function () {

            }

        });
    });

    $('.deny-own-challenge').click(function () {
        var id = $(this).attr('ch-id');
        $('.loading').show();
        $form = $('#deny-own-challenge-' + id);
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: '../dashboard/deny-own-challenge',
            data: $form.serialize(),
            beforeSend: function () {

            },
            success: function (data) {
                swal('Request denied successfully!');
                $('.loading').hide();
                $('#challenge-div').php(data.php);
                if (data.error) {
                    swal(data.error);
                } else if (data.php) {
                    $('#challenge-div').php(data.php);
                } else {

                }
            },
            complete: function () {

            }

        });


    });

    $('.cancel-own-challenge').click(function () {
        var id = $(this).attr('ch-id');
        $('.loading').show();
        $form = $('#cancel-own-challenge-' + id);
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: '../dashboard/cancel-own-challenge',
            data: $form.serialize(),
            beforeSend: function () {

            },
            success: function (data) {
                swal('Challenge cancelled successfully!');
                $('.loading').hide();
                $('#challenge-div').php(data.php);
                if (data.error) {
                    swal(data.error);
                } else if (data.php) {
                    $('#challenge-div').php(data.php);
                } else {

                }
            },
            complete: function () {

            }

        });



    });

    $('.cancel-other-challenge').click(function () {
        var id = $(this).attr('ch-id');
        $('.cancel-other-challenge').attr("disabled", true);
        $('.loading').show();
        $form = $('#cancel-other-challenge-' + id);
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: '../dashboard/cancel-other-challenge',
            data: $form.serialize(),
            beforeSend: function () {

            },
            success: function (data) {
                swal('Request cancelled successfully!');
                $('.loading').hide();
                $('.cancel-other-challenge').attr("disabled", false);
                $('#challenge-div').php(data.php);
                if (data.error) {
                    swal(data.error);
                } else if (data.php) {
                    $('#challenge-div').php(data.php);
                } else {

                }
            },
            complete: function () {

            }

        });


    });



    $('.allow-roomid').click(function (e) {
        $('.loading').show();
        var id = $(this).attr('ch-id');
        var status = $(this).val();
        $('#r_id_status-' + id).val(status);
        $form = $('#chk-room-id-' + id);

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: '../dashboard/chk-room-id',
            data: $form.serialize(),
            beforeSend: function () {

            },
            success: function (data) {
                $('#roomIdPopup-' + id).hide();
                if (data.error) {
                    swal(data.error);
                } else if (data.php) {
                    $('#challenge-div').php(data.php);
                } else {

                }
            },
            complete: function () {
                closePopup();
                $('.loading').hide();
                $("#chk-room-id-new").trigger("reset");
                $('#res-room-id').val('');
            }

        });

    });


    //------------------ Allow room id new start -------------//

    $('.allow-roomid-new').click(function (e) {
        $('.loading').show();
        var id = $(this).attr('ch-id');
        var status = $(this).val();
        $('#val-r_id_status').val(status);
        $form = $('#chk-room-id-new');

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: '../dashboard/chk-room-id',
            data: $form.serialize(),
            beforeSend: function () {

            },
            success: function (data) {
                $('#roomIdPopup-' + id).hide();
                if (data.error) {
                    swal(data.error);
                } else if (data.php) {
                    $('#challenge-div').php(data.php);
                } else {

                }
            },
            complete: function () {
                //closePopup();
                $('.popupresut').fadeOut(200);
                $('.loading').hide();
                $("#chk-room-id-new").trigger("reset");
                $('#res-room-id').val('');
                $("#resultSubmitRadioBtn").trigger("reset");
            }

        });

    });
    //------------------ Allow room id new end -------------//

    //---------------- Submit result new start --------------//
    $(document).on('click', '[data-pd-popup-submit-result-open]', function (e) {

        var user_id = 1134;
        var ch_id = $(this).attr('ch_id');
        var c_id = $(this).attr('c_id');
        var o_id = $(this).attr('o_id');
        var amount = $(this).attr('amount');
        var r_id = $(this).attr('r_id');
        var r_id_status = $(this).attr('r_id_status');
        var creatorname = $(this).attr('creatorname');
        var opponentname = $(this).attr('opponentname');
        var c_result = $(this).attr('c_result');
        var token = $(this).attr('token');
        var omobile = $(this).attr('omobile');

        localStorage.setItem('ch_id', ch_id);

        $('#val-c-username').php(creatorname);
        $('#val-o-username').php(opponentname);
        $('#val-ch-amount').php(amount);
        $('#val-ch-id').val(ch_id);
        $('#val-c-id').val(c_id);
        $('#val-o-id').val(o_id);
        $('#val-amount').val(amount);
        $('#val-token').val(token);
        $('#oppenent-mobile').php(omobile);
        $('#oppenent-mobile-lnk').attr("href", "https://wa.me/91" + omobile + "?text=How+To+Play,Please+Guide+Me");

        if (c_id == user_id && r_id == '') {
            $('#res-room-id-submit').attr("disabled", false);
            $('#res-room-id').attr("readonly", false);
            $('#res-room-id').attr("disabled", false);
            $('#change-room-id').hide();
        } else if (c_id == user_id && (r_id_status == 'DEFAULT' || r_id_status == 'CHANGE') && (c_result == '' || !c_result)) {
            $('#res-room-id-submit').attr("disabled", true);
            $('#res-room-id').attr("readonly", true);
            $('#change-room-id').hide();
        }
        else if (o_id == user_id && r_id == '') {
            $('#res-room-id-submit').attr("disabled", true);
            $('#res-room-id').attr("disabled", true);
            $('#change-room-id').hide();
        } else if (o_id == user_id && (r_id_status == 'DEFAULT' || r_id_status == 'CHANGE') && (c_result == '' || !c_result)) {
            $('#res-room-id-submit').attr("disabled", true);
            $('#res-room-id').attr("disabled", true);
            $('#change-room-id').show();
        } else {
            //~ $('#res-room-id-submit').attr("disabled", true);
            //~ $('#res-room-id').attr("disabled", true);
            //~ $('#change-room-id').hide();
        }

        if (r_id) {
            $('#res-room-id').val(r_id);
        } else {
            $('#res-room-id').val('');
        }

        $('#res-c-username').php(creatorname);
        $('#res-o-username').php(opponentname);
        $('#res-ch-amount').php(amount);
        $('#res-ch-id').val(ch_id);
        $('#res-c-id').val(c_id);
        $('#res-o-id').val(o_id);
        $('#res-amount').val(amount);
        $('#res-token').val(token);

        $('.popupresut').fadeIn(100);
    });

    $('#res-room-id').keyup(function () {
        var room_id = $(this).val();

        if (!room_id) {
            $('#room_id-error').text('Please enter room id');
            $('#room_id-error').addClass('error');
            $('#room_id-error').show();
        } else if (!$.isNumeric(room_id)) {
            $('#room_id-error').text('Please enter numeric value');
            $('#room_id-error').addClass('error');
            $('#room_id-error').show();
        } else {
            $('#room_id-error').text('');
            $('#room_id-error').removeClass('error');
            $('#room_id-error').hide();
        }
    });

    $('#res-room-id-submit').click(function (e) {
        e.preventDefault();

        var room_id = $('#res-room-id').val();

        var flag = 1;

        if (!room_id) {
            $('#room_id-error').text('Please enter room id');
            $('#room_id-error').addClass('error');
            $('#room_id-error').show();
            flag = 0;
        } else if (!$.isNumeric(room_id)) {
            $('#room_id-error').text('Please enter numeric value');
            $('#room_id-error').addClass('error');
            $('#room_id-error').show();
            flag = 0;
        } else {
            $('#room_id-error').text('');
            $('#room_id-error').removeClass('error');
            $('#room_id-error').hide();
        }
        if (flag) {

            $form = $('#chk-room-id-new');

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '../dashboard/chk-room-id',
                data: $form.serialize(),

                beforeSend: function () {
                    $('.loading').show();
                },
                success: function (data) {

                    if (data.error) {
                        swal(data.error);
                    } else if (data.php) {
                        $('#challenge-div').php(data.php);
                    } else {

                    }
                },
                complete: function () {
                    //closePopup();
                    $('.popupresut').fadeOut(200);
                    $('.loading').hide();
                    $('#chk-room-id-new')[0].reset();
                    $("#chk-room-id-new").trigger("reset");
                    $('#res-room-id').val('');
                    $("#resultSubmitRadioBtn").trigger("reset");
                }

            });
        }
    });


    $('#resultSubmitRadioBtn input').on('change', function () {
        var room_id = $('#res-room-id').val();

        $('input[name="result"]').attr("readonly", false);
        var id = $(this).attr('ch-id');
        var selectedResult = $('input[name=result]:checked', '.resultRadioBtn').val();

        $('#result-submit-btn-res').show();
        if (selectedResult == 'WON') {
            $('#cancel-text-res').hide();
            $('#upload-image-res').show();
        } else if (selectedResult == 'LOSS') {
            $('#cancel-text-res').hide();
            $('#upload-image-res').hide();
        } else {
            $('#upload-image-res').hide();
            $('#cancel-text-res').show();
        }

        $('#resultSubmitRadioBtn').submit(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            flag = 1;
            if (selectedResult == 'WON') {
                var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
                var file = $('#result_img-res').val();
                if (!file) {
                    flag = 0;
                    $('#result-error-res').text('Please upload image');
                    $('#result-error-reason-res').text('');
                    $('#result-error-res').show();
                } else if ($.inArray(file.split('.').pop().toLowerCase(), fileExtension) == -1) {
                    flag = 0;
                    $('#result-error-res').text('Only formats are allowed : ' + fileExtension.join(', '));
                    $('#result-error-reason-res').text('');
                    $('#result-error-res').show();
                }
            } else if (selectedResult == 'CANCEL') {
                var cancel_reason = $('#cancel_reason-res').val();
                if (!cancel_reason) {
                    $('#result-error-reason-res').text('Please enter reason to cancel');
                    $('#result-error-res').text('');
                    $('#result-error-reason-res').show();
                    flag = 0;
                }
            } else {
                $('#result-error-reason-res').text('');
                $('#result-error-reason-res').hide();
            }

            if (flag) {
                $form = $(this);
                $('.loading').show();
                $.ajax({
                    url: '../dashboard/submit-result',
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        //$('#result-submit-btn-res').attr('disabled',true);

                    },
                    success: function (data) {

                        if (data.error) {
                            $('.loading').hide();
                            swal(data.error);
                        }
                        if (data) {
                            $('.loading').hide();
                            $('#result-submit-error-res').text('');
                            $('#result-submit-error-res').hide();
                            $('#result-submit-error-res').hide();
                            swal('Result submitted successfully!');
                            //$("#create-challenge").trigger("reset");
                            $('#challenge-div').php(data.php);
                        } else {
                            //$('.loading').hide();
                            $('#result-submit-error-res').text(data.error);
                            $('#result-submit-error-res').show();
                        }
                    },
                    error: function (data) {
                        $('.loading').hide();
                        swal('Result already submitted!');
                        //var errors = $.parseJSON(data.responseText);
                        //$('#result-submit-error-res').text(errors.message);
                        //$('#result-submit-error-res').show();
                    },
                    complete: function () {
                        closePopup();
                        $('#resultSubmitRadioBtn')[0].reset();
                        $("#resultSubmitRadioBtn").trigger("reset");

                        $("#chk-room-id-new").trigger("reset");
                        $('#res-room-id').val('');
                        //$('#result-submit-btn-res').attr('disabled',false);

                    }

                });
            }

        });

    });
    //---------------- Submit result new end --------------//

});





$('.accept-other-challenge').click(function () {
    $('.loading').show();
    var id = $(this).attr('ch-id');
    $form = $('#accept-other-challenge-' + id);

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: '../dashboard/accept-other-challenge',
        data: $form.serialize(),
        beforeSend: function () {

        },
        success: function (data) {
            $('#challenge-div').php(data.php);
            if (data.error) {
                swal(data.error);
            } else if (data.php) {
                $('#challenge-div').php(data.php);
            } else {

            }
        },
        complete: function () {
            $('.loading').hide();
        }

    });
});

$('.accept-own-challenge').click(function () {
    $('.loading').show();
    var id = $(this).attr('ch-id');
    $form = $('#accept-own-challenge-' + id);

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: '../dashboard/accept-own-challenge',
        data: $form.serialize(),
        beforeSend: function () {

        },
        success: function (data) {
            $('#challenge-div').php(data.php);
            if (data.error) {
                swal(data.error);
            } else if (data.php) {
                $('#challenge-div').php(data.php);
            } else {

            }
        },
        complete: function () {
            $('.loading').hide();
        }

    });
});

$('.deny-own-challenge').click(function () {
    var id = $(this).attr('ch-id');
    $('.loading').show();
    $form = $('#deny-own-challenge-' + id);
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: '../dashboard/deny-own-challenge',
        data: $form.serialize(),
        beforeSend: function () {

        },
        success: function (data) {
            $('.loading').hide();
            swal('Request denied successfully!');
            $('#challenge-div').php(data.php);
            if (data.error) {
                swal(data.error);
            } else if (data.php) {
                $('#challenge-div').php(data.php);
            } else {

            }
        },
        complete: function () {
            $('.loading').hide();
        }

    });


});

$('.cancel-own-challenge').click(function () {
    var id = $(this).attr('ch-id');
    $('.loading').show();
    $form = $('#cancel-own-challenge-' + id);
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: '../dashboard/cancel-own-challenge',
        data: $form.serialize(),
        beforeSend: function () {

        },
        success: function (data) {
            $('.loading').hide();
            swal('Challenge cancelled successfully!');
            $('#challenge-div').php(data.php);
            if (data.error) {
                swal(data.error);
            } else if (data.php) {
                $('#challenge-div').php(data.php);
            } else {

            }
        },
        complete: function () {
            $('.loading').hide();
        }

    });


});

$('.cancel-other-challenge').click(function () {
    var id = $(this).attr('ch-id');
    $('.loading').show();
    $form = $('#cancel-other-challenge-' + id);
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: '../dashboard/cancel-other-challenge',
        data: $form.serialize(),
        beforeSend: function () {

        },
        success: function (data) {
            $('.loading').hide();
            swal('Request cancelled successfully!');
            $('#challenge-div').php(data.php);
            if (data.error) {
                swal(data.error);
            } else if (data.php) {
                $('#challenge-div').php(data.php);
            } else {

            }
        },
        complete: function () {
            $('.loading').hide();
        }

    });


});

