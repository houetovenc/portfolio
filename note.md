_ au niveau de la bdd

    .une table utilisateur
        - identifiant
        - nom
        - prenom
        - adresse mail 
        - mot de passe
        - rôle

    .messagerie
    - une table message
        - nom
        - prenom
        - societe
        - email
        - telephone
        - description

    .compétence
    - une table Front-end
        - titre
        - texte
        - images
        - lien
        - active
    - une table back-end
        - titre
        - texte
        - images
        - lien
        - active

* création de l'architecture (arborescence des dossiers et fichiers)
* création de la table user dans la bdd portfolio
* création du dossier et fichier aide/creerUnAdminDuSite.php
    -ce fichier va nous permettre de créer un formulaire pour enregistrer un administrateur qui aura accès au back-office (console d'administration) de notre site (pour le portfolio vous-même)
* création d'une barre de navigation dans le fichier assets/inc/headerFront.php