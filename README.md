# Eventify

Une application Symfony de gestion d'évènements musicaux.

## Table des matières

- [Description](#description)
- [Caractéristiques](#caractéristiques)
- [Installation](#installation)
- [Utilisation](#utilisation)
- [Contribuer](#contribuer)
- [Licence](#licence)

## Description

Eventify est une application Symfony conçue pour faciliter la gestion des évènements musicaux. Elle permet aux utilisateurs de créer, gérer et participer à des évènements musicaux.

## Caractéristiques

- Création et gestion d'évènements
- Inscription et participation aux évènements

## Installation

Pour installer Eventify, suivez les étapes ci-dessous :

1. Clonez le dépôt :
    ```bash
    git clone https://github.com/EmilPhOniX/Eventify.git
    ```
2. Accédez au répertoire du projet :
    ```bash
    cd Eventify
    ```
3. Installez les dépendances via Composer :
    ```bash
    composer install
    ```
4. Configurez votre base de données dans le fichier `.env` :


5. Exécutez les migrations de la base de données :
    ```bash
    php bin/console doctrine:migrations:migrate
    ```
6. Démarrez le serveur de développement Symfony :
    ```bash
    symfony serve
    ```

## Utilisation

Une fois l'installation terminée, vous pouvez accéder à l'application via votre navigateur à l'adresse suivante : `http://localhost:8000`.