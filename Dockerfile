FROM centos:7

# Prepare the env for the install of PHP 7.3
RUN yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm yum-utils
RUN yum-config-manager --enable remi-php73
RUN yum -y update

# Install PHP 7.3 and Apache
RUN yum -y install php73-php php73-php-bcmath php73-php-gd php73-php-gmp php73-php-imap php73-php-mbstring php73-php-mysqlnd php73-php-pdo php73-php-xml php73-php-zip php73-php-pecl-ssh2 php73-php-soap php73-php-process php73-php-intl php-pecl-mcrypt --nogpgcheck

# Set timezone
RUN rm -rf /etc/localtime \
    && ln -s /usr/share/zoneinfo/Europe/Bucharest  /etc/localtime
# Install Node.js
RUN curl -sL https://rpm.nodesource.com/setup_12.x | bash -
RUN yum -y install nodejs

# Install Git
RUN yum -y install git

# Install Unzip
RUN yum -y install unzip

# Configure PHP and Apache
RUN ln -s /opt/remi/php73/root/usr/bin/php /usr/bin/php
COPY configs/php/php.ini /etc/opt/remi/php73/php.d/stiri-imporate.ini

# Install composer
RUN curl https://getcomposer.org/installer -o composer-setup.php
RUN php -d allow_url_fopen=On composer-setup.php --install-dir=/usr/local/bin --filename=composer

COPY configs/apache/domain.lan.conf /etc/httpd/conf.d/

WORKDIR /var/www/html

# Start Apache
CMD ["-D", "FOREGROUND"]
ENTRYPOINT ["/usr/sbin/httpd"]

EXPOSE 80 443 8080

