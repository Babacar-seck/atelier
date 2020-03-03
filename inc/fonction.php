<?php

 function internauteEstConnecte() {

 	if(!isset($_SESSION["admin"])){
 		return false;
 	}else{
 		return true;
 	}

 }

 

?>