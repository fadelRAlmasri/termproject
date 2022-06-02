<?php
function check_login($con)
{
    if(isset($_SESSION['id']))
    {
        $id =$_SESSION['id'];
        $query="select * from users where id= '$id' limit 1 ";
        $result= mysqli_query($con , $query ); 
        $rows=  mysqli_num_rows($result);
        if( $result && $rows > 0)
        {
            
            $user_data = mysqli_fetch_assoc($result);
            $_SESSION['name'] = $user_data['name'];
           $str= implode(" ", $user_data);
            
            return $str;
           
        }
    }
    header("location: login.php");
    die;

}

?>