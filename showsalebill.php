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
            عرض فواتير البيع
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
    <div style="margin-right: 19%;align-items: right ; direction: rtl;max-height:200px;overflow: auto;">
        <?php 
            if(isset($_POST['remove'])){
                $conn=$_POST['remove'];
                $del=$con->prepare("DELETE FROM salebill WHERE id='{$conn}'");
                if( $del->execute()){
                    echo "";
                }    
            }
            $sql ="SELECT id,num,dt,billcost,paidprice,rmainingprice,note from salebill";
            $result = $con->query($sql);
            
            if($result->num_rows >0){
            echo"<table border=2 style='margin:0% 20% 0% 35%; 
            background-color: #bdbee58f;
            color: #0d0d0d;
        '>
            <tr><th style='display:none;'>ID</th><th>رقم الفاتورة </th>
             <th style='padding-left:30px;'>تاريخ الفاتورة</th>
              <th> المبلغ الكلي </th><th>  المبلغ المدفوع</th><th>  المبلغ المتبقي</th>
              <th> ملاحظات </th><th colspan=3>  </th> </tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo"<tr><td>".$row["num"]."</td>
            <td style='padding-left:30px;'>".$row["dt"]."</td>
            <td >".$row["billcost"]."</td>
            <td >".$row["paidprice"]."</td>
            <td >".$row["rmainingprice"]."</td>
            <td >".$row["note"]."</td><td colspan=3>
            <form action='' method='post' id='form'>
            <button type='submit' name='remove' value='".$row['id']."' style='width:100%;'  class='btn btn-danger'>حذف  </button>
            <button type='submit' name='details' value='".$row['id']."' style='width:100%;'  class='btn btn-primary'> تفاصيل  </button>
            </form>
             </td></tr>";
            }
            echo"</table>";
            }else{
            echo"<h4 style='text-align:center;margin-right:-240px;'>لا يوجد فواتير بيع🤷‍♂️🤷‍♂️</h4>";
            }
            echo "</div>";
            echo "
            <div style='margin-right: 19%;align-items: right ; direction: rtl;max-height:200px;overflow: auto;'>";
            if(isset($_POST['details'])){
                $conn=$_POST['details'];
                $sql ="SELECT 
                salebilldetails.id,billid ,name, salebilldetails.amount as damount,salebilldetails.note as dnote,subject.price as sprice
                 from salebilldetails,subject WHERE salebilldetails.subid=subject.id and  billid='{$conn}' ";
                $result = $con->query($sql);
                
                if($result->num_rows >0){
                echo"<table border=2 style='margin:0% 30% 0% 35%; 
                background-color: #bdbee58f;
                color: #0d0d0d;
            '>
                <tr><th style='display:none;'>ID</th><th> اسم المادة</th>
                 <th style='padding-left:30px;'>  الكمية </th>
                  <th>   السعر   </th>
                  <th> ملاحظات </th><th colspan=3>  </th> </tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo"<tr><td>".$row["name"]."</td>
                <td style='padding-left:30px;'>".$row["damount"]."</td>
                <td >".$row["sprice"]."</td>
                <td >".$row["dnote"]."</td>
                </tr>";
                }
                echo"</table>";
                }
                    
            }
            $con->close();
            
            ?> 
        </div>
    
        <a href="adminpage.php"><input type="button" value="عودة للقائمة الرئيسية" class="btn btn-warning" style='margin: 9% 2% -14% 60%'></a>
        <a href="addsalebill.php"><input type="button" value="اضافة فاتورة بيع جديدة" class="btn btn-primary" style='margin:9.5% 1% 0% 28%;'></a>
 
    </body>
</html>