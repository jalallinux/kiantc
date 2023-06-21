FROM ghcr.io/jalallinux/laravel:php-82

COPY . /app

COPY docekr/start-container /usr/local/bin/start-container
COPY docekr/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
RUN chmod +x /usr/local/bin/start-container

COPY .env.docker .env
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install

EXPOSE 8000
ENTRYPOINT ["start-container"]
