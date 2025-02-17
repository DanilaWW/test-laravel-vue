# Каталог книг
Проект для тестового задания на позицию Fullstack Developer (Laravel/Vue).

## Установка
1. Склонируйте репозиторий:
   ```bash
   git clone https://github.com/DanilaWW/test-laravel-vue.git
   ```
2. Установите зависимости:
   ```bash
   composer install
   npm install
   ```
3. Настройте `.env` (на основе `.env.example`) для PostgreSQL.
4. Запустите миграции и сидер:
   ```bash
   php artisan migrate --seed
   ```
5. Соберите ассеты:
   ```bash
   npm run build
   ```
6. Запустите сервер:
   ```bash
   php artisan serve
   ```