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
            المتجر الالكتروني 
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
            ul li a:hover{
                background-image: linear-gradient(to left,pink,brown);
            }
            .a{
                background-image: linear-gradient(to left,black,white);
            }
            footer{
                clear: both;
                width: 100%;
                height: 10vh;
                text-align: center;
                font-size: 16px;
            }
            nav{
                text-align: right !important;
                direction: rtl !important;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse text-capitalize " >
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#"class="navbar-brand">اهلا  وسهلا    بكم  في  المتجر الالكتروني</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#" >الرئيسية</a></li>
                        <li class="dropdown">
                            <a href="#"  data-toggle="dropdown" class="dropdown-toggle"><span class="caret"></span>تصفح</a>
                            <ul class="dropdown-menu">
                                <li><a href="classuser.php" class="a">عرض الاصناف</a></li>
                                <li><a href="sale.php"  class="a">عرض المواد</a></li>
                            </ul>
                        </li>
                        
                        <li > 
                            <a href="showshopcart.php" >عرض عربة التسوق</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="cotainer">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="img/20.jpg" alt="" style="    width: 100%;
                                                                        height: 90vh;
                                                                        margin-top: -20px;">
                </div>
            </div>
        </div>
    </body>
</html>