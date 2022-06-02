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
                 عربة التسوق خاصتي    
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
            $del=$con->prepare("DELETE FROM delivery_info WHERE id='{$conn}'");
            if( $del->execute()){
                echo "";
            }    
        }
            $sql ="SELECT * from delivery_info where username='{$_SESSION['name']}'";
            $result = $con->query($sql);
            
            if($result->num_rows >0){
            echo"<table border=4 style='margin:0% 22% 0% 35%;
            background-color: #bdbee58f;
            color: #0d0d0d;
        '>
            <tr>
                <th style='display:none;'>ID</th>
                <th style='padding-left:30px;'>اسم المادة</th>
                <th > الكمية </th>
                <th > السعر </th>
                <th >  </th>
             </tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo"
            <tr>
                <td>".$row["subname"]."</td>
                <td >".$row["amount"]."</td>
                <td >".$row["cost"]."</td>
                <td><form action='' method='post' id='form'>
                <button type='submit' name='remove' value='".$row['id']."' style='width:100%;'  class='btn btn-primary'> حذف  </button>
                </form></td>
             </tr>";
            }
            echo"</table>";
            }else{
            echo"<h3 style='text-align:center;margin-right:-35%;'>لا يوجد مواد تم شراؤها</h3>";
            } 
            $con->close();
            
            ?> 
        </div>
    <?php
    echo "<h3 style='text-align:center;margin-right:0%;color:red;'> ❤مرحبا بك </h3>  ";
    echo "<h2 style='text-align:center;margin-right:0%;color:black; '>"  .$_SESSION['name']. "</h2>" ;
    echo " <h3 style='text-align:center;margin-right:0%;color:;'> يمكنك اضافة المنتجات   الى عربة التسوق خاصتك  </h3>";
    ?>
        <a href="userpage.php"><input type="button" value="عودة للقائمة الرئيسية" class="btn btn-success" style='margin: 9% 2% -14% 60%'></a>
        <a href="sale.php"><input type="button" value=" اضافة مواد الى العربة  " class="btn btn-success" style='margin:9.5% 1% 0% 28%;'></a>
 
    </body>
</html>