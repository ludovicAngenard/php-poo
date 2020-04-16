# Objectif

En repartant du code réalisé par vos collègues. Le fichier `Form.php` a été mis à jour. 

Maintenant, vous avez généré du HTML depuis le PHP. 
Ca donne un peu l'impression d'avoir simplement inversé le problème initial non?

Auparavant, nous avions du PHP dans le HTML.
Maintenant nous avons le HTML dans du PHP. 

Et l'objet dans tout ça? 

Je vous parlais d'un changement de paradigme. On y est. Mais l'objet n'est pas encore vraiment exploité.

# Activité du Mercredi 15 Avril 2020

On peut remarquer que les méthodes `addTextField`, `addNumberField` et `addCheckboxField` retournent toutes la variable `$this`.

* Quelle petite optimisation pourrait-on apporter dans le index.php ?

De plus ces méthodes ne semblent pas optimales. Ou tout du moins nous n'avons pas utilisé l'orienté objet correctement. Avez-vous remarqué ce nouveau fichier qui s'est greffé dans le projet?
 
Il s'agit d'une classe abstraite.

Une classe abstraite est une classe qui ne peut pas être appelée de la manière suivante : `$object = new MaClasseAbstraite()`

Elle est obligatoirement appelée par une autre classe de la manière suivante : 
`class MaClasse extends MaClasseAbstraite`.

Vous me voyez venir ? 

L'exercice du jour est le suivant : 

Implémentez les classes `TextField`, `NumberField` ou encore `CheckboxField` en utilisant la classe abstraite. L'objectif étant de ne plus avoir directement le html dans la classe Form. par ex: `function addTextField($name, $value){ $this.fields[] = new TextField($name, $value)}`

L'objectif étant de livrer votre code, tout comme hier via pull request d'ici 16h15.

# Vous rencontrez une difficulté ? 
Un incompréhension dans l'exercice ? Une contrainte personelle ? 
Vous pouvez me contacter via Discord. Vous pouvez aussi glisser un commentaire lors de votre pull request.

# Vous n'avez pas fini à 16h15? 
Pas grave. Faites tout de même votre merge request. Mais j'aimerais qu'elle soit propre, commentée et sans code superflu.

# Pour aller plus loin
Tout d'abord ne serait-il pas encorepossible de refactorer vos méthodes `addTextField`, `addCheckboxField`... ?

De plus, suite à cette décomposition en classes. Ne serait-il possible d'utiliser la méthode magique `__toString` d'une manière pertinente ?

# Ressources
* [Heritage et Polymorphisme sur OpenClassroom](https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/1666684-lheritage)
* [Refactoring Guru](https://refactoring.guru)