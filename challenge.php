<?php include 'common/header.php'; ?>
<?php include 'common/connect.php'; ?>
<div class="main">

	<?php include 'common/nav.php'; ?>
	<?php

	 $_username = $_SESSION['username'];
	 $query = "SELECT * FROM `users_tbl` WHERE username = '{$_username}'";
	 $data = mysqli_query($conn , $query);

		 while($row = mysqli_fetch_assoc($data)){
		   
		   $user_id = $row['id'];
		   $wallet_bal = $row['wallet_bal'];
		   
		 }

	

?>

	<section class="challenge-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center create-challenge-block">
					<h1>Create Challenge</h1>
					<form action="" id="create-challenge" method="POST">
						<div class="input-group">
							<input type="text" class="form-control amount-input" id="challenge-amount"
								placeholder="Enter Amount" name="amount">

							<div class="input-group-btn">
								<button class="btn btn-default challenge-create-btn" type="submit"><i
										class="fa fa-plus-circle" aria-hidden="true"></i> Set Challenge</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-12 text-center">
					<div style="display:none; color:red;" id="challenge-amount-error">Enter amount</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container challenge-list" id="challenge-div">

			<?php 
				
				  $query = "SELECT * FROM `set_challenge` WHERE user_id = $user_id";
				  $data = mysqli_query($conn , $query);
				  $num_rows = mysqli_num_rows($data);
				  
				  if (!$data) {  
					die("Failed".mysqli_error($conn));
						}
			  
					   while($row = mysqli_fetch_assoc($data)){
						 
						 $user_name = $row['user_name'];
						 $amount = $row['amount'];
				

						if($num_rows >= 1){
						  ?>
						  	<div class="row challenge-row text-center">
				<div class='col-md-8 col-xs-8'>
					<h1><span><?php echo $user_name; ?></span> set challenge of Point <?php echo $amount; ?></h1>
				</div>
				<div class="col-md-4 col-xs-4">
					<a href="javascript:void(0)" ch-id="101590"
						class="btn btn-primary play-btn accept-other-challenge">Play</a>
					<form action="" type="POST" id="accept-other-challenge-101590">
						<input type="hidden" name="_token" value="JLDOT906Dihv5Fe4Qk4EJDqYPL6QBqihdKZASGPW"> <input
							type="hidden" name="ch_id" value="101590">
						<input type="hidden" name="c_id" value="1132">
						<input type="hidden" name="o_id" value="">
						<input type="hidden" name="amount" value="30">
					</form>
				</div>

			</div>
						  <?php
						}
	  
					}
					
				
				?>
		

			<div class="row challenge-row text-center">
				<div class="col-md-8 col-xs-8">
					<h1><span>KiNgShAb</span> VS <span>Rkv</span> for Point 550</h1>
				</div>
				<div class="col-md-4 col-xs-4">
					<a href="javascript:void(0)" class="btn btn-primary play-btn" disabled="">Playing</a>
				</div>
			</div>
		</div>


		<div class="popup popupresut" data-pd-popup="submitResultPopupNew" style="display:none">
			<div class="popup-inner">
				<div class="bet-details">
					<h1>
						<span id="res-c-username"></span> vs <span id="res-o-username"></span> for Point <span
							id="res-ch-amount"></span>
					</h1>
				</div>

				<form class="form-inline" method="POST" id="chk-room-id-new" action="../dashboard/chk-room-id">
					<input type="hidden" name="ch_id" value="" id="val-ch-id">
					<input type="hidden" name="_token" value="" id="val-token">
					<input type="hidden" name="c_id" value="" id="val-c-id">
					<input type="hidden" name="o_id" value="" id="val-o-id">
					<input type="hidden" name="amount" value="" id="val-amount">
					<input type="hidden" name="r_id_status" value="" id="val-r_id_status">
					<div class="form-group" style="margin-top:15px;">
						<div class="error"></div>
						<div class="success"></div>
						<input type="text" class="form-control " name="room_id" id="res-room-id" autocomplete="off"
							value="" readonly="">
						<button type="submit" class="btn btn-primary" id="res-room-id-submit" disabled="">Room
							ID</button>
						<div style="display:none;color:red;text-align:left;" id="room_id-error">Error</div>
					</div>

				</form>
				<div class="form-group " style="margin-top:15px;" id="change-room-id">
					<button type="submit" class="btn btn-danger allow-roomid-new" ch-id="" value="CHANGE"
						style="margin-right:20px">Change Room ID</button>
				</div><br><br>
				<p class="bet-terms">Point 50 penalty charge if you update wrong and if you have won the game please
					post fair result for immediate balance transfer otherwise both player balance will be on hold and
					admin will have to take action and if do not update resolve within 20 minute of the match result
					will be on hold and you will be charged penalty.</p>
				<div class="result-submit">
					<form id="resultSubmitRadioBtn" class="resultRadioBtn" method="POST" enctype="multipart/form-data">

						<input type="hidden" name="ch_id" value="" id="res-ch-id">
						<input type="hidden" name="_token" value="" id="res-token">
						<input type="hidden" name="c_id" value="" id="res-c-id">
						<input type="hidden" name="o_id" value="" id="res-o-id">
						<input type="hidden" name="amount" value="" id="res-amount">
						<label class="radio-inline">
							<input type="radio" name="result" value="WON" id="result-won-res" class="result-won">I Won
						</label>
						<label class="radio-inline">
							<input type="radio" name="result" value="LOSS" id="result-loss-res" class="result-loss">I
							Loss
						</label>
						<label class="radio-inline">
							<input type="radio" name="result" value="CANCEL" id="result-cancel-res"
								class="result-cancel">Cancel Match
						</label><br>
						<div style="display:none; color:red" id="result-submit-error-res"></div>
						<div style="display:none;" id="upload-image-res">
							<div class="form-group result-input-group">
								<input type="file" name="result_img" id="result_img-res">
								<div style="display:none; color:red" id="result-error-res"></div>
							</div>
							<div class="form-group result-input-group">

							</div>
							<div class="form-group result-input-group">

							</div><br>
						</div>

						<div class="form-group result-input-group" style="display:none" id="cancel-text-res">
							<textarea name="cancel_reason" id="cancel_reason-res" class="form-control cancel-textarea"
								placeholder="Cancel Reason"></textarea>
							<div style="display:none; color:red" id="result-error-reason-res"></div>
						</div>
						<div class="form-group result-input-group" style="display:none" id="result-submit-btn-res">
							<button type="submit" class="btn btn-danger">Submit</button>
						</div>
					</form>
				</div>
				<a class="popup-close" data-pd-popup-close="submitResultPopupNew" href="#"> </a>
			</div>
		</div>


	</section>


	<?php include 'common/footer.php'; ?>
</div>
<div class="swal-overlay" tabindex="-1">
	<div class="swal-modal" role="dialog" aria-modal="true">
		<div class="swal-text" style="">Your balance is low. Please add money.</div>
		<div class="swal-footer">
			<div class="swal-button-container">

				<button class="swal-button swal-button--confirm">OK</button>

				<div class="swal-button__loader">
					<div></div>
					<div></div>
					<div></div>
				</div>

			</div>
		</div>
	</div>
</div>
<script>

	$('#challenge-amount').keyup(function (e) {
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


	});

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

		var wallet_bal = '<?php echo $wallet_bal; ?>';

		if(wallet_bal < 30){
			swal("Sorry your account balance is low!", "Please add money in order to play.");
			flag = 0;
		}


		if (flag) {


			var username = '<?php echo $_username; ?>';
			var userid = '<?php echo $user_id; ?>';
			var amount = $('#challenge-amount').val();
			var is_set = true;

			$.ajax({
				method: "POST",
				url: 'create-challenge.php',
				data: {
					username: username,
					userid: userid,
					amount: amount,
					is_set: is_set
				},
				success: function (data) {
					window.location.reload(true);
				},
				error: function (err) {
					console.log(err)
				}

			});
		}

	});


</script>