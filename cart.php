<html>
    <title>Your Cart</title>
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
            margin-left:800px;
            background-color: rgb(250, 107, 116);
            color: black;
        }
        .nav-bar
        {
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
        .cart-content
        {
            background-color: white;
            padding: 20px;  
        }
        .product
        {
            background-color: white;
            border: 2px solid grey;
            box-shadow: 10px 10px 5px lightgrey;
            width:520px;
            padding:10px;
            display: inline-block;
            margin:0px 40px 30px 40px;
            font-size: 17px;
            position: relative;
        }
        .product-image
        {
            display:inline-block;
            padding-right:40px;
        }
        .product-details{
            display:inline-block;
            padding-right:40px;
        }
        .delete_button
        {
            position: absolute;
            right:10px;
            top:5px;
            display: block;
            width: 40%;
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
        .delete_button:hover
        {
            border: 2px solid white;;
        }
        .div6
        {
            height:2px;
            background-color:lightgray;
        }
        .total_amount{
            font-size: 25px;
            font-weight: 700;
            color: rgb(161, 48, 54);
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
        {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .right img{
            height: 450px;
            width: fit-content;
            margin-left: 10px;
            margin-top: 100px;
        }
        .address-details{
            font-size: 15px;
            color: black;
            display: block;
            width: 100%;
            box-sizing: border-box;
            border-radius: 10px;
            border: 3px solid rgb(161, 48, 54);
            padding: 40px; 
        }
        #i{
            display: block;
            width: 100%;
            box-sizing: border-box;
            border-radius: 8px;
            border: 1px solid lightgrey;
            padding: 8px;
            font-size: 15px;
            margin-bottom: 5px;
            margin-top: 5px;
        }
        #r{
            margin-bottom: 5px;
            margin-left: 7px;
            font-size: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 15px;
        }
        #place_order{
            display: block;
            width: 40%;
            background: rgb(161, 48,54);
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
        function client_view_product()
        {
            window.location="client_view_product.php";
        }
        function logout()
        {
            window.location="client_login.php";
        }
    </script>
    <body>
        <div class="nav-bar">
            <input type="button" id="b1" onclick="history.back()" value="VIEW PRODUCT">
            <input type="button" id="b1" value="YOUR CART">
            <input type="button" id="b2" onclick="logout()" value="LOGOUT">
        </div>

        <div class="title">
            <center>YOUR CART</center>
        </div>
        <div class="cart-content">
        <?php
            include_once '../Acmegrade_internship_project/config.php';

            $phoneno=$_GET['phoneno'];
            $sql="select * from orders where phoneno='$phoneno'";
            $data=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($data);
            $total_amount=0;

            if($total!=0)
            {
                while($orders=mysqli_fetch_assoc($data))
                {
                    $product_id=$orders['product_id'];
                    $sql1="select * from products where product_id='$product_id'";
                    $data1=mysqli_query($conn,$sql1);
                    $total1=mysqli_num_rows($data1);
                    if($total1!=0)
                    {
                        while($products=mysqli_fetch_assoc($data1))
                        {


                            echo "<div class='product'>
                                    <div class='product-image'>
                                        <img src='".$products['image']."' width='160px'>
                                </div>
                            <div class='product-details'>
                            Product ID: ".$products['product_id']."<br>
                            Product Name: ".$products['product_name']."<br>
                            Price: ".$products['product_price']."<br>
                            <form action='' method='post'>
                                <div ><button class='delete_button' name='delete_product' value=".$orders['item_no'].">Delete from Cart</button>
                                </div></div>
                            </div>
                            </form>";
                            $total_amount=$total_amount+$products['product_price'];
                            $product_name=$products['product_name'];
                            $product_price=$products['product_price'];
                            if(isset($_POST['place_order']))
                            {
                                $house_no=$_POST['house_no'];
                                $street_name=$_POST['street_name'];   
                                $landmark = $_POST['landmark'];
                                $pincode=$_POST['pincode'];
                                $city=$_POST['city'];
                                $state=$_POST['state'];
                                $country=$_POST['country'];
                                $payment=$_POST['payment'];
                                if($house_no=="" || $street_name=="" || $landmark=="" || $pincode=="" || $city=="" || $state=="" || $country=="" || $payment=="")
                                {
                                    echo '<script>alert("Please enter all the details")</script>';
                                }           
                                else
                                {
                                    $sql="insert into confirm_order(phoneno,product_id,product_name,product_price,house_no,street_name,landmark,pincode,city,state,country,payment)values('$phoneno','$product_id','$product_name','$product_price','$house_no','$street_name','$landmark','$pincode','$city','$state','$country','$payment')";
                                    if($conn->query($sql)==true)
                                    {
                                        echo '<script>alert("Order confirmed")</script>';
                                        $sql3="delete from orders where phoneno=$phoneno";
                                        if ($conn->query($sql3)==true)
                                        {

                                        }
                                    }
                                    else
                                    {
                                        echo '<script>alert("Unable to place order")</script>';
                                    }
                                }
                            }
                        }
                    }
                }
                
                }
                    if(isset($_POST['delete_product']))
                    {
                        $delete_product=$_POST['delete_product'];
                        
                        $sql2="delete from orders where phoneno='$phoneno' and item_no='$delete_product'";
                        if($conn->query($sql2)==true)
                        {
                            echo '<script>alert("Product deleted successful")</script>';
                        }
                        else
                        {
                            echo '<script>alert("Product not deleted")</script>';
                        }
                    }
            ?>
        
        <?php
            echo "<div class='div6'></div><br><div class='total_amount'>Total Amount : ₹".$total_amount;"</div>"
            ?>
            <div class="split-screen">
                <div class="left">
            <br><br><form class='address-details' action='' method='post'>

                <label for="house_no">House No./Apartment Name - Flat No.</label>
                <input id="i" placeholder="House No./Apartment Name - Flat No." name="house_no">

                <label for="street_name">Street Name</label>
                <input id="i" placeholder="Street Name" name="street_name">

                <label for="landmark">Landmark</label>
                <input id="i" placeholder="Landmark" name="landmark">

                <label for="pincode">Pincode</label>
                <input id="i" placeholder="Pincode" name="pincode">

                <label for="city">City</label>
                <input id="i" placeholder="City" name="city">

                <label for="state">State</label>
                <input id="i" placeholder="State" name="state">

                <label for="country">Country</label>
                <input id="i" placeholder="Country" name="country">

                <label for="payment">Choose payment method</label>
                <input id="r" type="radio" name="payment" value="Google pay">Google pay
                <input id="r" type="radio" name="payment" value="Net Banking">Net Banking
                <input id="r" type="radio" name="payment" value="Cash on delivery">Cash on delivery
                <button id="place_order" name="place_order">Place Order</button> </form>
                </div>
                <div class="right">
                    <img src="free_ship.jpg">
                </div>
            </div>
    </body>
</html>