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
            body{
            brown background-color:lightskybluegrey;
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
    <div style="margin-right:05%;align-items: right ; direction: rtl;max-height:400px;overflow-y: scroll;overflow-x: hidden;">
        <?php 
            if(isset($_POST['add'])){      
                $id=$_POST['add'];      
                $username=$_SESSION['name'];
                $p=(int)$_POST['price'];
                $name=$_POST['name'];
                $amount=(int)$_POST['amountt'];
                $price=$amount*$p;
                $cond="SELECT subject.amount as a from subject,delivery_info where subject.name=delivery_info.subname;";
                $res = $con->query($cond);
                
                $res->num_rows ;
                 // output data of each row
                $roww = $res->fetch_assoc();
                if($roww['a']> $amount){
                    $del=$con->prepare("INSERT INTO delivery_info(username,subname,cost,amount)values('$username','$name','$price','$amount') ");
                    if($del->execute()) {
                    $up=$con->prepare("
                        update subject,delivery_info
                        set subject.amount=subject.amount-'{$amount}' where subject.name=delivery_info.subname and subject.name='{$name}'; ");
                    $up->execute(); 
                        echo "<h3 style='text-align:center;margin-right:0%;color:red;'> مرحبا بك ❤</h3>  ";
                        echo "<h2 style='text-align:center;margin-right:0%;color:black; '>"  .$_SESSION['name']. "</h2>" ;
                        echo " <h3 style='text-align:center;margin-right:0%;color:;'> يمكنك رؤية المنتجات التي اضفتها الى عربة التسوق خاصتك  </h3>";
                    }    
                }else{
                    echo "<h3 style='text-align:center;margin-right:0%;color:red;'>المواد الموجودة لا تكفي  </h3>  ";
                    echo "<h2 style='text-align:center;margin-right:0%;color:black; '>"  .$_SESSION['name']. "</h2>" ;
                    echo " <h3 style='text-align:center;margin-right:0%;color:;'> اعد المحاولة لاحقا   </h3>";
                }
            }
            $sql ="SELECT subject.id as id,subject.name as name,amount,price,unit.name as uname from subject,unit where unit.id=subject.unitid;";
            $result = $con->query($sql);
            
            if($result->num_rows >0){
            echo"<table border=4 stylbrown 
            background-color: #bdbee58f;
            color: #0d0d0d;
        max-height:200px;overflow-y: scroll;overflow-x: hidden;'>
            <tr>
            <th align='center' style='display:none;'>ID</th>
            <th align='center'> اسم المادة </th>
            <th align='center'>  الكمية</th>
            <th align='center'>   الواحدة</th>
             <th align='center'>  السعر </th>
             <th align='center' colspan=3>  ادخل الكمية </th>
           </tr>
           
           ";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo"
            <form action='' method='post' id='form'>
            <tr>
            <td align='center' ><input style='color:brown;background-color:lightskyblue'  name='name' value='".$row["name"]."'></lable></td>
            <td align='center' ><input style='color:brown;background-color:lightskyblue' name='price'   value='".$row["amount"]."'></lable></td>
            <td align='center' ><input style='color:brown;background-color:lightskyblue' name='uname'   value='".$row["uname"]."'></lable></td>
            <td align='center' ><input style='color:brown;background-color:lightskyblue' name='price'   value='".$row["price"]."'></lable></td>
            <td align='center' ><input type='number' min='0'  style='color:brown;background-color:lightskyblue' name='amountt'   ></td>
            <td align='center' >
            <button type='submit' name='add' value='".$row['id']."' style='width:100%;'   class='btn btn-danger'>اضافة  </button>
             </td>
             </tr>
             </form>
             ";
            }
            echo"</table>";
            }else{
            echo"<h4 style='text-align:center;margin-right:2%;'> لا يوجد مواد متوفرة في المتجر</h4>";
            }
            
            $con->close();
            
         ?> 
     </div>
    
        <a href="userpage.php"><input type="button" value="عودة للقائمة الرئيسية" class="btn btn-warning" style='margin: 9% 2% -14% 60%'></a>
        <a href="showshopcart.php"><input type="button" value=" عرض المواد الموجودة بالعربة  " class="btn btn-primary" style='margin:9.5% 1% 0% 28%;'></a>
 
    </body>
</html>

