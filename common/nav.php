<header>
  <nav class="navbar navbar-default">
    <div class="container navbar-container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="index.php">
          <h3 class="logo">RE<br> GAME</h3>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav main-nav pull-right">
          <li class="active main-nav-li"><a href="index.php">HOME</a></li>
          <!--<li class="active main-nav-li"><a href="">HOME</a></li>-->
          <li class="active main-nav-li"><a href="about-us.php">ABOUT</a></li>
          <li class="active main-nav-li"><a href="how-to-play.php">HOW TO PLAY?</a></li>
          <li class="active main-nav-li"><a href="referral.php">REFERRAL</a></li>
          <!-- <li class="active whatsapp-link-nav">
                <a href="https://wa.me/916376854302?text=How+To+Play,Please+Guide+Me" target="_blank"><img src="front/images/whatsapp.png" class="whatsapp-icon"
                    style="width: 18%; margin-top: -5px;"><span class="whatsup-number">+91-6376854302</span>
                </a>
              </li> -->
          <?php
                session_start();

                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                     ?>
          <li class="active login-btn-nav">
            <div class="play-login">

              <a href="login.php" class="btn btn-primary btn-login">LOGIN</a>
            </div>
          </li>
          <?php
                } else {
                  ?>
          <li class="active login-btn-nav">
            <div class="play-login">
              <a href=" dashboard.php" class="btn btn-primary btn-login dashboard-btn">DASHBOARD</a>

              <a href=" logout.php" class="btn btn-primary btn-login">LOGOUT</a>
            </div>
          </li>
          <?php
                }
                ?>


        </ul>
      </div>
    </div>
  </nav>
</header>