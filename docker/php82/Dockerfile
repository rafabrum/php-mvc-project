FROM php:8.2.0-fpm-alpine

# Atualizar repositórios de pacotes
RUN apk update

# Definir a variável de ambiente de fuso horário
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Instalar as dependências e extensões necessárias
RUN apk add --no-cache \
    bzip2-dev \
    ca-certificates \
    curl \
    fcgi \
    freetype-dev \
    gettext-dev \
    gnu-libiconv \
    icu-dev \
    imagemagick \
    imagemagick-dev \
    libjpeg-turbo-dev \
    libmcrypt-dev \
    libpng \
    libpng-dev \
    libressl-dev \
    libtool \
    libwebp-dev \
    libxml2-dev \
    libzip-dev \
    oniguruma-dev \
    unzip \
    linux-headers \
    autoconf \
    build-base

# Instalar extensões PHP usando docker-php-ext-install
RUN docker-php-ext-install \
    bcmath \
    bz2 \
    exif \
    ftp \
    gettext \
    gd \
    intl \
    mbstring \
    opcache \
    pdo \
    pdo_mysql \
    shmop \
    sockets \
    sysvmsg \
    sysvsem \
    sysvshm \
    zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar arquivos de configuração
COPY docker-php.ini /usr/local/etc/php/conf.d/
COPY docker-php-fpm.conf /usr/local/etc/php-fpm.d/
COPY xdebug.ini ${PHP_INI_DIR}/conf.d

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Expor a porta do PHP-FPM (caso necessário)
EXPOSE 9000

# Comando padrão para executar o PHP-FPM
CMD ["php-fpm"]
