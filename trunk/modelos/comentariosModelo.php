<?php require_once('./Connections/informeUrb.php'); ?>
<?php

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    
if($_POST['nick'] == ""){
$nickNuevo = "anonimo";
}else{
$nickNuevo = $_POST['nick'];
}
     $insertSQL= sprintf("INSERT INTO comentarios(Usuario,Comentario) VALUES ('$nickNuevo','%s')",
                       
     				   $_POST['comentarios']);                
    
     mysql_select_db($database_informeUrb, $informeUrb);
 	$Result1 = mysql_query($insertSQL, $informeUrb) or die(mysql_error());
 	 ?>
 	 <script type="text/javascript"> 
	 
  		window.location="index.php"; 

	</script> 
 	<?php
}
?>