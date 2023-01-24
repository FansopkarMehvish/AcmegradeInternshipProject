<html>
    <title>Upload Product</title>
    <style>
        *
        {
            margin: 0px;
            padding: 0px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        body
        {
            background-color: white;
        }
        #b1,#b2
        {
            padding: 8px 20px 8px 20px;
            background-color: transparent;
            color:rgb(162, 44, 52);
            border:2px solid transparent;
            font-size: 17px;
            font-family: serif;
            border-radius :5px;
            font-weight: bold;
        }
        #b1:hover
        {
            background-color: rgb(162, 44, 52);
            color: white;
            cursor: pointer;
        }
        #b2
        {
            margin-left:600px;
            background-color: rgb(250, 107, 116);
            color: black;
        }
        .nav-bar
        {
            background-color: white;
            padding: 12px;
            border-bottom: 2px solid rgb(162, 44, 52);
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
        margin-top: 40px;
        margin-left: 100px;
        height: 70%;
        width: 70%;
        }
        .title
        {
            background-color: rgb(162, 44, 52);
            color: white;
            padding: 20px 50px 20px 50px;
            border-radius: 10px 10px 0px 0px;
            margin: 35px 0px 0px 90px;
            align: center;
            font-size: 20px;
            font-weight: bold;
            width: 80%;
        }
        .content
        {
            background-color: rgb(250, 107, 116);
            padding: 60px 50px 50px 50px;    
            border-radius: 0px 0px 10px 10px; 
            margin: 0px 0px 0px 90px;
            width: 80%;     
        }
        #product_name, #product_price, #description
        {
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
        #image{
            margin: 10px 0px 10px 0px;
            font-size: 15px;
        }
        #upload-button
        {
            padding: 12px 22px 12px 22px;
            background-color: rgb(162, 44, 52);
            color:white;
            margin-top: 10px;
            border-radius: 5px;
            font-size: 17px;
            font-weight: bold;
            border: 2px solid transparent;
            cursor: pointer;
        }
        .main{
            display: flex;
            flex-direction: column;
        }
    </style>
    <script>
        function view_product()
        {
            window.location="view_product.php";
        }
        function view_orders()
        {
            window.location="view_orders.php";
        }
        function logout()
        {
            window.location="admin_login.php";
        }
    </script>
    <body>
        <?php
            include_once '../Acmegrade_internship_project/config.php';
            if(isset($_POST['upload_product']))
            {
                $product_name=$_POST['product_name'];
                $product_price=$_POST['product_price'];
                $description=$_POST['description'];
                $image=$_POST['image'];
                if($product_name=="" || $product_price=="" || $description=="" || $image=="")
                {
                    echo "<script>alert('Please fill all the details')</script>";
                }
                else
                {
                    $sql="insert into products(product_name,product_price,description,image)values('$product_name','$product_price','$description','$image')";
                    if($conn->query($sql)==true)
                    {
                        echo '<script>alert("Product added successful")</script>';
                    }
                    else
                    {
                        echo '<script>alert("Product not added")</script>';
                    }
                }
            }
        ?>
        <div class="nav-bar">
            <input type="button" id="b1" name="login" value="UPLOAD PRODUCT">
            <input type="button" id="b1" name="login" onclick="view_product()" value="VIEW PRODUCT">
            <input type="button" id="b1" name="login" onclick="view_orders()" value="VIEW ORDERS">
            <input type="button" id="b2" onclick="logout()" value="LOGOUT">
        </div>
        <div class="split-screen">
        <div class="left">
            <section class="photo">
                <img id="img" src="upload_product2.jpg" alt="">
            </section>
        </div>
        <div class="main">
        <div class="title">
            <center>UPLOAD PRODUCT</center>
        </div>
        <form action='upload_product.php' method='post'>
            <div class="content">
                <div class="input-container product_name">
                    <label for="product_name">Product Name</label>
                    <input id="product_name" name="product_name" type="text" required>
                </div>
                <div class="input-container product_price">
                    <label for="product_price">Product Price</label>
                    <input id="product_price" name="product_price" required>
                </div>
                <div class="input-container description">
                    <label for="description">Description</label>
                    <Textarea id="description" name="description" required></Textarea>
                </div>
                <div class="input-container image">
                    <label for="image">Add Product Image</label>
                    <input id="image" name="image" type="file" accept=".jpg" required>
                </div>
                
                <center><button id="upload-button" name="upload_product">Upload Product</button></center>
            </div>
        </form>
        </div>
        </div>
    </body>
</html>