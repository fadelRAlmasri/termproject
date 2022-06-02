<?php
    session_start();
    include("connection.php");
    include("functions.php");

   if($_SERVER['REQUEST_METHOD']== "POST")
   {
        $user_name =$_POST['name'];
        $user_email =$_POST['email'];
        $pass=$_POST['password'];
        $password= base64_encode($pass);
        
        if(!empty($user_name) && !empty($password)&& !empty($user_email) /*&& !is_numeric($user_name)*/)
        {
            $query="select * from users where name= '$user_name' limit 1";
            $result= mysqli_query($con , $query );
            
            if($result)
            {
                $rows=  mysqli_num_rows($result);  
                             
                if($result && $rows > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    
                   
                   if($user_data['password'] === $password && $user_data['email'] ===$user_email)
                   {
                     $_SESSION['id'] = $user_data['id'];
                     if($_SESSION['id']==52){
                        header("location: adminpage.php");
                        die;
                    }
                    else{
                        header("location: userpage.php");
                        die;
                    }
                   }
        
                }
                
            }
            echo "<script>
                        alert('يوجد خطأ في كلمة المرور او اسم المستخدم او البريد الالكتروني  يرجى التأكد من المعلومات المدخلة ومن ثم اعادة المحاولة');
                    </script>";
                    
        }
   }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>تسجيل الدخول 
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
    <body>
        
    <header class="im">
        <article>

        </article>
    </header>
    <div class="container-fluad item">
        <div class="row">
            <div class="col-lg-12  col-sm-12 col-md-12 ">
                <form action="" method="post" id="form" >
                    <div class="card" style="width: 18rem; background-color:silver">
                            <img src="img/11.jfif" class="card-img-top" alt="...">
                        <div class="card-body" style="direction: rtl;">
                            <h5 class="card-title" >تسجيل الدخول</h5>
                            <p class="card-text"><input type="text" name="name" id=""required placeholder="اسم المستخدم"  style="width: 100%; "></p>
                            <p class="card-text"><input type="email" name="email" id=""required placeholder="البريد الالكتروني "  style="width: 100%; "></p>
                            <p class="card-text"><input type="password" name="password" id=""required placeholder="كلمة السر "  style="width: 100%; "></p>
                            <input type="submit" value="تسجيل" id="send" name="send" class="btn btn-primary"></a>
                            <a href="signup.php">رجوع</a><br>
                             <label style="margin-right:25%;">الا تملك حساب؟؟</label><br>
                            <a href="signup.php" style="margin-right:29%;">انشاء حساب</a>
                        </div>
                        </div>
                </form>
            </div>
        </div>
    </div>  
     </body>
</html>