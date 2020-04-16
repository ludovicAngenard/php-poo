# CRUD - Jeux de société

Nous allons faire une web app fictive pour une ludothèque. Cette dernière devra lister des jeux de société mais aussi pouvoir administrer sa base. 

A partir d'une base de données existantes, nous allons gérer tout ce qui est communément appelé un CRUD.
Soit un **C**reate, **R**ead, **U**pdate, **D**elete.

## Création de la base de données
Je vous ai créé la base de données. vous pouvez la récupérer *database/boardgames.sql* pour l'importer. Comme vous l'avez déjà vu, c'est plus facile de le faire avec Phpmyadmmin.

Cette base de données ne contient, pour l'instant, que la table *boardgame* (jeu de société)

## Afficher la liste des jeux
Soit le **R** de CRUD.

Dans le fichier *read.php*, récupérez les jeux directement de la base données et affichez-les dans un tableau.
Vous devez utiliser PHP bien sûr, mais aussi PDO. 

# Ajouter un jeu de société

Vous devez maintenant ajouter un jeu, mais pas par phpmyadmin, plutôt directement par une page prévue à cet effet.

Ça tombe bien, il y a la page *create.php*. Il y a déjà le formulaire. Vous devez récupérer les informations envoyées par ce formulaire et les enregistrer
dans la base de données.

Une fois que vous l'aurez faite fonctionner, essayer d'utiliser le formulaire réalisé les jours précédents. 

## Améliorations

Quand vous avez réussi à ajouter un jeu, c'est bien de le notifier par message.

Si vous ne l'avez pas déjà fait, affichez le message "Le jeu de société a été ajouté avec succès." quand c'est le cas :)

Je vous laisse libre sur la manière d'afficher le message.

# Modifier un jeu de société


Le fichier *update.php* a été créé pour ça.

Tout d'abord, dans le tableau des jeux du fichier *read.php*, ajoutez un lien sur le nom de chaque jeu. Ce lien renverra vers la page *update.php*.

Sur cette page on va pouvoir faire les modifications pour le jeu choisi. Les champs du formulaire présents sur cette page doivent être pré-remplis à partir des informations du jeu selectionné ! Encore une fois vos classes doivent pouvoir servir.

TIPS : Afin de différencier les jeux il faudra se baser sur l'id et peut-être (re)voir comment faire passer des variables entre des pages web.

# Supprimer un jeu

Nous allons maintenant voir la dernière action, la suppression.

Ajoutez un bouton *supprimer* dans le tableau sur chaque ligne des jeux. En cliquant sur le bouton cela enverra le l'*id* du jeu à la page *delete.php*.

Lorsque vous aurez supprimé il faudra revenir de façon automatique (sans que l'internaute ne fasse quoique ce soit) la page *read.php*.

# ALLER PLUS LOIN

Aujourd'hui il ne s'agit pas encore de faire le fichier liant l'ensemble. Vous devez conserver ces quatre pages tout simplement. Ce sera le rôle du Controlleur.

## Refactorisez votre code

Par cet exercice nous avons fait du CRUD (Create Read Update Delete). Ce sont les actions de bases que l'on peut effectuer sur les données en base.
Si vous avez mis, dans chaque fichier, la connexion à la base de données sachez qu'il y'a le fichier `inc/DBConnection.php`

## Contrôler les données du formulaires

Il y'a des petits malins qui n'hésiteront pas à essayer de pirater votre application notamment en passant par le formulaire.

Protéger vos arrières en vérifiant que chaque informations envoyées par le formulaire soient valides avant de la rentrer dans la base de données.
Si vous avez utiliser la méthode ```query()``` ou ```exec()``` avec des variables, il faudra les remplacer par ```prepare()``` et ```execute()```. Ces méthodes sont plus sécurisées quand il s'agit de travailler avec des variables envoyées par l'internaute.

## Ajoutez une fonctionnalité

Imaginez que ce site contienne l'ensemble des jeux d'une ludothèque.
Rajoutez un champ de recherche au sein de la page `read.php`.
Ce nouveau champ doit permettre à un groupe de joueurs de spécifier le nombre de joueurs présents dans leur groupe. 

> S je viens avec quelques amis et que nous sommes  un groupe de 4. A quels jeux pouvons-nous jouer?

En fonction de la valeur saisie, le site doit afficher les jeux pouvant correpondre au besoin. 

Si aucun jeu ne corresponds, un texte alternatif doit s'afficher. 