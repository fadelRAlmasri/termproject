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
        عرض الواحدات
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
                background: url(img/4.jpg) ;
                background-repeat: no-repeat ;
                background-size: cover;
                margin-top: 50px;
                
            }
            
        </style>
       </head>
    <body >
        <article></article>
    <div style="margin-right: 25%;align-items: right ; direction: rtl;max-height:200px;overflow: auto;">
        <?php
            /*if(isset($_POST['remove'])){
                //var_dump($_POST);
                $conn=$_POST['remove'];
                $del=$con->prepare("SELECT name,unitid,amount,price,note FROM subject  WHERE id='{$conn}'");
                if( $del->execute()){
                    echo "";
                }    
            }*/
            $sql ="SELECT id,name  from unit ";
            $result = $con->query($sql);
            
            if($result->num_rows >0){
            echo"<table border=4 style='    margin: 1% 35% 0% 35%; 
            background-color: #bdbee58f;
            color: #0d0d0d;
        max-height:100px;overflow: auto;'><tr><th style='display:none;'>ID</th><th>اسم الصنف</th> </tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo"<tr><td style='padding-left:30px;'>".$row["name"]."</td>
            </tr>";
            }
            echo"</table>";
            }else{
            echo"<h4 style='text-align:center;margin-right:-240px;'>لا يوجد واحدات🤷‍♂️🤷‍♂️</h4>";
            } 
            $con->close();
            
            ?> 
        </div>
    
        <a href="adminpage.php"><input type="button" value="عودة للقائمة الرئيسية" class="btn btn-danger" style='margin: 9% 2% -14% 60%'></a>
        <a href="addunit.php"><input type="button" value="اضافة واحدة جديد" class="btn btn-primary" style='margin:9.5% 1% 0% 28%;'></a>
 
    </body>
</html>