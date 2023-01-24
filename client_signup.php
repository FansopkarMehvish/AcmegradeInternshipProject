<html>
<head>
    <title>Client Signup</title>
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
        margin-top: 80px;
        margin-left: 80px;
        height: 530px;
        width: fit-content;
    }

    .right .content {
        color: black;
        text-align: center;

    }

    .right form {
        width: 350px;
        margin-top: 80px;
        background-color: rgb(250, 107, 116);
        padding: 20px 40px 40px 40px;
        border-radius: 10px;
    }

    form #fullname,
    #email,
    #phoneno,
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

    .signup-button {
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

    .login {
        color: rgb(161, 48, 54);
    }
</style>
<script>
    function client_login() {
        window.location = "client_login.php";
    }
</script>
</head>
<body>

    <?php
        include_once '../Acmegrade_internship_project/config.php';
        if(isset($_POST['signup']))
        {
            $fullname=$_POST['fullname'];
            $password=$_POST['password'];   

            $email = $_POST['email'];
                $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
                preg_match($email_pattern, $email, $email_matches);

                $phoneno=$_POST['phoneno'];
                $phoneno_pattern='/^[0-9]{10}+$/';
                preg_match($phoneno_pattern, $phoneno, $phoneno_matches);

                if(!$email_matches || !$phoneno_matches)
                {
                    echo '<script>alert("Please enter valid details")</script>';
                }           
                else
                {
                    $sql="insert into signup(fullname,email,phoneno,password)values('$fullname','$email','$phoneno','$password')";
                    if($conn->query($sql)==true)
                    {
                        echo '<script>alert("Registration successful")</script>';
                    }
                    else
                    {
                        echo '<script>alert("Registration unsuccessful")</script>';
                    }
                }
            }
?>


    <div class="split-screen">
        <div class="left">
            <section class="image">
                <img id="img" src="client_signup_image.jpg" alt="">
            </section>
        </div>
        <div class="right">
            <form action='client_signup.php' method='post'>
                <section class="content">
                    <h2>Sign Up</h2>
                    <div class="login-container">
                        <p>Already have an account? <a href="#" class="login" onclick="client_login()"
                                value="Log in">Login</a></p>
                    </div>
                </section>
                <div class="input-container name">
                    <label for="fullname">Full Name</label>
                    <input id="fullname" name="fullname" required>
                </div>
                <div class="input-container email">
                    <label for="email">Email</label>
                    <input id="email" name="email" required>
                </div>
                <div class="input-container phoneno">
                    <label for="phoneno">Phone No</label>
                    <input id="phoneno" name="phoneno" required>
                </div>
                <div class="input-container password">
                    <label for="password">Password</label>
                    <input id="password" name="password" placeholder="Must be atleast six characters" type="password" required>
                </div>
                <button class="signup-button" type="submit" name="signup">Sign Up</button>
            </form>
        </div>
    </div>
</body>

</html>