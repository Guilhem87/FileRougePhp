# Image de base officielle avec PHP 8.2
FROM php:8.2-cli

# Installer les dépendances utiles (tu peux en ajouter si besoin)
RUN apt-get update && apt-get install -y unzip zip curl

# Définir le répertoire de travail dans le conteneur
WORKDIR /app

# Copier tous les fichiers dans le conteneur
COPY . .

# Exposer le port utilisé par le serveur PHP
EXPOSE 10000

# Lancer le serveur PHP intégré (à adapter si ton fichier d’entrée est autre que index.php)
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
