# Usamos una imagen oficial de PHP con Apache
FROM php:8.1-apache

# Copiamos TODO el repositorio al directorio público de Apache
COPY . /var/www/html/

# Damos permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Habilitamos mod_rewrite por si usas rutas amigables
RUN a2enmod rewrite

# Exponemos el puerto que Render necesita
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]
