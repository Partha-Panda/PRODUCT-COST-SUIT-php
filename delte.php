<?php

$postdata=file_get_contents("php://input",true);
$con=new mysqli("localhost","root","","engineeringproject");
if(!empty($postdata)){
    $request=json_decode($postdata);
    $SI=$request->SI;
    $sql="DELETE FROM masterdata  WHERE SI=?";
    $stmt=$con->prepare($sql);
    $stmt->bind_param("i",$SI);
   
    //$result=$stmt->get_result();
                
    if( $stmt->execute()){
            echo "Sucessfuly deeted";
            http_response_code(200);
    }
    else{
        http_response_code(422);
    }
}



?>