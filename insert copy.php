<?php

$con=new mysqli("localhost","root","","engineeringproject");

    $sql="SELECT * FROM user WHERE email=?";
    $stmt=$con->prepare($sql);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result=$stmt->get_result();
                
   
    if($result){
       $cr=0;
       while($row=$result->fetch_assoc()){

       }
    }
    else{
        http_response_code(422);
    }




?>