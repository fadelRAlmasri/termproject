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
        <title>اضافة مادة جديدة 
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
    <body style="font-family: 'Aref Ruqaa', serif;background-color: #f1033859;">
        
    <header class="im">
        <article>

        </article>
        </header> 
<?php
        $sql = "SELECT * FROM class";
        $result = $con->query($sql);
        $sql = "SELECT * FROM unit";
        $res = $con->query($sql);

?>
        <div class="container-fluad item">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 ">`
                    <form action="" method="post" id="form" >
                        <div class="card" style="width: 18rem; background-color:silver">
                            <img src="img/7.jfif" class="card-img-top" alt="...">
                            <div class="card-body" style="direction: rtl;"> 
                                <h5 class="card-title" >  اضافة مادة جديدة </h5>
                                <p class="card-text"><input type="text" name="name" id=""required placeholder="اسم المادة"  style="width: 100%; "></p>
                                <label for="cars">اختر الصنف</label>
                                <select  id="classes" name='classId'>
                                <?php
                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                    echo "
                                        <option value='".$row['name']."' >".$row['name']."</option>
                                    ";
                                    }}
                                    ?>
                                    </select><br>
                                    <label for="cars">اختر الواحدة  </label>
                                    <select  id="classes" name='unitId'>
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
                                <p class="card-text"><input type="number" name="price" id="" required placeholder="سعر الواحدة"  style="width: 100%; "></p>
                                <p class="card-text"><input type="text" name="note" id="" placeholder="ملاحطة"  style="width: 100%; "></p>
                                <input type="submit" value="اضافة" id="send" name="send" class="btn btn-primary"></a>
                                <a href="adminpage.php">رجوع</a>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
                


    </body>
    <?php
    
    if(isset($_POST['send'])){
      $unitId=$_POST['unitId'];
        $classId=$_POST['classId'];
        $a= "SELECT id from class where name='{$classId}'";
        $b="SELECT id from unit where name='{$unitId}'";
        $r1 = $con->query($a);
        $r2 = $con->query($b);
        $r3 = $r1->fetch_assoc();
        $r4 = $r2->fetch_assoc();
        $name=$_POST['name'];
        $amount=$_POST['amount'];
        $price=$_POST['price'];
        $note=$_POST['note'];
        $sql=$con->prepare("INSERT INTO subject (name,classid,unitid,amount,price,note)VALUES ('$name','".$r3['id']."','".$r4['id']."','$amount','$price','$note') ");
        if($sql->execute()){
        echo "";
        }    
    }
    ?>
                                    
</html>
