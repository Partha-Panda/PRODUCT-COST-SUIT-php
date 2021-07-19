<?php
///$postdata=file_get_contents("php://input",true);
$postdata=$_GET['SI'];
$con=new mysqli("localhost","root","","engineeringproject");
if(!empty($postdata)){


$SI=$postdata;
$arr=[];
$sql="SELECT * FROM masterdata WHERE SI=? ";
$stmt=$con->prepare($sql);
$stmt->bind_param("i",$SI);
$stmt->execute();
$result=$stmt->get_result();
// , Grade, , ,,,, , , , , , ,, , , 
if($result){
   $cr=0;
   while($row=$result->fetch_assoc()){
    $arr[$cr]['SI']=$row['SI'];
    $arr[$cr]['Metalcode']=$row['Metalcode'];
    $arr[$cr]['Metal']=$row['Metal'];
    $arr[$cr]['Category']=$row['Category'];
    $arr[$cr]['Grade']=$row['Grade'];
    $arr[$cr]['Length']=$row['Length'];
    $arr[$cr]['LengthUOM']=$row['LengthUOM'];
    $arr[$cr]['Dia1']=$row['Dia1'];
    $arr[$cr]['Dia1UOM']=$row['Dia1UOM'];
    $arr[$cr]['Dia2']=$row['Dia2'];
    $arr[$cr]['Dia2UOM']=$row['Dia2UOM'];
    $arr[$cr]['Width1']=$row['Width1'];
    $arr[$cr]['Width1UOM']=$row['Width1UOM'];
    $arr[$cr]['Width2']=$row['Width2'];
    $arr[$cr]['Width2UOM']=$row['Width2UOM'];
    $arr[$cr]['Thick']=$row['Thick'];
    $arr[$cr]['ThickUOM']=$row['ThickUOM'];
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

}
?>