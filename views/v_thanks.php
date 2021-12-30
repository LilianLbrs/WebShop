<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'menu.php'); ?>



<div class="container-fluid d-flex flex-column align-items-center justify-content-center">
    <p class="fw-bolder fs-1 mt-5">Thanks for your purchase!</p>
    <p>Cliquez <a class="link-primary" href="index.php?page=bill&sessionId=<?=$sessionId?>" target="_blank"> ici </a> pour obtenir votre facture. </p>
    <a type="button" class="btn btn-dark mt-3" href="index.php">GO BACK HOME</a>

</div>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>