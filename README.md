## Running with Docker



### 0. Configure `.env.docker` file
```dotenv
# Application
APP_URL=http://localhost
APP_PORT=8000

# Database
DB_CONNECTION=pgsql
DB_HOST=host.docker.internal
DB_PORT=5432
DB_DATABASE=kiantc
DB_USERNAME=
DB_PASSWORD=

# Cache (Memcached)
MEMCACHED_HOST=host.docker.internal

# Cache (Redis)
REDIS_HOST=host.docker.internal
REDIS_PASSWORD=
REDIS_PORT=6379
```

### 1. Create container
```shell
docker compose up -d
```

### 2. Run setup command
```shell
docker exec -it laravel php artisan setup --key-generate --migrate-fresh-seed --symlinks
```

