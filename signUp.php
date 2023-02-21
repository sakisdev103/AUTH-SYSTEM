<?php
    include("./dbconnect.php");
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $checkUserName = mysqli_query($conn, "SELECT *FROM users where username = '$username' ");
        if(mysqli_num_rows($checkUserName) > 0){
            echo
                "<script>
                    alert('Username already exists');
                    window.location.href='./index.html';
                </script>";  
            
        }else{
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $result = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");

                echo
                "<script>
                    alert('Record entered successfully');
                    window.location.href='./index.html';
                </script>";  
            }
                
        }
        

        $conn -> close();
    }

?>