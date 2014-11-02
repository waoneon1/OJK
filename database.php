<?php

class database{

  /**
   * Melakukan koneksi ke database
   *
   * @return connection
   */
    function db_connect() {

        $db_host = "localhost";
        $db_name = "ojk";
        $db_user = "root";
        $db_pass = "";

        $con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
        if (mysqli_connect_errno($con)) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }else{
            return $con;
        }
        mysqli_close($con);
    }

    function insert($tbl, $value){

      $con = $this->db_connect();
      $values="";$i=1;
      foreach ($value as $key => $val) {
        if(count($value)!=$i){
          $values .= "\"".$val."\", ";
        } else {
          $values .= "\"".$val."\" ";
        } 
        $i++;
      }
      $proses = "INSERT INTO $tbl VALUES ($values)";
      //echo $sets."----";
      //echo $proses."</br>";
      $re = mysqli_query($con,$proses);
      return($re);
    }
  
   //============================================================================================================================///
    function login($user, $pass){

      $logs = $this->select_login('*','user',1);
      $trueid = 'no';
      foreach ($logs as $key => $value) {
        if(strtolower($user) == $value['NIP'] && $pass == $value['Pass']){
          $_SESSION['id'] = $value['id'];
          $_SESSION['Nama'] = $value['Nama'];
		      $_SESSION['niplg'] = $value['niplg'];
          $_SESSION['Level'] = $value['Level'];
          //return ($_SESSION);
          /*var_dump($value['Level']);
          exit;*/
          if ($value['Level']==1) {
            echo "<script type='text/javascript'>
                  alert('Anda Berhasil Login !');".
                 "window.location = 'home.php';".
                  "</script> ";
          $trueid = 'yes';
          } else {
              echo "<script type='text/javascript'>
                  alert('Anda Berhasil Login !');".
                 "window.location = 'admin.php';".
                  "</script> ";
          $trueid = 'yes';
          }
          
        }
      }
     
    }

    function select_login($select, $tbl, $where){
      $con = $this->db_connect();
      if (is_array($select)) {
        
      }else{
        $proses ="SELECT $select FROM $tbl WHERE $where";
        $result = mysqli_query($con, $proses);
        //echo $proses;
      }
      while($row1 = mysqli_fetch_array($result)){ 
        $row[] = $row1;
      }
      //$row = mysqli_fetch_array($result);
      return($row);
    }

    function logout(){
      session_start();
      session_destroy();
      echo "<script type='text/javascript'>
              alert('Logout');
              window.location = 'index.php';
            </script> ";
    }

}


//mysqli_close($con);
?>