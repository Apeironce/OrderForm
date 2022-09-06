<?php

require_once "Settings_DB.php";

if(isset($_POST["newname"]) && isset($_POST["newemail"]) && isset($_POST["newph_number"]) && isset($_POST["newcity"]) && isset($_POST["newaddress"]) && isset($_POST["newamount_water"]))
{
	$name = $_POST["newname"];

	$email = $_POST["newemail"];

	$ph_number = $_POST["newph_number"];

	$city = $_POST["newcity"];

	$address = $_POST["newaddress"];

	$amount_water = $_POST["newamount_water"];

	if($_POST["newagreement"]){
			$agreement = $_POST["newagreement"];
	}

	$tare_quantity = '0';
	if($_POST["newtare_quantity"]){
			$tare_quantity = $_POST["newtare_quantity"];
	}

	if($_POST["newcomment"]){
			$comment = $_POST["newcomment"];
	}

	$stmt=$db->prepare("INSERT INTO Orders_tbl(name,
											 email,
											 ph_number,
											 city,
											 address,
										 	 agreement,
										 	 amount_water,
										 	 tare_quantity,
										 	 comment)
										VALUES
										    (:uname,
											 :uemail,
											 :uph_number,
											 :ucity,
											 :uaddress,
										   :uagreement,
										 	 :uamount_water,
										   :utare_quantity,
										   :ucomment)");


	$stmt->bindParam(":uname",$name);
	$stmt->bindParam(":uemail",$email);
	$stmt->bindParam(":uph_number",$ph_number);
	$stmt->bindParam(":ucity",$city);
	$stmt->bindParam(":uaddress",$address);
	$stmt->bindParam(":uagreement",$agreement);
	$stmt->bindParam(":uamount_water",$amount_water);
	$stmt->bindParam(":utare_quantity",$tare_quantity);
	$stmt->bindParam(":ucomment",$comment);

	if($stmt->execute())
	{
		echo '<div class="alert alert-success">
					Заказ успешно создан
			 </div>';
	}
	else
	{
		echo  '<div class="alert alert-danger">
					Ошибка в создании заказа
			   </div>';
	}
}

?>
