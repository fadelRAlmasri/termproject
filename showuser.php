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
            عرض المستخدمين
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
                background: url(img/22.jpg) ;
                background-repeat: no-repeat ;
                background-size: cover;
                margin-top: 50px;
                
                
                
            }
            
        </style>
       </head>
    <body >
        <article></article>
    <div style="margin-right: 26%;align-items: right ; direction: rtl;text-align:center;max-height:200px;overflow: auto;">
        <?php
            
            if(isset($_POST['remove'])){
                $conn=$_POST['remove'];
                $del=$con->prepare("DELETE FROM users WHERE id='{$conn}'");
                if( $del->execute()){
                    echo "";
                } else {echo "cannot";}   
            }
            $sql ="SELECT * from users";
            $result = $con->query($sql);
            
            if($result->num_rows >0){
            echo"<table border=4 style='margin:0% 20% 0% 35%; 
            background-color: #bdbee58f;
            color: #0d0d0d;
        '>
            <tr><th style='display:none;'>ID</th><th>اسم المستخدم</th>
             <th style='padding-left:30px;'>البريد الالكتروني</th>
              <th colspan=3>  </th> </tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo"<tr><td>".$row["name"]."</td>
            <td >".$row["email"]."</td>
            <form action='' method='post' id='form'><td>
                <button type='submit' name='remove' value='".$row['id']."' style='width:100%;'  class='btn btn-danger'>حذف  </button>
            </form>
             </td></tr>";
            }
            echo"</table>";
            }else{
            echo"<h4 style='text-align:center;margin-right:-240px;'>لا يوجد مستخدمين🤷‍♂️🤷‍♂️</h4>";
            } 
            $con->close();
            
            ?> 
        </div>
    
        <a href="adminpage.php"><input type="button" value="عودة للقائمة الرئيسية" class="btn btn-warning" style='margin: 9% 2% -14% 60%'></a>
        <a href="signup.php"><input type="button" value=" اضافة مستخدم جديد  " class="btn btn-primary" style='margin:9.5% 1% 0% 28%;'></a>
 
    </body>
</html>