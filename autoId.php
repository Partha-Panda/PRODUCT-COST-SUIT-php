<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
    $con=new mysqli("localhost","root","","engineeringproject");
    $sqlA="SELECT * from masterdata order by SI desc limit 1";
    $stmtA=$con->prepare($sql);
    $stmtA->execute();
    $resultA=$stmt->get_result();
    $rowA=$result->fetch_assoc();
    $lastid=$row['SI'];
    if($lastid==" "){
        $metalcode="00001";
    }
    else{
        $metalcode="0000". ($lastid+1);
    }
    echo $metalcode;
    ?>
</body>

</html>