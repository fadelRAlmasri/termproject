<?php
   session_start();
   include("connection.php");
   include("functions.php");
   $str = check_login($con);
   if($_SESSION['id']!=52)
{
	
	header("location: login.php");
	
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            عرض المصاريف العامة
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
           /* article{
                width:100%;
                height:100px;
                background-image: linear-gradient(to left,pink,brown);
            }*/
            body{
                background-color:grey;
                word-spacing: 10px;
                background: url(img/20.jpg) ;
                background-repeat: no-repeat ;
                background-size: cover;
                
                
            }
            
        </style>
       </head>
    <body  >
        <article></article>
        <div style="direction:rtl;align-items: right ;max-height:200px;overflow: auto; ">
        <?php
        if(isset($_POST['remove'])){
            //var_dump($_POST);
            $conn=$_POST['remove'];
            $del=$con->prepare("Delete FROM generalexpense  WHERE id='{$conn}'");
            if( $del->execute()){
                echo "";
            }    
        }
            $sql ="SELECT id,dt,title,price,note from generalexpense ";
            $result = $con->query($sql);
            
            if($result->num_rows >0){
            echo"<table border=4 style='margin:2% 33% 0% 35%; background-color: lightskyblue;text-align: center;'><tr><th style='display:none;'>ID</th>
            <th>التاريخ</th> 
            <th>العنوان</th>
            <th>السعر</th>
            <th>ملاحظات</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo"<tr><td style='padding-left:30px;display:none; '>".$row["id"]."</td><td style='padding-left:30px;'>".$row["dt"]."</td>
            <td style='padding-left:30px;'>".$row["title"]."</td><td style='padding-left:30px;'>".$row["price"]."</td>
            <td style='padding-left:30px;'>".$row["note"]."</td>
            <td colspan=3>
            <form action='' method='post' id='form'><button type='submit' name='remove' value='".$row['id']."' style='width:100%;'  class='btn btn-primary'>حذف  </button></form>
             </td></tr>";
            }
            echo"</table>";
            }else{
            echo"<h2 style='text-align:center;margin-right:0px;color:red'>لا يوجد مصاريف </h2>";
            } 
            $con->close();
            
            ?> 
        </div>
    
        <a href="adminpage.php"><input type="button" value="عودة للقائمة الرئيسية" class="btn btn-danger" style='margin: 9% 2% -14% 60%'></a>
        <a href="addoriginal.php"><input type="button" value="اضافة مصروف جديد" class="btn btn-warning" style='margin:9.5% 1% 0% 28%;'></a>
 
    </body>
</html>