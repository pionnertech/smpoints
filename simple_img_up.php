<?php 

$file = $_FILES["upfile"]["tmp_name"];

if(is_file($file)){
	
	echo "recibido";
} else {
	echo "no recibido";

}
?>