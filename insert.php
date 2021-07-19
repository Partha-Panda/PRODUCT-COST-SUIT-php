<?php
$postdata=file_get_contents("php://input",true);
$con=new mysqli("localhost","root","","engineeringproject");
if(!empty($postdata)){
    $request=json_decode($postdata);
    $email=$request->email;
    $password=$request->password;
    $sql="SELECT * FROM user WHERE email=?";
    $stmt=$con->prepare($sql);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result=$stmt->get_result();
                
    $row=$result->fetch_assoc();
    if($result){
        if($row['passwors']==$password){
            echo $email;
            http_response_code(201);
        }
        else{
            http_response_code(422);
        }
    }
    else{
        http_response_code(422);
    }
}



?>