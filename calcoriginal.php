<?php
   session_start();
   include("connection.php");
   include("functions.php");
   $str = check_login($con);
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
            حساب المصاريف العامة  
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
    <body style="font-family: 'Aref Ruqaa', serif; ">
        
    <header class="im">
        <article>

        </article>
        </header>
        <div class="container-fluad item">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 ">
                    <form action="" method="post" id="form" >
                        <div class="card" style="width: 18rem; background-color:silver">
                            <img src="img/6.png" class="card-img-top" alt="...">
                            <div class="card-body" style="direction: rtl;">
                                <h5 class="card-title" >    حساب المصاريف العامة </h5>
                                <label for=""> تاريخ الفاتورة الاولى</label><br>
                                <p class="card-text"><input type="date" name="dt1" id=""required   style="width: 100%; "></p>
                                <label for=""> تاريخ الفاتورة الثانية</label>
                                <p class="card-text"><input type="date" name="dt2" id=""required   style="width: 100%; "></p>
                                <input type="submit" value="حساب" id="send" name="send" class="btn btn-primary"></a>
                                <a href="adminpage.php">رجوع</a>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
                
    <?php
if(isset($_POST['send'])){
    $from_date=date( $_POST['dt1']);
    $to_date=date($_POST['dt2']);
    $sql = "SELECT  sum(price)FROM generalexpense WHERE dt between '{$from_date}' and '{$to_date}'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo"<h4 style='text-align:center;margin-right:4%; color:red'>".$row['sum(price)']."مجموع الفواتير هو </h4>";
        }
    }
    
}

?>
    </body>
</html>