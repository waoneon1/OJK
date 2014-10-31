<?php
session_start(); 	 	
if (!isset($_SESSION['id'])) {
    echo "<script type='text/javascript'>
            alert('Anda Harus Login Dulu !');
            window.location = 'index.php';
</script> ";
}else{
	// $GLOBALS['idlog'] = $_SESSION['id'];
 //    $GLOBALS['namelog'] = $_SESSION['name'];
 //    $GLOBALS['statuslog'] = $_SESSION['status'];
 //    $GLOBALS['childlog'] = $_SESSION['child'];
 //    $GLOBALS['agelog'] = $_SESSION['age'];

}

?>