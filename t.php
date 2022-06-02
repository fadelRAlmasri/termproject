<?php
   session_start();
   include("connection.php");
   include("functions.php");
   $str = check_login($con);
   /*if($_SESSION['id']==20)
{
	
	header("location: login.php");
	
}*/
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
    <div style="margin-right: 19%;align-items: right ; direction: rtl;max-height:400px;overflow: auto;">
        <?php
            $sql ="SELECT id as idd ,name ,amount,price ,note from 
            subject";
            $result = $con->query($sql);
            
            if($result->num_rows >0){
            echo"<table border=4 style='margin:0% 20% 0% 35%; background-color: lightskyblue;max-height:200px;overflow: auto;'>
            <tr>
            <th align='center' style='display:none;'>ID</th>
            <th align='center'>اسم المادة</th>
             <th align='center'>  الكمية</th>
             <th align='center'>  السعر</th>
             <th align='center'> ملاحظات </th>
             <th align='center'> add </th>
             <th align='center' colspan=3>  </th>
           </tr>
           
           ";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo"<form action='' method='post' id='form'>
            <tr>
            <td align='center' ><input type='text' name='name'    value='".$row["name"]."'></td>
            <td align='center' ><input type='text' name='  '      value='".$row["amount"]."'></td>
            <td align='center' ><input type='text' name='price'   value='".$row["price"]."'></td>
            <td align='center' ><input type='text' name='note'    value='".$row["note"]."'></td>
            
            <td align='center' name=''><input type='number' name='amount'    value='0'></td><td align='center' name=''>
            <button type='submit' name='add' value='".$row['idd']."' style='width:100%;'  class='btn btn-success'>add </button>
            
             </td>
             </tr>
             </form>";
            }
            echo"</table>";
            }else{
            echo"0 results";
            } 
            if(isset($_POST['add'])){                 
                $userid=$_SESSION['name'];
                $p=$_POST['price'];
                $name=$_POST['name'];
                $amount=$_POST['amount'];
                //$price=$amount * $p;
                $del=$con->prepare("INSERT INTO delivery_info (username,subname,cost,amount) values ('$userid','$name','$p','$amount') ");
                if( $del->execute()){
                    echo "";
                }    
            }
            $con->close();
            
            ?> 
        </div>
    
        <a href="userpage.php"><input type="button" value="عودة للقائمة الرئيسية" class="btn btn-success" style='margin: 9% 2% -14% 60%'></a>
 
    </body>
</html>