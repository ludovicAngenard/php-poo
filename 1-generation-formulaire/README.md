# Objectif

Comme vous avez pu le voir, il est possible d'intégrer du PHP dans du HTML. Cependant, ça devient très vite difficile à lire et à maintenir.

L'alternance entre PHP et HTML rends la lecture fastidieuse et la source d'erreur nombreuse. Sans parler de l'impossibilité de correctement tester la logique présente dans votre code.

Nous allons minimiser autant que possible cette alternance en créant des classes PHP qui vont générer de l'HTML directement.

Imaginez un formulaire 

```html
<form action="<?= $action ?>" method="<?= $method ?>">
    <input name="lastname" value="<?= $lastname ?>" >
    <input name="firstname" value="<?= $firstname ?>" >
    <input type="submit" value="Save" >
</form>
 ```
 
Les variables $action, $method, $firstname et $lastname étant générées voire validées ailleurs.

Comme vous pouvez le voir, l'HTML et le PHP sont mêlés.

Pour minimiser cela, nous pouvons créer une classe Form qui gère la génération du formulaire. On aura un code peu plus lisible.

```php
$form = new Form($action, $method);  // créer le début du formulaire
$form->addTextField('lastname',$lastname); // créer un input de type texte avec comme valeur $lastname
$form->addTextField('firstname',$firstname); // créer un input de type texte avec comme valeur $firstname
$form->addSubmitButton('Save'); //Créer un bouton pour soumettre le formulaire se nommant Save

echo $form->build(); // générer le formulaire
```
# Activité

Créer, au sein du fichier `Form.php`, une classe Form qui s'occupera de générer les différents éléments du formulaires. Cette classe devra avoir des méthodes et des propriétés afin de pouvoir générer :

* Un input text `<input type="text"...>`
* Un select `<select ...> ...</select>`
* Un bouton submit `<button type="submit"></button>`
* Un textarea `<textarea ...> ...</textarea>`
* Un radio button `<input type="radio"...>`
* Une méthode build qui permettra de générer le code HTML du formulaire.

Utilisez des noms de propriétés et de méthodes qui ont du sens, restez simple et commentez votre code.

# Vous rencontrez une difficulté ? 
Un incompréhension dans l'exercice ? Une contrainte personelle ? 
Vous pouvez me contacter via Discord. Vous pouvez aussi glisser un commentaire lors de votre merge request


# Vous n'avez pas fini à 16h? 
Pas grave. Faites tout de même votre merge request. Mais j'aimerais qu'elle soit propre, commentée et sans code superflu.

# Pour aller plus loin

Créer une classe `Validator` qui va servir à valider les données envoyées par le formulaire. Cette classe contiendra des méthodes qui pourront valider une chaine de caractère, un entier, un nombre à virgule etc. 

# Question 

Il est fréquent de voir ce genre de code: 


```php
$form = new Form($action, $method)  // créer le début du formulaire
    ->addTextField('lastname',$lastname) // créer un input de type texte avec comme valeur $lastname
    ->addTextField('firstname',$firstname) // créer un input de type texte avec comme valeur $firstname
    ->addSubmitButton('Save'); //Créer un bouton pour soumettre le formulaire se nommant Save

echo $form->build(); // générer le formulaire
```
Que faudrait-il modifier au sein du votre pour que celà fonctionne ?

# Ressources
* [Introduction à la POO sur Open Classroom](https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/1665911-introduction-a-la-poo)
* [PHP the right way](https://phptherightway.com/)
* [La cheatsheet de php sur](https://learnxinyminutes.com/docs/fr-fr/php-fr/)