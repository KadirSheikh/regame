


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