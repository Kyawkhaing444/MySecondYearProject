<?php
$Name = "Kyaw";
$Phone = "777";
$Email = "example@gmail.com";
$Gender = "Male";
$Trader = "Gem";
$Address = "Mogok";
$Connection = mysqli_connect("localhost","root","","G&C_Record");
$Query="INSERT INTO `user_record`(`User_Id`, `Name`, `Phone Number`, `Email`, `Gender`, `Trader`, `Address`) VALUES ('','$Name','$Phone','$Email','$Gender','$Trader','$Address')";
$Execute = mysqli_query($Connection,$Query);
if($Execute){
	echo '<div id="center"><span class="success">Record Has been Added</span> </div>';
}
else{
	echo '<span class="FieldInfoHeading">Please Atleast add Name and Social Security Number</span>';
}
// Check connection

// mysqli_connect_error(); for showing error message if something went wrong

// mysqli_connect_errno(); for showing error number if we have any error

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
mysqli_close($Connection); // Function for closing connection at the end of the page/work when you are done

 ?>