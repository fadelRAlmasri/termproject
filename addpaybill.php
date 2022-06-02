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
        <title>اضافة فاتورة شراء جديدة 
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
          padding-top: 42px;

      }
      #send{
          margin-left: 13vh;
          
      }
        </style>
    </head>
    <body style="font-family: 'Aref Ruqaa', serif;  background-color: #f1033859;">
        
    <header class="im">
        <article>

        </article>
        </header>
        <div class="container-fluad item">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 ">
                    <form action="" method="post" id="form" >
                        <div class="card" style="width: 18rem; background-color:silver">
                            <img src="img/4.jpg" class="card-img-top" alt="...">
                            <div class="card-body" style="direction: rtl;">
                                <h5 class="card-title" >  اضافة فاتورة شراء جديدة</h5>
                                <p class="card-text"><input type="number" name="num" id=""require placeholder=" رقم الفاتورة"  style="width: 100%; "></p>
                                <p class="card-text"><input type="text" name="company" id=""require placeholder=" الشركة"  style="width: 100%; "></p>
                                <label for="">تاريخ الفاتورة</label>
                                <p class="card-text"><input type="date" name="dt" id=""require placeholder=" التاريخ"  style="width: 100%; "></p>
                                <p class="card-text"><input type="number" name="billcost" id="a"require placeholder="سعر الفاتورة"  style="width: 100%; "></p>
                                <p class="card-text"><input type="number" name="paidprice" id="b"require placeholder="المبلغ المدفوع"  style="width: 100%; "></p>
                                <input type="button" value="حساب المبلغ المتبقي" onclick="res()">
                                <p class="card-text"><input type="text" name="remainingprice" id="c"require placeholder="المبلغ المتبقي"  style="width: 100%; " readonly></p>
                                <p class="card-text"><input type="number" name="phone" id=""require placeholder="رقم الهاتف"  style="width: 100%; "></p>
                                <input type="submit" value="اضافة" id="send" name="send" class="btn btn-success"></a>
                                <a href="adminpage.php">رجوع</a><br>
                                <a href="addpaydetails.php"><input type="button" value="اضافة تفاصيل" class="btn btn-danger"/></a>
                                <script>
                                    function res(){
                                        var x=parseInt(document.getElementById('a').value)-parseInt(document.getElementById('b').value);
                                        document.getElementById('c').value=x;
                                    }
                                </script>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
                
    <?php
if(isset($_POST['send'])){
    $billcost=$_POST['billcost'];
    $company=$_POST['company'];
    $dt=$_POST['dt'];
    $num=$_POST['num'];
    $paidprice=$_POST['paidprice'];
    $remainingprice=$_POST['remainingprice'];
    $phone=$_POST['phone'];
    $sql=$con->prepare("INSERT INTO baybill (billcost	,company,	dt,	num,	paidprice,	remainingprice,	phone	)VALUES 
    ('$billcost','$company','$dt','$num','$paidprice','$remainingprice','$phone') ");
    if($sql->execute()){
        echo "";
    }    
}

?>
    </body>
</html>