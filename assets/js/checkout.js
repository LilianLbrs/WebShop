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

var radio1 = document.getElementById('free');
var radio2 = document.getElementById('express');
var radiocard = document.getElementById('creditCard');
var radiocheck = document.getElementById('check');
var radiopaypal = document.getElementById('paypal');
var checkAddressRegistered = document.getElementById('addressRegistered');
var subtotal = document.getElementById("subtotal").innerText;
var total = document.getElementById("total");
var numtotal = subtotal;
var deliveryType = "standard";
var payment = "carte";


radio1.addEventListener("click", function() {
    numtotal = subtotal;
    total.innerText = numtotal + "€";
    delivery.innerText = "0€";
    deliveryType = "standard";
});

radio2.addEventListener("click", function() {
    numtotal = (parseFloat(subtotal) + 5);
    total.innerText = numtotal + "€";
    delivery.innerText = "5€";
    deliveryType = "express";
});

radiocard.addEventListener("click", function() {
    payment = "carte";
});

radiocheck.addEventListener("click", function() {
    payment = "cheque";
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


    if (checkAddressRegistered!=null && checkAddressRegistered.checked) {
        email = "<?php if(isset($resultShipping))echo $resultShipping['email'];?>";
        firstname = "<?php if(isset($resultShipping))echo $resultShipping['firstname'];?>";
        lastname = "<?php if(isset($resultShipping))echo $resultShipping['lastname'];?>";
        address = "<?php if(isset($resultShipping))echo $resultShipping['address'];?>";
        zipcode = "<?php if(isset($resultShipping))echo $resultShipping['zipcode'];?>";
        city = "<?php if(isset($resultShipping))echo $resultShipping['city'];?>";
        country = "<?php if(isset($resultShipping))echo $resultShipping['country'];?>";


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
        document.location.href = "index.php?page=thanks&email=" + email + "&firstname=" + firstname + "&lastname=" + lastname + "&address=" + address + "&zipcode=" + zipcode + "&city=" + city + "&country=" + country + "&payment=" + payment + "&total=" + numtotal + "&deliveryType=" + deliveryType;
    else window.alert("Please fill all the blanks");
});