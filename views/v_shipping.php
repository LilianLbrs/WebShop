<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'menu.php'); ?>

<div class="checkout">
    <div>
        <p>&#128293Strong demand! Complete your order before it's too late!</p>
        <div class="timer">
            <p>Your cart is reserved for 10:00 minutes.</p>
        </div>

        <div class="address">
            <h1>1.Shipping address</h1>
            <form action="index.php?page=payment" method="POST">
                <input name="email" id="email" type="text" placeholder="Email">
                <input name="firstname" id="firstname" type="text" placeholder="First Name">
                <input name="lastname" id="lastname" type="text" placeholder="Last Name">
                <input name="address" id="address" type="text" placeholder="Address">
                <input name="zipcode" id="zipcode" type="text" placeholder="Zip Code">
                <input name="city" id="city" type="text" placeholder="City">
                <input name="country" id="country" type="text" placeholder="Country">
            </form>
        </div>

        <div class="delivery">
            <h1>2. Delivery methods</h1>
            <div>
                <input type="radio" id="delivery" name="delivery" checked>
                <label for="devlivery">Free shipping</label>
            </div>

        </div>
    </div>


    <div>
        <h2>Order Summary</h2>
        <h1>Payment methods</h1>

    </div>
</div>