# TP Jeudi

## Entité Société

* Créer une nouvelle entité Societe en s'inspirant de Contact avec :
  * id
  * nom
  * ville
  
* Utiliser la commande suivante pour vérifier la requete de creation de table
    
    vendor/bin/doctrine-module orm:schema-tool:update --dump-sql
    
* Utiliser la commande suivante pour créer la table
    
    vendor/bin/doctrine-module orm:schema-tool:update --force
    
* Ajouter quelques données dans phpMyAdmin
  
## Service Société

* Créer SocieteDoctrineORMService
* Créer sa fabrique et l'enregistrer dans le Service Manager

## Controleur Société

* Injecter le service dans SocieteController
* Créer sa fabrique et l'enregistrer dans le Service Manager
* Développer les actions list et show de SocieteController et leurs vues

## Services

* Dans ContactDoctrineORMService injecter l'hydrateur de Doctrine (s'inspirer de ContactZendDbService)
* Enregistrer ContactForm dans le FormElementManager et l'injecter au controleur