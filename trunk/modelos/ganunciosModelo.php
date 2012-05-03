<?php session_start();?> 
<?php require_once('./Connections/informeUrb.php'); ?>
<?php 

//Direccion donde se guardara las fotos
$destino="./Espectaculos/";
$destino2="./Espectaculos/";

//aqui se termina de crear las carpetas
$filesize1=$HTTP_POST_FILES['ufile']['size'][0];
//echo " 0: ".$filesize1;

$num = 0;

//a partir de aqui se copia el archivo a subir a la carpeta definida por defecto, si el archivo existe le añade un numero
if($filesize1!=0){
 //numero autoincrementable que se unira al nombre del archivo en caso de estar repetido
$name =basename($HTTP_POST_FILES['ufile']['name'][0]); //obtenemos nombre base del archivo
    $extension = end(explode('.',$name =basename($HTTP_POST_FILES['ufile']['name'][0])));//aqui se obtiene la extension
    $onlyName = substr($name =basename($HTTP_POST_FILES['ufile']['name'][0]),0,strlen(basename($HTTP_POST_FILES['ufile']['name'][0]))-(strlen($extension)+1));//aqui se elimina la extension del archivo
    while(file_exists($destino.$name)){//preguntamos si existe el fichero
        $num++;            //incrementamos la variable
        $name = $onlyName."".$num.".".$extension; //unimos el nombre la variable y la extension
    } 
$path1= $destino.$name;
$path2= $destino2.$name;
copy($HTTP_POST_FILES['ufile']['tmp_name'][0], $path1);//copiamos el archivo a la carpeta especificada en destino
}
// aqui se termina los metodos para copiar archivos


//aqui comienzan las sentencias sql para meter los datos en la bd
 		$insertSQL = sprintf("INSERT INTO infespectaculos (Ruta,NombreEspectaculo,Provincia,Lugar,Fecha,Precio,Genero,Tipo ) VALUES ('$path2', '%s','%s', '%s', '%s', '%s', '%s', '%s')",
                       
                      //$_POST['expediente'],
                      $_POST['espectaculo'],
                      $_POST['provincia'],
                      $_POST['lugar'],
                      $_POST['fecha'],
                      $_POST['precio'],
					  $_POST['genero'],
                      $_POST['tipos']);
                      
 		mysql_select_db($database_informeUrb, $informeUrb);
 		$Result = mysql_query($insertSQL, $informeUrb) or die(mysql_error());

//aqui se termina de meter datos en la bd y luego si la transaccion es correcta volvemos a la pagina menu
 ?>
  <script type="text/javascript"> 
	 
  	window.location="index.php?controlador=administrador"; 

</script> 