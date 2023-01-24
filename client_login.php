<html>
    <head>
        <title>Client Login</title>
    </head>
    <style>
    body {
        padding: 0;
        margin: 0;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-weight: 500;
    }

    .split-screen {
        display: flex;
        flex-direction: row;
    }

    .left {
        height: 100%;
        width: 50%;
    }

    .right {
        height: 100%;
        width: 50%;
    }

    .left,
    .right {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #img {
        margin-left: 100px;
        height: 650px;
        width: fit-content;
    }

    .right .content {
        color: black;
        text-align: center;

    }

    .right form {
        width: 350px;
        margin-top: 150px;
        background-color: rgb(250, 107, 116);
        padding: 20px 40px 40px 40px;
        border-radius: 10px;
    }

    form #phoneno,
    #password {
        display: block;
        width: 100%;
        box-sizing: border-box;
        border-radius: 8px;
        border: 1px solid lightgrey;
        padding: 10px;
        margin-bottom: 10px;
        font-size: 12px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-size: 15px;
    }

    .login-button {
        display: block;
        width: 100%;
        background: rgb(161, 48, 54);
        color: white;
        font-weight: 700;
        border: none;
        padding: 10px;
        border-radius: 8px;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 15px;
    }

    h2 {
        font-weight: 700;
    }

    .signup {
        color: rgb(161, 48, 54);
    }  
    </style>
    <script>
        function client_signup()
        {
            window.location="client_signup.php";
        }
    </script>
    <body>
    <?php
            include_once '../Acmegrade_internship_project/config.php';
            if(isset($_POST['login']))
            {
                $password=$_POST['password'];

                $phoneno=$_POST['phoneno'];
                $phoneno_pattern='/^[0-9]{10}+$/';
                preg_match($phoneno_pattern, $phoneno, $phoneno_matches);
                
                if(!$phoneno_matches)
                {
                    echo '<script>alert("Please enter valid phone number")</script>';
                }  
                else
                {
                    $sql="select * from signup where phoneno='$phoneno' and password='$password'";
                    $data=mysqli_query($conn,$sql);
                    $total=mysqli_num_rows($data);
                    if($total!=0)
                    {
                        echo "<script>window.location='client_view_product.php? phoneno=$phoneno'</script>";
                    }
                    else
                    {
                        echo '<script>alert("Details not available. Please register")</script>';
                    }
                }
            }
        ?>
        
        <div class="split-screen">

        <div class="left">
            <section class="image">
                <img id="img" src="login_image.jpg" alt="">
            </section>
        </div>
        
        <div class="right">
            <form action='client_login.php' method='post'>
                <section class="content">
                    <h2>Log In</h2>
                    <div class="signup-container">
                        <p>Don't have an account? <a href="#" class="signup" onclick="client_signup()"
                                value="Sign up">Sign up</a></p>
                    </div>
                </section>

                <div class="input-container phoneno">
                    <label for="phoneno">Phone No</label>
                    <input id="phoneno" name="phoneno" required>
                </div>
                <div class="input-container password">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" required>
                </div>
                <button class="login-button" type="submit" name="login">Login</button>
            </form>
        </div>    
    </body>
</html>