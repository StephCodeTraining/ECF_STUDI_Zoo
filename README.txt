----------------- INSTALLATION Site e local ---------------------

Bonjour

Voici le lien GitHub pour cloner le projet : 
https://github.com/StephCodeTraining/ECF_STUDI_Zoo.git

Après avoir sélectionner votre dossier dans lequel vous aurez 
créé un dépôt git avec l'invite de commande
(git init)

Il vous suffira de cloner le projet à l'intérieur.
(git clone url)


Cette évaluation a été effectuée en locale sous WampServeur.

Le site nécessite de démarrer un serveur local afin d'ouvrir
la page de démarrage en utilisant le "localhost".


Entrez ensuite le chemin manuellement dans la barre de recherche
à partir de localhost pour arriver au fichier nommé "setup.php"

Ce fichier initialise la base de données ainsi que les éléments 
de contenus du site (animaux, habitats, utilisateurs tests)

Pour ma part le chemin complet vers le projet est :
http://localhost/training/ECF_Zoo/ECF_ZOO/setup.php

Il vous suffit de cliquer ensuite sur le bouton "Lien vers le site"
pour y accéder
Un bouton de réinitialisation est également présent pour recommencer le processus.

Vous arriverez donc sur la page d'accueil et pourrez naviguer entre les pages.

En ce qui concerne la connexion, un compte administrateur non modifiable
a été crée : login = admin, password = 123

Ainsi que deux autres pour faciliter le test des fonctionnalités
vous pourrez donc vous connecter en utilisant ces identifiants avec
 leurs mot de pass respectifs : 

login = employe0@yahoo.com password = 123
login = veterinaire0@yahoo.com	password = 321

Vous trouverez dans le dossier annexes les différents diagrammes 
décrivant le projet, ainsi que le lien trello d'avancement de projet.


------------------- Description des différents profils & actions

ADMIN:
_ Crée les comptes des utilisateurs du site (employé & vétérinaire)
  avec possibilité de les supprimer
_ Modifie les différents services proposés dans le zoo
_ Visualise les compte rendus des vétérinaires
_ Visualise les commentaires sur les habitats

EMPLOYE:
_ Met à jour l'alimentation quotidienne des animaux 
  (visible sur la page animaux dans leur description)
_ Valide ou non les avis laissés par les visiteurs du site
_ Visualise les messages envoyés par les visiteurs via la page contact
_ Modifie les services proposés par le zoo

VETERINAIRE:
_ Rédige les compte rendus sur les animaux
 (met à jour la santé et l'alimentation)
_ Rédige les commentaires sur les habitats
_ Visualise l'alimentation quotidienne des animaux

VISITEUR:
_ Navigue sur les pages du site 
_ Peut laisser un commentaire (en bas de la page d'accueil)
_ Peut écrire au personnel du zoo via le formulaire de 
  la page contact

Le logo du zoo est cliquable à tout moment pour revenir à la page d'accueil.

Bonne navigation

Stéphane MARTHOT