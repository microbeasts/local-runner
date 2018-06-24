FROM debian:stretch

# COMMON
RUN apt-get update && apt-get upgrade -y && apt-get install -y \
        wget \
        cron \
        nano \
        apt-transport-https \
        lsb-release \
        ca-certificates \
        gnupg \
        htop

# PHP
RUN wget -q https://packages.sury.org/php/apt.gpg -O- | apt-key add -
RUN echo "deb https://packages.sury.org/php/ stretch main" | tee /etc/apt/sources.list.d/php.list

RUN apt-get update && apt-get install -y php7.2 \
        php7.2-cli \
        php7.2-common \
        php7.2-curl \
        php7.2-gd \
        php7.2-json \
        php7.2-mbstring \
        php7.2-mysql \
        php7.2-xml \
        php7.2-zip

# DOCKER
RUN cd /usr/local/src && wget -qO- https://get.docker.com/ | sh
RUN curl -L https://github.com/docker/compose/releases/download/1.21.2/docker-compose-$(uname -s)-$(uname -m) -o /usr/local/bin/docker-compose
RUN chmod +x /usr/local/bin/docker-compose

# PROJECT
WORKDIR /project/local-runner

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer