# Utiliser Eventify avec docker

1. Assurez-vous d'avoir Docker installés sur votre machine.

2. Clonez le dépôt :
    ```bash
    git clone https://github.com/EmilPhOniX/Eventify.git
    ```

3. Accédez au répertoire du projet :
    ```bash
    cd Eventify
    ```

4. Construisez et démarrez les conteneurs Docker :
    ```bash
    docker compose up
    ```

5. Préparez vous un petit café en attendant que les services aient démarrés.

6. Accédez à Eventify via http://localhost:8000 et accédez à EventifyListener via http://localhost:3000
> Note : Les secrets MySQL sont gérés via des fichiers secrets, pour le bien de cette démonstration des mots de passe par défauts sont utilisés.
