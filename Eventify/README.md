# Eventify
![Symfony](https://img.shields.io/badge/symfony-%23000000.svg?style=for-the-badge&logo=symfony&logoColor=white)

Une application Symfony de gestion d'évènements musicaux.

## Table des matières

- [Eventify](#eventify)
  - [Table des matières](#table-des-matières)
  - [Description](#description)
  - [Caractéristiques](#caractéristiques)
  - [Installation](#installation)
  - [Utilisation](#utilisation)
  - [Tests](#tests)

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


5. Commentez la ligne `DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"`


6. décommentez la ligne `# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"`


7. Exécutez les migrations de la base de données :
    ```bash
    php bin/console doctrine:migrations:migrate
    ```
7. Démarrez le serveur de développement Symfony :
    ```bash
    symfony serve
    ```

8. Si dans le Répetoire `public` il n'y as pas le chemin `uploads/images` créez le.

## Utilisation

Une fois l'installation terminée, vous pouvez accéder à l'application via votre navigateur à l'adresse suivante : `http://localhost:8000`.

## Tests

Pour exécuter les tests unitaires, assurez-vous d'être dans le répertoire `Eventify` et que les dépendances sont installées.

Lancer tous les tests :
```bash
php vendor/bin/phpunit
```

Lancer uniquement les tests des entités :
```bash
php vendor/bin/phpunit tests/Unit/Entity/
```

Lancer un fichier de test spécifique :
```bash
php vendor/bin/phpunit tests/Unit/Entity/EventTest.php
```
