FROM php:8.2-cli

# Installer les extensions nécessaires si besoin
RUN apt-get update && apt-get install -y unzip zip curl

# Copier les fichiers du projet dans le conteneur
COPY . /app

# Se placer dans le dossier de ton projet
WORKDIR /app

# Exposer le bon port
EXPOSE 10000

# Installer Composer si tu l'utilises
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Installer les dépendances PHP si fichier composer.json
RUN [ -f composer.json ] && composer install || echo "Pas de composer.json"

# Lancer le serveur PHP
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
