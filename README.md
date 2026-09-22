# Laravel + Docker muhiti

## Fayl tuzilmasi

```
loyiha/
├── dockerFiles/
│   ├── nginx/
│   │   └── nginx.conf      ← Nginx config
│   └── php/
│       └── Dockerfile          ← PHP sozlamalari
├── docker-compose.yml        ← Barcha servislar
├── .env                      ← Muhit o'zgaruvchilari
└──src/ (Laravel fayllari)
```

## Ishga tushirish

### 1. Laravel loyihasini yaratish
```bash
docker compose up -d
```

### 2. .env faylini sozlash
```bash
docker compose exec app composer create-project laravel/laravel .
```

# 1. src/.env faylini oching
```bash
docker compose exec app cp .env.example .env
```

# 2. Migratsiyalarni qayta ishlatish (PostgreSQL ga)
```bash
docker compose exec app php artisan migrate:fresh
```
# php contener ichiga kirish artisan ishlatish uchun 

```bash
docker compose exec app bash
```