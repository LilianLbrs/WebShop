<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'menu.php'); ?>

<form action="index.php?page=payment" method="POST">
    <label for="email"></label>
    <input name="email" id="email" type="text" placeholder="Email">

    <label for="firstname"></label>
    <input name="firstname" id="firstname" type="text" placeholder="First Name">
    <label for="lastname"></label>
    <input name="lastname" id="lastname" type="text" placeholder="Last Name">

    <label for="address"></label>
    <input name="address" id="address" type="text" placeholder="Address">

    <label for="zipcode"></label>
    <input name="zipcode" id="zipcode" type="text" placeholder="Zip Code">
    <label for="city"></label>
    <input name="city" id="city" type="text" placeholder="City">
    <label for="country"></label>
    <input name="country" id="country" type="text" placeholder="Country">

    <input type="submit">
</form>