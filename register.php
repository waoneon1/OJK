
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OJK</title>
  <link rel="stylesheet"  href="css/jquery.mobile-1.3.2.css">
  <link rel="stylesheet"  href="css/finance.css">
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/jquery.mobile-1.3.2.min.js"></script>
  <script type="text/javascript">
   
</script>
  <?php include("database.php");?>
</head>
<?php 

//$data = new database;

if (isset($_POST['reg'])) {
  $tbl = "user";
  $value = array(  '', 
                    strtolower($_POST['NIP']),  
                    $_POST['Pass'], 
                    $_POST['Nama'],
                    $_POST['Level'],
					$_POST['NIP']
                  );
    
 // $ret = insert($tbl, $values);
  $db_host = "localhost";
  $db_name = "ojk";
  $db_user = "root";
  $db_pass = "";

  $con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
  if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  //inserting---------------------------------
  $i=1;
  foreach ($value as $key => $val) {
    if(count($value)!=$i){
      $values .= "\"".$val."\", ";
    } else {
      $values .= "\"".$val."\" ";
    } 
    $i++;
  }
  $proses = "INSERT INTO $tbl VALUES ($values)";
  //echo $proses."</br>";
  $re = mysqli_query($con,$proses);
  
  //select last id===========================================================
  if($re==true){
    $pross = "SELECT user.id FROM user ORDER BY user.id DESC LIMIT 1";
    $result = mysqli_query($con, $pross);
    $lastid = mysqli_fetch_array($result);

       mysqli_close($con);
      echo "<script type='text/javascript'>".
           "alert('sukses');".
            "window.location = 'index.php';".
            "</script> ";
  }else{
     echo "<script type='text/javascript'>".
           "alert('Failed');".
            //"window.location = 'index.php';".
            "</script> ";
  }
mysqli_close($con);   

      


}


 ?>
<body>
<div data-role="page" >
<div data-role="header" class="header w">
  <h2><span>Form Persetujuan</span></h2>
  <a href="index.php" data-ajax="false" data-role="button" data-theme="d" data-icon="arrow-l" class="ui-icon-alt" data-iconpos="notext">back</a>
</div>

<div data-role="content">
  <form method="post" action="register.php" data-ajax="false"><!-- data-ajax="false" -->
  <ul data-role="listview" data-theme="d">
  <li>
  
    <div data-role="fieldcontain">
        <label for="NIP">NIP</label>
       <td> <input type="text" name="NIP" id="NIP" placeholder="NIP"  data-mini="true" required>
    </div>
    
   
    <div data-role="fieldcontain">
        <label for="Pass">Password</label>
        <input type="password" name="Pass" id="Pass" placeholder="*******" data-mini="true" required>
    </div> 
    
    
    <div data-role="fieldcontain">
        <label for="Nama">Nama</label>
        <input type="text" name="Nama" id="Nama" placeholder="nama lengkap"  data-mini="true" required>
    </div>
   
    <div data-role="fieldcontain">
        <label for="Level" class="select">Status</label>
        <select name="Level" id="Level" data-mini="true" data-inline="true" onChange="show(this.value);">
            <option value="Pengguna">Pengguna</option>
            <option value="Admin">Admin</option>
        </select>
    </div>
   
    <input type="submit" data-icon="check" name="reg" value="register" data-mini="true" data-inline="true" data-theme="a"></td></tr>
  
    </li>
  </ul>
  </form>
</div>

<div data-role="footer" data-position="fixed" data-id="mainfoot">
</div>

</div> 
 
 </body>
 </html>
