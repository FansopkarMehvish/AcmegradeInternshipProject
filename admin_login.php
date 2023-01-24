<html>
    <head>
        <title>Admin Login</title>
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
        width: 350px;
        margin-top: 160px;
        margin-left: 120px;
        background-color: rgb(250, 107, 116);
        padding: 40px 60px 60px 60px;
        border-radius: 10px;
    }
    #img {
        margin-top: 30px;
        margin-left: 10px;
        height: 560px;
        width: fit-content;
    }
    h2{
        font-weight: 700; 
    }
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
        font-size: 16px;
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
        margin-top: 2px;
    }
    </style>
    <script>
        function upload_product()
        {
            $password=document.getElementById('password').value;
            if($password=="Admin@123")
            {
                window.location="upload_product.php";
            }
            else
            {
                alert("Invalid password");
            }
        }
    </script>
    <body>
        <div class="split-screen">
            <div class="left">
                <section class="image">
                <img id="img" src="login_image1.jpg" alt="">
                </section>
            </div>
            <div class="right">
                    <center><h2> Admin Log In</h2><center>
                <div class="input-container password">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" required>
                </div><br>
                <div>
                <button class="login-button" type="submit" name="login" onclick="upload_product()">Login</button>
                </div>
            </div>
        
        </div>
    </body>
</html>