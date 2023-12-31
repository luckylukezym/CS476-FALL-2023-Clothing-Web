<?php
  session_start();
  $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Check to pay</title>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="css/index-style.css">
    <link rel="stylesheet" href="css/pay-style.css">

    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Stylish">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<header>
    <nav>
        <ul class="nav">
            <li><div class="navlogo"><a href="index.php">CLOTHES</a></div></li>
            <li><div class="navlogo">|</div></li>
            <li><a href="customer.php" class="Button">About Me</a></li>
            <li class="navuser"><?php
                   if(isset($_SESSION["username"])){
                      echo "current login as " . $_SESSION["username"];
                   }else{
                    echo "not logged in";
                   }
              ?></li>
        </ul>
    </nav>
</header>

<h1>Your Cart</h1>

<div class="main">

<div class="left"></div>
<main class="main-center">
        <form id="checklist" method="post">
        
            <br><br>

        </form>
    </main>

    <div class="checkpay">
    <form id="payorder" method='POST' action='checkout_button_process.php'>
        <h2>Pay Order</h2>
            
            <label for="cards">Choose a card:</label>
            <select name="payment_method" id="cards" required>
                <option value="Credit">Credit</option>
                <option value="Debit">Debit</option>
                <option value="Charge">Charge</option>
                <option value="Prepaid">Prepaid</option>
            </select>
            <br>
            <input type="text" name='card_number' id="card_number" required placeholder="16 digit card number"><br><br>

            <label for="cname">Name on Card:</label><br>
            <input type="text" id="name" placeholder="Stephen Anderson"><br><br>

            <label for="expDate">Exp date:</label><br>
            <input type="text" id="exp" placeholder="month/year"><br><br>

            <label for="CVV">CVV:</label><br>
            <input type="text" id="cvv" placeholder="000"><br><br><br>
            </div>

            <input type="submit" value="Checkout" class="add-button hidden" id='checkout-button'>
    </form>
    </div>
    <br><br>
    <div class="right"></div>
</div>
<script>
    let content = document.querySelector("#checklist");
    let request = new XMLHttpRequest();
    request.responseType = "text";
    request.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText){
        content.innerHTML = this.responseText;
      }
    }
  };
     
    request.open("POST", "cart_process.php", true);
    request.setRequestHeader("content-type","application/x-www-form-urlencoded");
    request.send();

</script>
<script src="cart.js"></script>
</body>
</html>




