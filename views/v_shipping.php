<?php require_once(PATH_VIEWS . 'header.php'); ?>

<div class="container-fluid pt-2">
    <div class="row checkout">
        <div class="col-7">
            <p class="fw-bold mb-2">&#128293Strong demand! Complete your order before it's too late!</p>
            <div class="timer mb-3 d-flex">
                <p class="fw-bold ">Your cart is reserved for
                <p id="timer" class="ms-1 me-1">10:00</p> minutes.</p>
            </div>



            <div class="address mb-3">
                <p class="fs-5 fw-bolder mb-2">1.Shipping address</p>
                <div class="row form justify-content-center shadow rounded">
                    <div class="row">
                        <input name="email" id="email" type="text" placeholder="Email" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-6 ps-0">
                            <input name="firstname" id="firstname" type="text" placeholder="First Name" class="form-control">
                        </div>

                        <div class="col-6 pe-0">
                            <input name="lastname" id="lastname" type="text" placeholder="Last Name" class="form-control">
                        </div>
                    </div>


                    <div class="row">
                        <input name="address" id="address" type="text" placeholder="Address" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-6 ps-0">
                            <input name="zipcode" id="zipcode" type="text" placeholder="Zip Code" class="form-control">
                        </div>

                        <div class="col-6 pe-0">
                            <input name="city" id="city" type="text" placeholder="City" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <input name="country" id="country" type="text" placeholder="Country" class="form-control">
                    </div>
                </div>
            </div>



            <?php
            if (isset($resultShipping)) {            ?>
                <div class="d-flex shadow rounded bg-white p-3 mb-3">
                    <input class="form-check-input me-2" type="checkbox" id="addressRegistered">

                    <div>
                        <div class="d-flex ">
                            <p class="fw-bold me-1"><?= $resultShipping['firstname'] ?></p>
                            <p class="fw-bold me-1"><?= $resultShipping['lastname'] ?></p>
                        </div>

                        <div class="d-flex">
                            <p class="me-1"><?= $resultShipping['address'] ?></p>
                            <p class="me-1"><?= $resultShipping['city'] ?></p>
                            <p class="me-1"><?= $resultShipping['zipcode'] ?></p>
                            <p><?= $resultShipping['country'] ?></p>
                        </div>
                    </div>

                </div>

            <?php
            } ?>

            <div class="delivery">
                <p class="fs-5 fw-bolder mb-2">2. Delivery methods</p>
                <div>
                    <div class="d-flex shadow rounded mb-2 bg-white p-3">
                        <input class="form-check-input me-2" type="radio" name="delivery" id="free" checked>
                        <label for="free">
                            <p>Free shipping</p>
                            <p>Free</p>
                        </label>
                    </div>

                    <div class="d-flex shadow rounded mb-2 bg-white p-3">
                        <input class="form-check-input me-2" type="radio" name="delivery" id="express">
                        <label for="express">
                            <p>Express shipping</p>
                            <p>5,00€</p>
                        </label>
                    </div>

                </div>

            </div>
        </div>




        <div class="col-5">
            <p class="fs-5 fw-bolder mb-2">Order Summary</p>

            <div class=" container bg-white rounded-top shadow d-flex flex-column pt-3 pb-3 mb-1">
                <div>
                    <?php
                    foreach ($resultatsItems as $item) {
                    ?>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <div class="position-relative">
                                    <img class="imageItemCheckout rounded me-2" src="<?= PATH_IMAGES . $item['image'] ?>" alt="">
                                    <span class="position-absolute translate-middle badge rounded-pill bg-dark">
                                        <?= $item['quantity'] ?>
                                    </span>
                                </div>

                                <p class="fw-bold"><?= $item['name'] ?></p>
                            </div>
                            <div>
                                <p><?= $item['price'] * $item['quantity'] . "€" ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>



                </div>


            </div>
            <div class="container bg-white shadow d-flex flex-column pt-3 pb-3 mb-1">
                <div class="d-flex justify-content-between mb-1 mt-1">
                    <p>Subtotal</p>
                    <div class="d-flex">
                        <p id="subtotal"><?= $total ?></p>
                        <p>€</p>
                    </div>

                </div>
                <div class="d-flex justify-content-between mb-1">
                    <p>Delivery</p>
                    <p id="delivery">0€</p>
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <p class="fw-bolder">Total</p>
                    <p class="fw-bolder" id="total"><?= $total . "€" ?></p>
                </div>
            </div>

            <div class="container bg-white shadow d-flex flex-column pt-3 pb-3 mb-1">
                <div class="row">
                    <div class="col-8 ps-0">
                        <input class="form-control me-2" type="text" id="discount" placeholder="Discount code">
                    </div>
                    <div class="col-2">

                    </div>
                    <div class="col-2 pe-0 ">
                        <button type="button" class="btn btn-secondary" disabled>Apply</button>

                    </div>
                </div>
            </div>

            <div class="container bg-white rounded-bottom shadow d-flex flex-column pt-3 pb-3 ">
                <p class="fs-5 fw-bolder mb-2">4. Payment methods</p>
                <div class="border rounded p-2 mb-2 justify-content-between d-flex">

                    <div>
                        <input class="form-check-input me-2" type="radio" name="flexRadioPayment" id="creditCard" checked>
                        <label class="form-check-label" for="creditCard">
                            Credit Card
                        </label>
                    </div>
                    <img class="imgPayment" src="<?= PATH_IMAGES . "creditCard.png" ?>" alt="">
                </div>

                <div class="border rounded p-2 mb-2 justify-content-between d-flex">

                    <div>
                        <input class="form-check-input me-2" type="radio" name="flexRadioPayment" id="check" checked>
                        <label class="form-check-label" for="check">
                            Check
                        </label>
                    </div>
                    <img class="imgPayment" src="<?= PATH_IMAGES . "check.png" ?>" alt="">
                </div>

                <div class="border rounded p-2 mb-2 justify-content-between d-flex">
                    <div>
                        <input class="form-check-input me-2 " type="radio" name="flexRadioPayment" id="paypal">
                        <label class="form-check-label" for="paypal">
                            Paypal
                        </label>
                    </div>

                    <img class="imgPayment" src="<?= PATH_IMAGES . "paypal.png" ?>" alt="">

                </div>
                <button type="button" class="btn btn-primary" id="purchase">Complete Purchase</button>

            </div>

            <p class="fw-bolder mt-4 text-center">🔒 Transaction secured over SSL</p>
        </div>
    </div>
</div>

<script>
    let minutes = 10
    let secondes = 0
    const timerElement = document.getElementById("timer")

    function diminuerTemps() {
        if (secondes != 0) secondes--
        else {
            secondes = 59
            minutes--
        }
        timerElement.innerText = minutes + ":" + secondes
    }

    if (minutes != 0)
        setInterval(diminuerTemps, 1000)
</script>

<script>
    var radio1 = document.getElementById('free');
    var radio2 = document.getElementById('express');
    var radiocard = document.getElementById('creditCard');
    var radiopaypal = document.getElementById('paypal');
    var checkAddressRegistered = document.getElementById('addressRegistered');
    var subtotal = document.getElementById("subtotal").innerText;
    var total = document.getElementById("total");
    var delivery = document.getElementById("delivery");
    var numtotal = subtotal;
    var payment = "carte";



    radio1.addEventListener("click", function() {
        numtotal = subtotal;
        total.innerText = numtotal + "€";
        delivery.innerText = "0€";
    });

    radio2.addEventListener("click", function() {
        numtotal = (parseFloat(subtotal) + 5);
        total.innerText = numtotal + "€";
        delivery.innerText = "5€";
    });

    radiocard.addEventListener("click", function() {
        payment = "carte";
    });

    radiopaypal.addEventListener("click", function() {
        payment = "paypal";
    });

    var purchase = document.getElementById('purchase');
    purchase.addEventListener("click", function() {

        var email;
        var firstname;
        var lastname;
        var address;
        var zipcode;
        var city;
        var country;


        if (checkAddressRegistered.checked) {
            email = "<?=$resultShipping['email']?>";
            firstname = "<?=$resultShipping['firstname']?>";
            lastname = "<?=$resultShipping['lastname']?>";
            address = "<?=$resultShipping['address']?>";
            zipcode = "<?=$resultShipping['zipcode']?>";
            city = "<?=$resultShipping['city']?>";
            country = "<?=$resultShipping['country']?>";


        } else {
            email = document.getElementById('email').value;
            firstname = document.getElementById('firstname').value;
            lastname = document.getElementById('lastname').value;
            address = document.getElementById('address').value;
            zipcode = document.getElementById('zipcode').value;
            city = document.getElementById('city').value;
            country = document.getElementById('country').value;
        }




        if (email != "" && firstname != "" && lastname != "" && address != "" && zipcode != "" && city != "" && country != "")
            document.location.href = "index.php?page=thanks&email=" + email + "&firstname=" + firstname + "&lastname=" + lastname + "&address=" + address + "&zipcode=" + zipcode + "&city=" + city + "&country=" + country + "&payment=" + payment + "&total=" + numtotal;
        else window.alert("Please fill all the blank");
    });
</script>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>