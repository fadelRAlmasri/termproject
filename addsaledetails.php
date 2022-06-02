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
        <title>اضافة  تفاصيل فاتورة بيع
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa&display=swap" rel="stylesheet">
    </head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            header{
                background-image: url('img/20.jpg');
                background-position: center center;
                background-size:cover;
                height: 40vh;
      }
      article{
          width: 100%;
          height: 100%;
          background-color: black;
          opacity: 0.5;
      }
      #form{
          padding-left: 40%;
          padding-top: 100px;

      }
      #send{
          margin-left: 13vh;
          
      }
        </style>
    </head>
    </head>
    <body style="   background-color: #f1033859;>
        
    <header class="im">
        <article>

        </article>
    </header>
           <?php

$sql = "SELECT * FROM salebill";
$result = $con->query($sql);
$sql = "SELECT * FROM subject";
$res = $con->query($sql);

?>
    <div class="container-fluad item">
        <div class="row">
            <div class="col-lg-12  col-sm-12 col-md-12 ">
                <form action="" method="post" id="form" >
                    <div class="card" style="width: 18rem; background-color:silver">
                            <img src="img/11.jfif" class="card-img-top" alt="...">
                        <div class="card-body" style="direction: rtl;">
                            <h5 class="card-title" >اضافة  تفاصيل فاتورة شراء</h5>
                                <label for="cars">اختر  رقم الفاتورة </label>
                                <select  id="num" name='num'>
                                <?php
                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                    echo "
                                        <option value='".$row['num']."' >".$row['num']."</option>
                                    ";
                                    }}
                                    ?>
                                    </select><br>
                                    <label for="cars">اختر اسم المادة  </label>
                                    <select  id="name" name='name'>
                                <?php
                                    if ($res->num_rows > 0) {
                                    // output data of each row
                                    while($r = $res->fetch_assoc()) {
                                    echo "
                                        <option value='".$r['name']."'>".$r['name']."</option>
                                    ";
                                    }}
                                    ?>
                                    </select>
                                <p class="card-text"><input type="number" name="amount" id="" required placeholder="الكمية"  style="width: 100%; " ></p>
                                <p class="card-text"><input type="text" name="note" id="" placeholder="ملاحطة"  style="width: 100%; "></p>
                                <input type="submit" value="اضافة" id="send" name="send" class="btn btn-primary"></a>
                            <a href="adminpage.php">رجوع</a>
                        </div>
                        </div>
                </form>
            </div>
        </div>
    </div>     
    <?php
if(isset($_POST['send'])){
      $num=$_POST['num'];
      $name=$_POST['name'];
      $a= "SELECT id from salebill where num='{$num}'";
      $b="SELECT id from subject where name='{$name}'";
      $r1 = $con->query($a);
      $r2 = $con->query($b);
      $r3 = $r1->fetch_assoc();
      $r4 = $r2->fetch_assoc();
      $amount=$_POST['amount'];
      $note=$_POST['note'];
    $sql=$con->prepare("INSERT INTO salebilldetails (billid,	subid,	amount,	note)VALUES ('".$r3['id']."','".$r4['id']."','$amount','$note') ");
    if($sql->execute()){
        echo "";
    }    
}

?>
    </body>
</html>