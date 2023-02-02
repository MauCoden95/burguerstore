<?php 
	session_start(); 
	
	
		

	if(isset($_SESSION['carrito'])){
		$carrito_mio=$_SESSION['carrito'];
		if(isset($_POST['name'])){
			$name=$_POST['name'];
			$price=$_POST['price'];
            $img=$_POST['image'];
            $quantity = 1;
			$num=0;
     		$carrito_mio[]=array("name"=>$name,"price"=>$price,"img"=>$img,"quantity"=>$quantity);
 		}
	}else{
		$name=$_POST['name'];
		$price=$_POST['price'];
        $img=$_POST['image'];
        $quantity = $quantity + 1;
		$carrito_mio[]=array("name"=>$name,"price"=>$price,"img"=>$img,"quantity"=>$quantity);	
	}
	

$_SESSION['carrito']=$carrito_mio;

		



    header("Location: ".$_SERVER['HTTP_REFERER']."");
?>


