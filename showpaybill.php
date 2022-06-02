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
            عرض فواتير الشراء
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
    <div style="margin-right: 29%;align-items: right ; direction: rtl;max-height:200px;overflow: auto;">
        <?php 
            if(isset($_POST['remove'])){
                $conn=$_POST['remove'];
                $del=$con->prepare("DELETE FROM baybill WHERE id='{$conn}'");
                if( $del->execute()){
                    echo "";
                }    
            }
            $sql ="SELECT * from baybill";
            $result = $con->query($sql);
            
            if($result->num_rows >0){
            echo"<table border=4 style=' 
            background-color: #bdbee58f;
            color: #0d0d0d;
        '>
            <tr><th style='display:none;'>ID</th><th>سعر الفاتورة </th>
             <th style='padding-left:30px;'> الشركة</th>
              <th colspan=3> التاريخ</th><th>رقم الفاتورة</th><th>  المبلغ المدفوع</th>
              <th>  المبلغ المتبقي</th>
              <th> رقم الهاتف </th><th colspan=3>  </th> </tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo"<tr><td>".$row["billcost"]."</td>
            <td style='padding-left:30px;'>".$row["company"]."</td>
            <td colspan=3>".$row["dt"]."</td>
            <td >".$row["num"]."</td>
            <td >".$row["paidprice"]."</td>
            <td >".$row["remainingprice"]."</td>
            <td >".$row["phone"]."</td><td colspan=3>
            <form action='' method='post' id='form'>
                <button type='submit' name='remove' value='".$row['id']."' style='width:100%;'  class='btn btn-danger'>حذف  </button>
            </form>
             </td></tr>";
            }
            echo"</table>";
            }else{
            echo"<h4 style='text-align:center;margin-right:-240px;'>لا يوجد فواتير شراء🤷‍♂️🤷‍♂️</h4>";
            }
            $con->close();
            
            ?> 
        </div>
    
        <a href="adminpage.php"><input type="button" value="عودة للقائمة الرئيسية" class="btn btn-warning" style='margin: 9% 2% -14% 60%'></a>
        <a href="addpaybill.php"><input type="button" value="اضافة فاتورة شراء جديدة" class="btn btn-primary" style='margin:9.5% 1% 0% 28%;'></a>
 
    </body>
</html>