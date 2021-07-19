<?php
$con=new mysqli("localhost","root","","engineeringproject");
$arr=[];
$sql="SELECT * FROM masterdata ";
$stmt=$con->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();
// , Grade, Length, LengthUOM, Dia1,Dia1UOM, Dia2, Dia2UOM, Width1, Width1UOM, Width2, Width2UOM, Thick, ThickUOM, , , 
if($result){
   $cr=0;
   while($row=$result->fetch_assoc()){
    $arr[$cr]['SI']=$row['SI'];
    $arr[$cr]['Metalcode']=$row['Metalcode'];
    $arr[$cr]['Metal']=$row['Metal'];
    $arr[$cr]['Category']=$row['Category'];
    $arr[$cr]['Grade']=$row['Grade'];
    $arr[$cr]['Volume']=$row['Volume'];
    $arr[$cr]['Density']=$row['Density'];
    $arr[$cr]['Weight']=$row['Weight'];
    
    $cr++;
   }
   echo json_encode($arr);
}
else{
    http_response_code(422);
}

?>