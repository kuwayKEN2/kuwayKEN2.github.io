<?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "bicycle_shopdb");  
 ?> 
  
 <!DOCTYPE html>  
 <html lang="en">  
    <head>  
        <link rel="icon" href="../Bicycle_Shop/products/saddle/vike1.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tay Bicycle Repair Shop</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <!-- .css -->
        <link rel="stylesheet" type="text/css" href="swiper.min.css">
        <link rel="stylesheet" type="text/css" href="main.css">
        <!-- Font Awesome cdn -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head> 

    <body>
        <div id="header" class="swiper-container">
            <div class="swiper-wrapper">
                <?php  
                    $query = "SELECT * FROM products WHERE prdct_id='bike' ORDER BY id ASC";  
                    $result = mysqli_query($connect, $query);  
                    while($row = mysqli_fetch_array($result)):
                ?>
                <div class="swiper-slide">
                    <div class="imageBox"><img src="<?php echo $row['prdct_image']; ?>"/></div>
                    <div class="details">
                        <h1><?php echo $row['prdct_name']; ?></h1>
                        <div class="category"><p><?php echo $row["prdct_description"]; ?></p></div>
                        <div class="price">&#x20B1 <?php echo $row['prdct_price']; ?></div>
                        <br />
                        <input type="button" name="add_to_cart" id="<?php echo $row["id"]; ?>" class="btn btn-warning active form-control add_to_cart" value="Add to Cart" />
                    </div>
                </div>
                <?php
                    endwhile; 
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- NAVBAR -->
        <div id="navbar">
            <div class="logo">
                <span><i class="fas fa-bicycle"></i> Tay Bicycle Repair Shop</span>
            </div>
            <ul>
                <li><a href="#header" class="navHover"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#content" class="navHover"><i class="fas fa-th-large"></i> OUR PRODUCTS</a></li>
                <li><a href="#footer" class="navHover"><i class="fas fa-phone"></i> Contact us </a></li>
                <li class="ph_num">+639-053-222-851</li>
            </ul>
        </div>

        <!-- CONTENT -->
        <div id="content">
            <br />  
            <div class="container" style="width:950px;">  
            	<h1 align="center">Featured Products</h1><br />  
            	<ul class="nav nav-tabs">  
                	<li class="active"><a data-toggle="tab" href="#products">Product</a></li>  
                	<li><a data-toggle="tab" href="#my_cart">Cart <span class="badge"><?php if(isset($_SESSION["shopping_cart"])) { echo count($_SESSION["shopping_cart"]); } else { echo '0';}?></span></a></li>  
            	</ul>  
                <div class="tab-content">  
                    <div id="products" class="tab-pane fade in active">  
                        <?php  
                        $query = "SELECT * FROM products ORDER BY id ASC";  
                        $result = mysqli_query($connect, $query);  
                        while($row = mysqli_fetch_array($result))  
                        {  
                        ?>  
                         <div class="col-md-4" style="margin-top:12px;">  
                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:none; padding:16px; height:430px;" align="center">  
                            <img src="<?php echo $row["prdct_image"]; ?>" class="img-responsive" style="width:100%; height:200px;" /><br />  
                            <h4 class="text-info"><?php echo $row["prdct_name"]; ?></h4>
                            <h6 class="text-secondary"><?php echo $row["prdct_description"]; ?></h6>
                            <h4 class="text-danger" style="font-weight:bold;">&#x20B1 <?php echo $row["prdct_price"]; ?></h4>  
                                <input type="number" name="quantity" id="quantity<?php echo $row["id"]; ?>" class="form-control" value="1" min="1" max="<?php echo $row["prdct_stock"]; ?>" /> 
                            <input type="hidden" name="hidden_name" id="name<?php echo $row["id"]; ?>" value="<?php echo $row["prdct_name"]; ?>" />
                            <input type="hidden" name="hidden_price" id="price<?php echo $row["id"]; ?>" value="<?php echo $row["prdct_price"]; ?>" />  
                            <input type="button" name="add_to_cart" id="<?php echo $row["id"]; ?>" style="margin-top:5px;" class="btn btn-warning active form-control add_to_cart" value="Add to Cart" />  
                        </div>  
                    </div>  
                        <?php  
                        }  
                        ?>  
                    </div>  

                    <div id="my_cart" class="tab-pane fade">  
                        <div class="table-responsive" id="order_table">  
                            <table class="table table-bordered">  
                                <tr>  
                                    <th width="40%">Product Name</th>  
                                    <th width="10%">Quantity</th>  
                                    <th width="20%">Price</th>  
                                    <th width="15%">Total</th>  
                                    <th width="5%">Action</th>  
                                </tr>  
                                <?php  
                                if(!empty($_SESSION["shopping_cart"]))  
                                {  
                                    $total = 0;  
                                    foreach($_SESSION["shopping_cart"] as $keys => $values)  
                                    {                                               
                                ?>  
                                    <tr>  
                                        <td><?php echo $values["product_name"]; ?></td>  
                                        <td><input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control quantity" /></td>  
                                        <td align="right">$ <?php echo $values["product_price"]; ?></td>  
                                             <td align="right">$ <?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></td>  
                                        <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["product_id"]; ?>">Remove</button></td>  
                                    </tr>  
                                    <?php  
                                        $total = $total + ($values["product_quantity"] * $values["product_price"]);  
                                    }  
                                    ?>  
                                    <tr>  
                                        <td colspan="3" align="right">Total</td>  
                                        <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                                        <td></td>  
                                    </tr>  
                                    <tr>  
                                        <td colspan="5" align="center">  
                                            <form method="post" action="cart.php">  
                                                <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />  
                                            </form>  
                                        </td>  
                                    </tr>  
                                <?php  
                                }  
                                ?>  
                            </table>  
                        </div>  
                    </div>  
                </div>  
            </div>  
        </div> 

        <div id="service-content">
        </div>

        <div id="footer">
            <div class="footer-content">
                <div class="about_us">
                    <h4>ABOUT US</h4>
                    <p>Tay Bicycle Repair Shop is an online portal for your desired bicycle products, it comes with lots of bike parts and bike accessories. And if you feel like repairing your bike, let us help you. Just drop by in our Shop.</p>
                </div>
                <div class="reach_us">
                    <h4>REACH US</h4>
                    <p></p>
                </div>
            </div>

            <p><iframe width="640" height="390" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="position:absolute; border:none; top:30px; right:20px;"align="right" allowfullscreen src="https://www.google.com/maps/d/embed?mid=1UiQk_Yaq0ZjhxxIUedchSGfdBw3buu8e"></iframe></p> 
        </div>

    <!-- scripts -->
    <script type="text/javascript" src="swiper.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
    </body>  
</html>  

<script>  
	$(document).ready(function(data){  
      	$('.add_to_cart').click(function()
      	{  
           	var product_id = $(this).attr("id");  
           	var product_name = $('#name'+product_id).val();  
           	var product_price = $('#price'+product_id).val();  
           	var product_quantity = $('#quantity'+product_id).val();  
           	var action = "add"; 

           	if(product_quantity > 0)  
           	{  
                $.ajax({  
                    url:"action.php",  
                    method:"POST",  
                    dataType:"json",  
                    data:{  
                        product_id:product_id,   
                        product_name:product_name,   
                        product_price:product_price,   
                        product_quantity:product_quantity,   
                        action:action  
                    },  
                    success:function(data)  
                    {  
                        $('#order_table').html(data.order_table);  
                        $('.badge').text(data.cart_item);  
                        alert("Product has been Added into Cart");  
                    }  
                });  
            }  
            else  
            {  
                alert("Please Enter Number of Quantity")  
            }  
        });  

        $(document).on('click', '.delete', function(){  
            var product_id = $(this).attr("id");  
            var action = "remove";  
            if(confirm("Are you sure you want to remove this product?"))  
            {  
                $.ajax({  
                    url:"action.php",  
                    method:"POST",  
                    dataType:"json",  
                    data:{product_id:product_id, action:action},  
                    success:function(data){  
                        $('#order_table').html(data.order_table);  
                        $('.badge').text(data.cart_item);  
                    }  
                });  
            }  
            else  
            {  
                return false;  
            }  
        });  
        
        $(document).on('keyup', '.quantity', function(){  
            var product_id = $(this).data("product_id");  
            var quantity = $(this).val();  
            var action = "quantity_change";  
            if(quantity != '')  
            {  
                $.ajax({  
                    url :"action.php",  
                    method:"POST",  
                    dataType:"json",  
                    data:{product_id:product_id, quantity:quantity, action:action},  
                    success:function(data){  
                        $('#order_table').html(data.order_table);  
                    }  
                });  
            }  
        });  
    });  
</script>
