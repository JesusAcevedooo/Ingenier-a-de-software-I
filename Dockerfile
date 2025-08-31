# Imagen base con PHP y Apache
FROM php:8.1-apache

# Copiar todo el proyecto al directorio de Apache
COPY . /var/www/html/

# Dar permisos a Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponer el puerto
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]
