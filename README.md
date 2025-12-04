# ArtSpace - Projet PHP/MySQL

**ArtSpace** est un projet web en **PHP** avec une base de données **MySQL**, permettant de publier, vendre et acheter des œuvres d’art.  
Ce projet est **expérimental et non terminé**, principalement destiné à l’apprentissage de PHP, MySQL et de la gestion des interfaces utilisateurs avec Bootstrap.

## Objectifs du projet

- Apprendre à structurer un projet PHP avec inclusion de fichiers (`head.php`, `header.php`, `footer.php`).  
- Utiliser **PDO** pour interagir avec une base de données MySQL.  
- Créer une interface utilisateur avec **Bootstrap** et des cartes dynamiques pour afficher les œuvres.  
- Gérer des interactions simples comme **l’ajout au panier** et les messages d’alerte.  

## Structure du projet

- `index.php` : page principale affichant toutes les œuvres.  
- `order.php` : page pour ajouter un produit au panier (non complète).  
- `head.php`, `header.php`, `footer.php` : fichiers inclus pour la structure HTML et le style.  
- `alert.php` : affichage des messages d’alerte.  
- `public/pictures/` : dossier contenant les images des œuvres.  
- Base de données MySQL `artwork` avec des colonnes pour le nom, l’artiste, le prix, la description et l’image.  

## Fonctionnalités présentes

- Affichage dynamique des œuvres depuis la base de données.  
- Cartes stylisées avec **Bootstrap** et couleurs de fond alternées.  
- Boutons "Ajouter au panier" avec redirection.  
- Gestion simple des alertes pour succès d’ajout.  

> ⚠️ Le projet n’est pas terminé et ne gère pas encore la totalité du panier, les utilisateurs ou les paiements.

## Installation et lancement

### Avec XAMPP

1. Installer [XAMPP](https://www.apachefriends.org/index.html).  
2. Copier le projet dans le dossier `htdocs` (ex. `C:\xampp\htdocs\ArtSpace`).  
3. Lancer **Apache** et **MySQL** via le panneau de contrôle XAMPP.  
4. Créer une base de données `artspace` dans phpMyAdmin et importer la structure SQL si nécessaire.  
5. Configurer la connexion PDO dans ton fichier de configuration (ex. `db.php`).  
6. Accéder au projet via `http://localhost/ArtSpace/`. 
