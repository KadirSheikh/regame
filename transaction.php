<?php include 'common/header.php'; ?>

<body>
  <div class="main">
  <?php include 'common/nav.php'; ?>
    	<section>
        <div id="exTab1" class="container">
          <ul class="nav nav-pills">
            <li class="active">
              <a href="#1a" data-toggle="tab">Withdrawal History</a>
            </li>
            <li><a href="#2a" data-toggle="tab">Txn. History</a></li>
            <li><a href="#3a" data-toggle="tab">Referral History</a></li>
          </ul>

          <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
              <div class="row">
                <div class="col-md-12 about-content">
                  <h1>Withdrawl History</h1>
                  <table id="example" class="table table-striped table-bordered nowrap" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Request ID</th>
                        <th>Amount</th>
                        <th>Wallet In</th>
                        <th>Mobile No.</th>
                        <th>Status</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
						                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="2a">
              <div class="row">
                <div class="col-md-12 about-content">
                  <h1>Txn. History</h1>
                  <table id="example" class="table table-striped table-bordered nowrap" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Txn. ID</th>
                        <th>Txn. Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
						                    </tbody>
                  </table>
                </div>
              </div>
            </div>
			<div class="tab-pane" id="3a">
              <div class="row">
                <div class="col-md-12 about-content">
                  <h1>Referral History</h1>
                  <table id="example" class="table table-striped table-bordered nowrap" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Challenge ID</th>
                        <th>Txn. ID</th>
                        <th>Point</th>
                        <th>Refer By</th>
                        <th>Date</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
						                    </tbody>
                  </table>
                </div>
              </div>
            </div>
			 
          </div>
        </div>
      </section>
      
      <script src="front/js/core/script.js"></script> 
 <?php include 'common/footer.php'; ?>
  </div>
</body>
