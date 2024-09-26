# Usar uma imagem base do PHP com Apache
FROM php:7.4-apache

# Copiar os arquivos do projeto para o diretório do Apache
COPY . /var/www/html/

# Expor a porta 80 para acesso ao servidor web
EXPOSE 80

# Iniciar o Apache em segundo plano
CMD ["apache2-foreground"]
