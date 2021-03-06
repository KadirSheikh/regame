<?php include 'common/header.php'; ?>
<?php include 'common/connect.php'; ?>
<body>
  <div class="main">
  <?php include 'common/nav.php'; ?>
    	<section class="common-section dashboard-sections">
      <div class="container">
        <div class="account-summary">
          <h1>Account Summary</h1>
        </div>
        <div class="row">
          <div class="col-md-3 col-xs-6 topbar text-center" style="border-bottom: 2px solid #f30e0e;">
            <div class="player-icon-block">
              <img src="./front/images/player.png" alt="">
            </div>
            <h2>  <?php
                

                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                 
                 
                  echo $_SESSION['username'];
                
     
                } 
                ?></h2>
            <h3>
				<!-- <form action="javascript:void(0)" id="change-unique-id" method="POST" >
					<input type="hidden" name="_token" value="JLDOT906Dihv5Fe4Qk4EJDqYPL6QBqihdKZASGPW">					@-<input type="text" class="unique-user-id" value="KadGxn" name="username" id="unique-id" />
				</form> -->
			</h3>
          </div>
          <div class="col-md-3 col-xs-6 topbar balance-block text-center" style="border-bottom: 2px solid #efb207;">
            <h2>Available Balance</h2>
            <h3> <span id="wallet_amount">0.00 </span> </h3>
          </div>
          <div class="col-md-3 col-xs-6 topbar balance-block text-center" style="border-bottom: 2px solid #337ab7;">
            <h2>Total Won </h2>
            <h3> 0.00</h3>
          </div>
          <div class="col-md-3 col-xs-6 topbar balance-block text-center" style="border-bottom: 2px solid #64b161;">
            <h2>Total Withdrawal</h2>
            <h3> 0.00</h3>
          </div>
        </div>
      </div>
    </section>
    <section class="dashboard-sections">
      <div class="container">
        <div class="account-summary">
          <h1>Add & Withdrawal Money</h1>
        </div>
        <div class="row">
          <div class="col-md-3 col-xs-6 topbar balance-block text-center" style="border-bottom: 2px solid #efb207;">
            <a href="javascript:void(0)" class="btn btn-primary add-money add-withdrawal" data-pd-popup-open="add-money">Add Money</a>
            <a href="javascript:void(0)" class="btn btn-primary add-withdrawal" data-pd-popup-open="withdraw">Withdrawal Money</a>
          </div>
          <div class="col-md-3 col-xs-6 topbar balance-block text-center" style="border-bottom: 2px solid #f30e0e;">
            <a href="challenge.php" class="btn btn-danger add-withdrawal play-ludo">Play Ludo</a>
          </div>
        </div>
      </div>
    </section>
    <section class="dashboard-sections">
      <div class="container">
        <div class="account-summary">
          <h1>Challenge Details</h1>
        </div>
        <div class="row bar-row">
          <div class="col-md-3 col-xs-6 topbar challenge-details-topbar balance-block text-center" style="border-bottom: 2px solid #64b161;">
            <a href="transaction.php" style="text-decoration:none;">
              <div class="challenge-details-block">
                <h1>Txn. History</h1>
                <p>Withdrawal/Add Money</p>
              </div>
            </a>
            <a href="recently-played.php" style="text-decoration:none;">
              <div class="challenge-details-block">
                <h1>Total Matches</h1>
                <p>0</p>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-xs-6 topbar challenge-details-topbar balance-block text-center" style="border-bottom: 2px solid #efb207;">
            <a href="totalwin.php" style="text-decoration:none;">
              <div class="challenge-details-block">
                <h1>Total Win</h1>
                <p>0</p>
              </div>
            </a>
            <a href="total-loss.php" style="text-decoration:none;">
              <div class="challenge-details-block">
                <h1>Total Loss</h1>
                <p>0</p>
              </div>
			</a>
          </div>
          <div class="col-md-3 col-xs-6 topbar challenge-details-topbar balance-block text-center" style="border-bottom: 2px solid #f30e0e;">
            <a href="pending-matches.php" style="text-decoration:none;">
              <div class="challenge-details-block">
                <h1>Pending Matches</h1>
                <p>0</p>
              </div>
            </a>
            <a href="playing-matches.php" style="text-decoration:none;">
              <div class="challenge-details-block">
                <h1>Playing Matches</h1>
                <p>0</p>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-xs-6 topbar challenge-details-topbar balance-block text-center" style="border-bottom: 2px solid #337ab7;">
            <a href="cancelled-matches.php" style="text-decoration:none;">
              <div class="challenge-details-block">
                <h1>Cancel Matches</h1>
                <p>0</p>
              </div>
            </a>
              <div class="challenge-details-block">
                <h1>Share</h1>
                <p>Share With Friends</p>
              </div>
            
          </div>
        </div>
      </div>
    </section>

    <!-- withdraw money start-->
<div class="popup" data-pd-popup="withdraw" id="withdraw-modal">
    <div class="popup-inner">
        <div class="bet-details">
            <h1>
                Withdraw Money
            </h1>
            <div class="alert alert-danger" id="error-msg" style="text-align:left; color:red;display:none;"></div>
            <!--<p class="oppenent">Oppenent Whatsapp Number <span id="oppenent-mobile"></span></p>-->
            <!--<p style="font-size:17px;">Click here to message your oppenent</p>-->
        </div>
          <form method="POST" action="withdraw-request" id="withDraw">
			  <input type="hidden" name="_token" value="JLDOT906Dihv5Fe4Qk4EJDqYPL6QBqihdKZASGPW">            <div class="form-group">
                <label>Select Wallet</label>
                <select class="form-control" name="withdraw_in" id="withdraw_in">
                    <option value="">Withdraw In</option>
                    <option value="PAYTM">In Paytm Wallet</option>
                    <option value="PHONEPE">In PhonePe Wallet</option>
                    <option value="GOOGLEPAY">In Google Pay</option>
                </select>
                <div style="text-align:left; color:red;display:none;" id="withdraw_in-error">Error select</div>
            </div>
            <div class="form-group">
                <label>Enter Paytm/PhonePe/Google Pay Number</label>
                <input type="text" name="wallet_number" id="wallet_number" placeholder="Enter Mobile Number"  class="form-control">
                <div style="text-align:left; color:red;display:none;" id="wallet_number-error">Error phone</div>
            </div>
            <div class="form-group">
                <label>Enter Amount</label>
                <input type="text" name="withdraw_amt" id="withdraw_amt" placeholder="Enter Amount" value="" class="form-control" autocomplete="off">
                <div style="text-align:left; color:red;display:none;" id="withdraw_amt-error">Error select</div>
            </div>
                <input type="submit" value="Request Now" class="btn btn-primary form-control">
          </form>
        <a class="popup-close" data-pd-popup-close="withdraw" href="#"> </a>
    </div>
</div>
<!-- withdraw money end-->


<!-- add money start-->
<div class="popup" data-pd-popup="add-money">
    <div class="popup-inner">
        <div class="bet-details">
            <h1>
                Add Money
            </h1>
            <div class="alert alert-danger" id="errorMsg" style="display:none;"></div>
                        <div class="alert alert-success" id="successMsg" style="display:none;"></div>
           
        </div>
          <form class="needs-validation form-inline" method="POST" action="payment" id="add-money">
			  <input type="hidden" name="_token" value="JLDOT906Dihv5Fe4Qk4EJDqYPL6QBqihdKZASGPW">            <div class="">
                <input type="text" name="amount" placeholder="Enter Amount" id="add_money" value="" class="form-control" autocomplete="off">                    
                
                <input type="submit" value="Add Now" name="submit_btn" class="btn btn-primary form-control">
                <div style="color:red;display:none;" id="add_money-error">Error select</div>
                  
                
            </div>
          </form>
        <a class="popup-close" data-pd-popup-close="add-money" href="#"> </a>
    </div>
</div>
<!-- add money end-->

<script >
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


//withdraw
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

        // $.ajax({
        //     type: "POST",
        //     dataType: 'json',
        //     url: 'dashboard/withdraw-request',
        //     data: $form.serialize(),
        //     beforeSend: function () {
        //         $('.loading').show();
        //     },
        //     success: function (data) {
        //         if (data.success) {
        //             $('#error-msg').text('');
        //             $('#error-msg').hide();
        //             $('#withdraw-modal').hide();
        //             swal(data.success);
        //             $('#withDraw')[0].reset();
        //             $("#withDraw").trigger("reset");
        //         } else {
        //             $('#error-msg').text(data.error);
        //             $('#error-msg').show();
        //         }
        //         if (data.wallet_amount) {
        //             $('#wallet_amount').text(data.wallet_amount);
        //         }
        //     },
        //     complete: function (data) {
        //         $('.loading').hide();
        //         $('#withDraw')[0].reset();
        //         $("#withDraw").trigger("reset");
        //     }

        // });
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


//add money

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

        // $.ajax({
        //     type: "POST",
        //     dataType: 'json',
        //     url: 'dashboard/change-unique-id',
        //     data: $form.serialize(),
        //     success: function (data) {
        //         if (data.message) {
        //             swal(data.message);
        //         }
        //     }

        // });
    }

});

});
</script>

<?php include 'common/footer.php'; ?>
  </div>
</body>
