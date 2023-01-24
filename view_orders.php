<html>
<title>View Orders</title>
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
        
        .table-space
        {
            background-color: white;
            padding: 20px 20px 20px 20px;         
        }
        .table
        {
		width: 100%;
        box-shadow: 10px 10px 5px lightgrey;
        }
        th,td
        {
            padding:10px 10px 10px 10px;
            font-size:15px;
        }
        th
        {
            background-color: rgb(240, 97, 106);
            color: white;
            font-weight: bold;
        }
        td
        {
            background-color: #FAFAFA;
        
        }
    </style>
    <script>
        function upload_product()
        {
            window.location="upload_product.php";
        }
        function view_product()
        {
            window.location="view_product.php";
        }
        function logout()
        {
            window.location="admin_login.php";
        }
    </script>
    <body>
        <div class="nav-bar">
            <input type="button" id="b1" name="login" onclick="upload_product()" value="UPLOAD PRODUCT">
            <input type="button" id="b1" name="login" onclick="view_product()" value="VIEW PRODUCT">
            <input type="button" id="b1" name="login" value="VIEW ORDERS">
            <input type="button" id="b2" onclick="logout()" value="LOGOUT">
        </div>

        <div class="title">
            <center>ORDERS</center>
        </div>

        <div class="table-space">
        <?php
            include_once '../Acmegrade_internship_project/config.php';
            $sql="select * from confirm_order";
            $data=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($data);
            if($total!=0)
            {
                ?>
                <div class="table"><table>
                <tr>
                <th>Order No.</th>
                <th>Phone No.</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>House No./Apartment Name - Flat No.</th>
                <th>Street Name</th>
                <th>Landmark</th>
                <th>Pincode</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Payment Mode</th>
                </tr>
                <?php
                while($confirm_order=mysqli_fetch_assoc($data))
                {
                    echo "<tr>
                    <td>".$confirm_order['order_no']."</td>
                    <td>".$confirm_order['phoneno']."</td>
                    <td>".$confirm_order['product_id']."</td>
                    <td>".$confirm_order['product_name']."</td>
                    <td>".$confirm_order['product_price']."</td>
                    <td>".$confirm_order['house_no']."</td>
                    <td>".$confirm_order['street_name']."</td>
                    <td>".$confirm_order['landmark']."</td>
                    <td>".$confirm_order['pincode']."</td>
                    <td>".$confirm_order['city']."</td>
                    <td>".$confirm_order['state']."</td>
                    <td>".$confirm_order['country']."</td>
                    <td>".$confirm_order['payment']."</td>
                    </tr>";
                }
            }
            ?>
        </div>
    </body>
</html>