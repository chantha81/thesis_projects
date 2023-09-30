#FROM bitnami/laravel
#LABEL authors="MSI-PC"
#WORKDIR /app
#COPY . .
#RUN docker-compose up

FROM php:8.2-cli
COPY . .
WORKDIR myapp
CMD [ "php artisan serve"]
