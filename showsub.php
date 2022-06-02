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
            عرض المواد
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
                background: url(img/22.jpg) ;
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
                $del=$con->prepare("DELETE FROM subject WHERE id='{$conn}'");
                if( $del->execute()){
                    echo "";
                }    
            }
            $sql ="SELECT subject.id as id,subject.name as a,class.name as b,unit.name as c,amount,price,note from subject,class,unit where subject.unitid=unit.id and subject.classid=class.id";
            $result = $con->query($sql);
            
            if($result->num_rows >0){
            echo"<table border=4 style='margin:0% 20% 0% 35%;
            background-color: #bdbee58f;
            color: #0d0d0d;
        max-height:200px;overflow: auto;'><tr><th style='display:none;'>ID</th><th>اسم المادة</th>
             <th style='padding-left:30px;'>اسم الصنف</th> <th> اسم الوحدة </th><th>  الكمية</th><th>  السعر</th><th> ملاحظات </th><th colspan=3>  </th> </tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo"<tr><td>".$row["a"]."</td><td style='padding-left:30px;'>".$row["b"]."</td><td >".$row["c"]."</td>
            <td >".$row["amount"]."</td><td >".$row["price"]."</td><td >".$row["note"]."</td><td colspan=3>
            <form action='' method='post' id='form'>
                <button type='submit' name='remove' value='".$row['id']."' style='width:100%;'  class='btn btn-primary'>حذف </button>
            </form>
             </td></tr>";
            }
            echo"</table>";
            }else{
            echo"<h4 style='text-align:center;margin-right:-240px;'>لا يوجد مواد🤷‍♂️🤷‍♂️</h4>";
            } 
            $con->close();
            
            ?> 
        </div>
    
        <a href="adminpage.php"><input type="button" value="عودة للقائمة الرئيسية" class="btn btn-success" style='margin: 9% 2% -14% 60%'></a>
        <a href="addsub.php"><input type="button" value="اضافة مادة جديدة" class="btn btn-warning" style='margin:9.5% 1% 0% 28%;'></a>
 
    </body>
</html>