<?php
   session_start();
   include("connection.php");
   include("functions.php");
   $str = check_login($con);
   if($_SESSION['id']==52)
{
	
	header("location: login.php");
	
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            عرض الصنوف
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <style>
            *{
                font-family: cursive;
                
            }
            body{
                background-color:grey;
                word-spacing: 10px;
                background: url(img/6.png);
                background-repeat: no-repeat ;
                background-size: cover;
                margin-top: 50px;
                
                
            }
            
        </style>
       </head>
    <body >
        <article></article>
    <div style="margin-right: 19%;align-items: right ; direction: rtl;max-height:200px;overflow: auto;">
        <?php
            $sql ="SELECT id,name  from class ";
            $result = $conn->query($sql);
            
            if($result->num_rows >0){
            echo"<table border=4 style='margin:0% 30% 1% 36%; background-color: lightskyblue;'><tr><th style='display:none;'>ID</th><th>اسم الصنف</th> </tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo"<tr><td style='padding-left:30px;'>".$row["name"]."</td>
            <td colspan=3>
            <form action='' method='post' id='form'>
            <button type='submit' name='details' value='".$row['id']."' style='width:100%;'  class='btn btn-success'>تفاصيل   </button>
                      </td></tr>";
            }
            echo"</table>";
            }else{
            echo"";
            } 
             
            echo "</div>";
            if(isset($_POST['details'])){
                echo "
                <div style='margin-right: 24%;align-items: right ; direction: rtl;
                max-height:150px;overflow: auto; '>";
                //var_dump($_POST);
                $con=$_POST['details'];
                $sel="SELECT subject.id as id,subject.name as a,class.name as b,unit.name as c,amount,price,note from subject,class,unit 
                where subject.unitid=unit.id and subject.classid=class.id and class.id='{$con}'"; 
                $result = $conn->query($sel);
                if($result->num_rows >0){
                    echo"<table border=2 style='align-items: right ; direction: rtl;margin:0% 20% 0% 35%; background-color: lightskyblue;'>
                    <tr><th style='display:none;'>ID</th><th>اسم المادة</th>
                      <th> اسم الوحدة </th><th>  الكمية</th><th>  السعر</th><th> ملاحظات </th><th colspan=3>  </th> </tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo"<tr><td>".$row["a"]."</td><td >".$row["c"]."</td>
                    <td >".$row["amount"]."</td><td >".$row["price"]."</td><td >".$row["note"]."</td>
                    </tr>";
                    }
                    echo"</table>";
                    }else{
                    echo"";
                    } echo"</div>";
            }
            $conn->close();
            ?> 
        <a href="userpage.php"><input type="button" value="عودة للقائمة الرئيسية" class="btn btn-success" style='margin: 9% 2% -14% 60%'></a>
         
    </body>
</html>