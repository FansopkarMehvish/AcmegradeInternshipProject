<html>
    <title>Client View Product Page</title>
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
        #b1,#b2{
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
            margin-left:800px;
            background-color: rgb(250, 107, 116);
            color: black;
        }
        .nav-bar{
            background-color: white;
            padding: 12px;
            border-bottom: 2px solid rgb(162, 44, 52);
        }
        .title
        {
            padding: 10px 20px 10px 20px;
            align: center;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background: rgb(161, 48, 54);
            color: white;
            font-weight: 700;
        }
        #product_image{
            width: 300px;
        }
        .card{
            display: inline-block;
            width: 300px;
            background-color: white;
            margin: 20px 0px 0px 30px;
            box-shadow: 10px 10px 5px lightgrey;
        }
        .name{
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 3px;
        }
        .price{
            margin-bottom: 3px;
            font-weight: bold;
        }
        .description{
            margin: 0px 3px 3px 3px; 

        }
        .addtocart-button-div{
            margin-bottom: 10px;
        }
        .addtocart-button{
            display: block;
            width: 70%;
            background: rgb(58, 90, 98);
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
        
    </style>
    <script>
        function logout()
        {
            window.location="client_login.php";
        }
    </script>
    <body>
    <form action='' method='post'>
        <div class="nav-bar">
            <input type="button" id="b1" value="VIEW PRODUCT">
            <button id="b1" name="cart">YOUR CART</button>
            <input type="button" id="b2" onclick="logout()" value="LOGOUT">
        </div>
    </form>
        <div class="title">
            <center>PRODUCTS</center>
        </div>

        <div class="product-page">
        <?php

            include_once '../Acmegrade_internship_project/config.php';

            $sql="select * from products";
            $data=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($data);

            if($total!=0)
            {
                while($products=mysqli_fetch_assoc($data))
                {

                    //Extract Product fields
                    $image = $products['image'];
                    $product_id = $products['product_id'];
                    $product_name = $products['product_name'];
                    $product_price = $products['product_price'];
                    $description = $products['description'];
                    
                    //Render as HTML
                    echo "<div class='card'>
                                <img id='product_image' src='$image'>
                                <center><div class='name'>$product_name</div></center>
                                <p class='description'>$description</p>
                                <center><div class='price'>Rs $product_price/-</div></center>
                                <form action='' method='post'>
                                    <div class='addtocart-button-div'>
                                        <center><button class='addtocart-button' name='add_to_cart' value='$product_id'>Add to cart</button></center>
                                    </div>
                                </form>
                            </div>";
                }
            }
            $phoneno=$_GET['phoneno'];
            if(isset($_POST['add_to_cart']))
            {
                $add_to_cart=$_POST['add_to_cart'];
                
                $sql1="insert into orders(phoneno,product_id)values('$phoneno','$add_to_cart')";
                if($conn->query($sql1)==true)
                {
                    echo '<script>alert("Product added successfully")</script>';
                }
                else
                {
                    echo '<script>alert("Error")</script>';
                }
            }
            if(isset($_POST['cart']))
            {
                
                    echo "<script>window.location='cart.php? phoneno=$phoneno'</script>";
                
            }
            ?>
        </div>
    </body>
</html>