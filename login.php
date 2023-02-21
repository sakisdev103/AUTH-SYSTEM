<?php
    include("./dbconnect.php");

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $checkUserName = mysqli_query($conn, "SELECT * FROM users where username = '$username' and password= '$password' ");
        if(mysqli_num_rows($checkUserName) > 0){
            $checkPassword = mysqli_query($conn, "SELECT password from users where username = '$username'");
            if($checkPassword){
                echo
                    "<script>
                        alert('Successfully loged in');
                        window.location.href='./index.html';
                    </script>";  

            }else{
                echo
                    "<script>
                        alert('Wrong Password');
                        window.location.href='./index.html';
                    </script>";  
            }
            
        }else{
            echo
                "<script>
                    alert('You dont have an account');
                    window.location.href='./signUP.html';
                </script>";  
        }

        $conn -> close();
    }
?>