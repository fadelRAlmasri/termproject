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
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse text-capitalize">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">متجري الالكتروني</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">الرئيسية</a></li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="caret"></span> المواد</a>
                            <ul class="dropdown-menu">
                                <li><a href="showsub.php" class="a">عرض المحتوى</a></li>
                                <li><a href="addsub.php" class="a">اضافة</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="caret"></span>  تصنيفات المواد</a>
                            <ul class="dropdown-menu">
                                <li><a href="showclass.php" class="a">عرض المحتوى</a></li>
                                <li><a href="addclass.php" class="a">اضافة</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="caret"></span> فواتير البيع</a>
                            <ul class="dropdown-menu">
                                <li><a href="showsalebill.php" class="a">عرض المحتوى</a></li>
                                <li><a href="addsalebill.php" class="a">اضافة</a></li>
                                <li><a href="addsaledetails.php" class="a">اضافة تفاصيل</a></li>
                                <li><a href="calcsale.php" class="a">حساب الفواتير</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="caret"></span> فواتير الشراء</a>
                            <ul class="dropdown-menu">
                                <li><a href="showpaybill.php" class="a">عرض المحتوى</a></li>
                                <li><a href="addpaybill.php" class="a">اضافة</a></li>
                                <li><a href="addpaydetails.php" class="a">اضافة تفاصيل</a></li>
                                <li><a href="calcpay.php" class="a">حساب الفواتير</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="caret"></span> المستخدمين</a>
                            <ul class="dropdown-menu">
                                <li><a href="showuser.php" class="a">عرض المحتوى</a></li>
                                <li><a href="signup.php" class="a"  >اضافة</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="caret"></span> الواحدات</a>
                            <ul class="dropdown-menu">
                                <li><a href="showunit.php" class="a">عرض المحتوى</a></li>
                                <li><a href="addunit.php" class="a">اضافة</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="caret"></span> مصاريف عامة</a>
                            <ul class="dropdown-menu">
                                <li><a href="original.php" class="a">عرض المحتوى</a></li>
                                <li><a href="addoriginal.php" class="a">اضافة</a></li>
                                <li><a href="calcoriginal.php" class="a">حساب الفواتير</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="cotainer">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="img/21.jpg" alt="" style="    width: 100%;
                                                                        height: 90vh;
                                                                        margin-top: -20px;">
                </div>
            </div>
        </div>
        
    </body>
</html>