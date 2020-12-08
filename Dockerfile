FROM php:7-apache
RUN echo "Image php apache installés....."
MAINTAINER Youssef <ouazin@gmail.com>
RUN  cd /var/www/html/
RUN echo "dossier envoyé to debian container....."
RUN apt-get update
RUN apt-get install -y unzip
RUN apt-get install -y zip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN echo "Composer installé sur la machine...."
RUN ls
RUN echo "Acces dossier de code...."
RUN apt install -y git
RUN git clone https://github.com/ouazine/Jeu-de-carte-PHP.git
RUN /etc/init.d/apache2 restart
RUN composer install
RUN chmod 755 public/