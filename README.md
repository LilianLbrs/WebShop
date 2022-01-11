# Web Shop par Sacha MONTEL et Lilian LABROSSE

Ce site web a été réalisé dans le cadre de l'UE "ISI1 WEB" de l'école Polytech Lyon.

# Description

Ce un site de e-commerce qui propose différentes options:

        #Client
    - Vous pouvez décider de vous connecter sur le site, si vous n'avez pas de compte
    un lien pour se créer un compte est disponible sur la page de connexion. La connexion
    à un compte permet de ne pas perdre votre panier courant si vous quittez le site, mais
    il n'est pas obligatoire de se connecter pour passer une commande.
    - Vous pouvez naviguer entre les différentes catégories de produits. Lorsque vous cliquez sur
    un produit, vous serez dirigé vers la page le concernant.
    - Sur la page de produit vous avez accès à son nom, sa description, son prix et les avis laissés 
    par les clients. Vous pouvez décider d'ajouter une certaine quantité de ce produit à votre panier,
    et même de laisser un avis.
    - En cliquant sur l'icone du chariot en haut à droite de votre écran, vous accéderez à 
    votre panier, aussi disponible lorsque vous ajoutez un article.
    - Sur la page du panier vous pouvez toujours ajuster la quantité des produits sélectionnés.
    - Pour finir la commande il suffit de cliquer sur le bouton "Allez à la caisse" en bas à droite
    de vos articles.
    - Vous accéderez alors à la page de livraison, où vous pouvez entrer une adresse de livraison,
    ou bien utiliser celle renseignée lors de la création de votre compte. Vous pouvez choisir la
    livraison gratuite ou express ainsi que votre mode de paiement.
    - Une fois vos informations renseignées vous pouvez cliquer sur "Finaliser l'achat" pour passer 
    au paiement.
    - *Comme ce site est à but éducatif nous avons supprimé la page de paiement nous arrivons donc 
    directement sur la page de remerciement*
    - Vous arrivez sur la page qui vous remercie pour votre achat, vous avez ici accès à votre 
    facture que vous pouvez télecharger au format pdf.

        #Administrateur
    - Pour accéder au panneau d'administration il faut entrer l'URL : "index.php?page=admin"
    - Vous arrivez sur une page de connexion? Pour la démonstration nous avons créé un profil 
    administrateur :  login = "admin", password = "secret".
    - Une fois connecté vous arrivez sur la page d'administration des commandes où toutes les 
    commandes passées sur le site sont référencées avec leur ID, l'ID du client, le mode de paiement, 
    la date de la commande, le statut de la commande ainsi que le prix total de la commande. Vous pouvez 
    gérer la commande en cliquant sur le bouton "Voir commande" au bout de la ligne.
    - Vous arrivez ainsi sur le gestionnaire de commande avec le détail de la commande sélectionnée, 
    ainsi qu'un bouton pour valider la commande si cela n'a pas déja été fait. Le statut de la commande 
    passe ainsi à 10.


# Organisation du travail

    Pour ce projet, nous avons utilisé la structure d'un projet de site web réalisé en MVC que Sacha avait 
    réalisé l'année dernière. Nous avons ensuite commencé à faire le site web ensemble en cours de WEB.
    Par la suite nous avons travaillé chacun de notre côté sur les différentes pages qu'il fallait ajouter
    en commençant par l'affichage des produits, puis la connexion à un compte, la gestion des paniers, la 
    page de paiement, la facture en utilisant "fpdf.php", et enfin les fonctionnalités administrateur.


# Difficultés rencontrées

    Lors du développement de ISI Web Shop nous avons rencontré quelques difficultés, que nous avons réussi
    a surmonté:
        - La gestion du panier avec l'ID de session et l'ID customer, nottament afin de n'avoir qu'un seul
    panier par utilisateur.
        - La gestion du cas ou un utilisateur crée un panier puis se connecte alors qu'il avait déjà un 
        panier enregistré. Nous avons décidé dans ce cas là de fusionner le panier temporaire de l'utili- 
        sateur avec celui qu'il qu'il avait déjà avec son compte.