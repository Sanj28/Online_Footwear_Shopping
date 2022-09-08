 <?php
session_start();
//echo "Hello";
    require("../db_connection.php");
    $ad_username=$_POST["ad_username"];
    $old_password=$_POST["old_password"];
    $new_password=$_POST["new_password"];
    $con_password=$_POST["con_password"];
    $sql=$conn->prepare("SELECT * FROM admin WHERE ad_username=?");
    $sql->bind_param("s",$ad_username);
    $sql->execute();
    $result=$sql->get_result();
    $count=$result->num_rows;
    if($count==1)
    {
        $row=$result->fetch_assoc();
        if($old_password==base64_decode($row["ad_password"]))
        {
            
        
            if($new_password==$con_password)
            {
                $n_password=base64_encode($new_password);
                $sql=$conn->prepare("UPDATE admin SET ad_password=? WHERE ad_username=?");
                $sql->bind_param("ss",$n_password,$ad_username);
                if($sql->execute())
                {
                echo"<script type='text/javascript'>
                alert('PASSWORD CHANGED SUCCESSFULLY');
                window.location='index.php';
                </script>";        
                }
                else
                {
                echo"<script type='text/javascript'>
                alert('ERROR');
                window.location='index.php';
                </script>";
                }
            }
            else
            {
                echo"<script type='text/javascript'>
                alert('PASSWORD DOES NOT MATCH');
                window.location='index.php';
                </script>";
            }
        }
        else
        {
                echo"<script type='text/javascript'>
                alert('OLD PASSWORD IS INCORRECT');
                window.location='index.php';
                </script>";
        }
    }
    
    else
    {
        echo"<script type='text/javascript'>
        alert('INVALID USERNAME');
        window.location='index.php';
        </script>";
    }
    ?>