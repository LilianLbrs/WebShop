<div class="bar">
        <p><b>NOTRE OFFRE</b></p>
        <ul>
        <?php foreach ($resultatsCategories as $categorie) {
            echo '<li>';
            echo '<a href="index.php?page=products&category='.$categorie['id'].'">'.$categorie['name'].'</a>';
            echo '</li>';
        }?>
        </ul>

        <div class="divider"></div>
        <a href="index.php?page=account">Login</a>
        
    </div>