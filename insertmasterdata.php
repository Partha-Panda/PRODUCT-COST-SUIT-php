<?php
$postdata=file_get_contents("php://input",true);
$con=new mysqli("localhost","root","","engineeringproject");
if(!empty($postdata)){
    $request=json_decode($postdata);
    
    $sqlA="SELECT * from masterdata order by SI desc limit 1";
    $stmtA=$con->prepare($sqlA);
    $stmtA->execute();
    $resultA=$stmtA->get_result();
    $rowA=$resultA->fetch_assoc();
    $lastid=$rowA['SI'];
    if($lastid==" "){
        $metalcode="M00001";
    }
    else{
        $metalcode="M0000". ($lastid+1);
    }
    $stmtA->close();
    $metal=$request->metal;
    $category=$request->category;
    $grade=$request->grade;
    $length=$request->length;
    $Dia1=$request->Dia1;
    $Dia2=$request->Dia2;
    $Width1=$request->Width1;
    $Width2=$request->Width2;
    $Thick=$request->Thick;
    $volume=$request->volume;
    $density=$request->density;
    $weight=$request->weight;
    $UOM="cm";

    $sql="INSERT INTO masterdata (Metalcode,Metal, Category, Grade, Length, LengthUOM, Dia1,Dia1UOM, Dia2, Dia2UOM, Width1, Width1UOM, Width2, Width2UOM, Thick, ThickUOM, Volume, Density, Weight ) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";
    $stmt=$con->prepare($sql);
                         
    $stmt->bind_param("ssssisisisisisisddd",$metalcode,$metal,$category,$grade,$length,$UOM,$Dia1,$UOM,$Dia2,$UOM,$Width1,$UOM,$Width2,$UOM,$Thick,$UOM,$volume,$density,$weight);
    
    
    if($stmt->execute()){
        echo "success";
        http_response_code(201);
    }
    else{
        http_response_code(422);
    }
}
?>