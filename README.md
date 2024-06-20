# Instructions pour la Configuration et l'Implémentation de l'Application en Laravel

## 1. Migration de la Base de Données

1. Exécuter les migrations de la base de données avec la commande `php artisan migrate`.

## 2. Démarrer les Services

1. Démarrer le serveur Laravel avec la commande `php artisan serve`.

## 2. Créer des module 

1. Vous pouvez créer 3 types de module, les valeurs sont mesurées selon le type de module.


## 3. Implémentation des Notifications en Temps Réel

. La commande pour générer une  données par module `php artisan schedule:run` .
	Lancer la commande chaque fois pour générer des données, soit faite la commande suivante pour que les données se génèrent eux meme 
	chaque une minute : `php artisan schedule:work`

## 4. Détails du Projet

### a. Génération Automatique d'État des Modules

- Un script de génération automatique d'état des modules a été mis en place. Ce script génère des données pour chaque module et les enregistre dans la base de données.
- Les modules génèrent des données numériques sur les mesures qu'ils effectuent (température, vitesse, etc.) et stockent l'historique dans la base de données.

### b. Notifications Visuelles en Cas de Dysfonctionnement d'un Module

- Des notifications visuelles en temps réel sont mises en place pour signaler tout dysfonctionnement d'un module.
- Les notifications sont gérées via un plugin comme Notify.js et Pusher pour les mises à jour en temps réel.

### c. Historique et État des Modules

- Les modules peuvent tomber en panne et refonctionner de manière aléatoire.
- La génération de l'historique continue même lors de la navigation sur l'interface web.
- Une page de visualisation affiche l'état de fonctionnement des modules, y compris la valeur mesurée actuelle, le nombre de données envoyées, l'état de marche, ainsi qu'un graphique pour suivre l'évolution de la valeur mesurée.
