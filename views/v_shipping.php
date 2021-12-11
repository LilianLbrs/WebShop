<?php require_once(PATH_VIEWS . 'header.php'); ?>

<div class="container-fluid pt-2">
    <div class="row checkout">
        <div class="col-7">
            <p class="fw-bold mb-2">&#128293Strong demand! Complete your order before it's too late!</p>
            <div class="timer mb-3">
                <p class="fw-bold ">Your cart is reserved for 10:00 minutes.</p>
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

            <div class="delivery">
                <p class="fs-5 fw-bolder mb-2">2. Delivery methods</p>
                <div>
                    <div class="d-flex shadow rounded mb-1 bg-white p-2">
                        <input class="form-check-input me-2" type="radio" name="delivery" id="free" checked>
                        <label for="free">
                            <p>Free shipping</p>
                            <p>Free</p>
                        </label>
                    </div>

                    <div class="d-flex shadow rounded mb-1 bg-white p-2">
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
            <p class="fs-5 fw-bolder">Order Summary</p>

            <div class=" container bg-white rounded-top shadow d-flex flex-column pt-3 pb-3 mb-1">
                <div>
                    <?php
                    foreach ($resultatsItems as $item) {
                    ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="position-relative">
                                    <img class="imageItemCheckout rounded me-2" src="<?= PATH_IMAGES . $item['image'] ?>" alt="">
                                    <span class="position-absolute translate-middle badge rounded-pill bg-dark">
                                        <?= $item['quantity']?>
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
                <div>
                    <div class="d-flex justify-content-between">
                        <p>Subtotal</p>
                        <p><?= $total . "€" ?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Delivery</p>
                        <p>0€</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="fw-bolder">Total</p>
                        <p>50€</p>
                    </div>

                </div>
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
                        <input class="form-check-input me-2 " type="radio" name="flexRadioPayment" id="paypal">
                        <label class="form-check-label" for="paypal">
                            Paypal
                        </label>
                    </div>

                    <img class="imgPayment" src="<?= PATH_IMAGES . "paypal.png" ?>" alt="">

                </div>
                <button type="button" class="btn btn-primary" disabled>Complete Purchase</button>

            </div>

            <p class="fw-bolder mt-4 text-center">🔒 Transaction secured over SSL</p>
        </div>
    </div>
</div>