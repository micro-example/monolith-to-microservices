FROM php:5.6-apache
COPY ./test.php  /var/www/html

EXPOSE 80

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
