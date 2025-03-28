# Eventify
[![forthebadge](data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMDcuMzMzMzI4MjQ3MDcwMyIgaGVpZ2h0PSIzNSIgdmlld0JveD0iMCAwIDIwNy4zMzMzMjgyNDcwNzAzIDM1Ij48cmVjdCB3aWR0aD0iMTA2LjY2NjY2NDEyMzUzNTE2IiBoZWlnaHQ9IjM1IiBmaWxsPSIjOTAxM2ZlIi8+PHJlY3QgeD0iMTA2LjY2NjY2NDEyMzUzNTE2IiB3aWR0aD0iMTAwLjY2NjY2NDEyMzUzNTE2IiBoZWlnaHQ9IjM1IiBmaWxsPSIjYmQxMGUwIi8+PHRleHQgeD0iNTMuMzMzMzMyMDYxNzY3NTgiIHk9IjIxLjUiIGZvbnQtc2l6ZT0iMTIiIGZvbnQtZmFtaWx5PSInUm9ib3RvJywgc2Fucy1zZXJpZiIgZmlsbD0iI0ZGRkZGRiIgdGV4dC1hbmNob3I9Im1pZGRsZSIgbGV0dGVyLXNwYWNpbmc9IjIiPk1BREUgV0hJVDwvdGV4dD48dGV4dCB4PSIxNTYuOTk5OTk2MTg1MzAyNzMiIHk9IjIxLjUiIGZvbnQtc2l6ZT0iMTIiIGZvbnQtZmFtaWx5PSInTW9udHNlcnJhdCcsIHNhbnMtc2VyaWYiIGZpbGw9IiNGRkZGRkYiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGZvbnQtd2VpZ2h0PSI5MDAiIGxldHRlci1zcGFjaW5nPSIyIj5TWU1GT05ZPC90ZXh0Pjwvc3ZnPg==)](https://forthebadge.com)

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
4. Configurez votre base de données en copiant le `.env` et en le renommant `.env.local`


5. Décommentez a la ligne qui concerne `SQLite`


6. Exécutez les migrations de la base de données :
    ```bash
    php bin/console doctrine:migrations:migrate
    ```
7. Démarrez le serveur de développement Symfony :
    ```bash
    symfony serve
    ```

## Utilisation

Une fois l'installation terminée, vous pouvez accéder à l'application via votre navigateur à l'adresse suivante : `http://localhost:8000`.