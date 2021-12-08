<?php

if($_SESSION['customer_id']!=0)
//appel du modèle
require_once(PATH_MODELS.$page.'.php');

//appel de la vue
require_once(PATH_VIEWS.$page.'.php');