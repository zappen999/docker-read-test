FROM php:5.6
ADD . /var/www

RUN cp -r /var/www /var/nonmount

CMD [ "php", "/var/www/readtest.php" ]
