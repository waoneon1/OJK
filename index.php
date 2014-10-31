
<?php include("database.php"); 
    $log = 1;
     session_start();
    //session_destroy();
    //print_r($_SESSION);
    $login = new database ;
    //@$submit = $_POST['submit'];
    if (isset($_POST['submit'])) {
       
        $user = $_POST['un'];
        $pass = $_POST['pw'];
        $log = $login->login($user, $pass);
        print_r($log);
    }


    ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OJK</title>
	<link rel="stylesheet"  href="css/jquery.mobile-1.3.2.css">
	<link rel="stylesheet"  href="css/finance.css">
	<script src="js/jquery.js"></script>
	<script src="js/jquery.mobile-1.3.2.min.js"></script>
	<script src="js/highcharts/highcharts.js"></script>
	<script src="js/highcharts/modules/exporting.js"></script>
</head>
<body>
	<div data-role="page" class="loginform">	
	<div data-role="header" class="header">
    <p><?php //print_r($log); ?></p>
	</div>	
	<div data-role="content">
	<!-- <img src="image/bg.jpg" alt=""> -->
        <?php if (!isset($_SESSION['id'])) { ?>
        <div data-role="controlgroup" id="popupLogin" data-theme="b">
            <form action="index.php" method="post" data-ajax="false">

                <div style="padding:10px 20px;">
                    <h3>SIGN | <span style="color:#CCCCCC;"></span>IN</h3>
                    <label for="un" class="ui-hidden-accessible">Username:</label>
                    <input type="text" name="un" id="un" placeholder="username" data-theme="a">
                    <label for="pw" class="ui-hidden-accessible">Password:</label>
                    <input type="password" name="pw" id="pw" placeholder="* * * * * * *" data-theme="a">
                    <button type="submit" data-theme="d" name="submit" data-icon="check">Sign in</button>
                    <?php if (@$log==0) { ?>
                        <div><strong style="color:#F00;">ERROR !!!</strong>
                        <div style="color:#F00">Username atau Password Salah !</div></div>
                    <?php } ?>

                </div>
            </form>
            <a href="register.php" style="float:right; font-size:11px; margin-right:10px; color:#373737;">register</a>
        </div>
        <?php } ?>
        
        <?php if(isset($_SESSION['id']) && $_SESSION['Level']==1){
           // print_r($_SESSION);
            echo "<script type='text/javascript'>".
            //"alert('value exceed budget limit');".
            "window.location = 'home.php';".
            "</script> ";
        }
        if(isset($_SESSION['id']) && $_SESSION['Level']==0)
        {
            echo "<script type='text/javascript'>".
            //"alert('value exceed budget limit');".
            "window.location = 'admin.php';".
            "</script> ";
        } ?>
		</div>
	<div data-role="footer" data-position="fixed" data-id="mainfoot">
	</div>	
	</div>
</body>
</html>

