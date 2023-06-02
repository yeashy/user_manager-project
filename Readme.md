**Я не делал настраиваемые пароли для БД, а так же имена контейнеров, они фиксированные**

**И не настраивал смтп**
_______
**Как развернуть проект:**

1. Заходим в папку с докером - `cd _docker`
2. Запускаем и билдим докер - `docker-composer up -d --build`
3. Заходим в контейнер php - `docker exec -it docker-php-1 bash`
4. Любым удобным способом выдаем себе права в контейнере на проект
5. Ставим пакеты - `composer install`
6. Генерим ключ - `php artisan key:generate`
7. По желанию можно линкануть хранилище - `php artisan storage:link`
8. Создаем `.env` - `cp .env.example .env`, можно ничего не менять, так как в экзампле уже все настроено для работы, кроме смтп
9. Запускаем миграции и сиды - `php artisan migrate --seed`
10. По желанию можно запустить очередь - `php artisan queue:work --queue=high,medium,low`
11. Открываем в браузере `http://localhost:80`, и все готово
12. Можно пользоваться Адмайнером, он на 6080 порту

**Доступы от тестовых аккаунтов**
Админ (имеет права как писать, так и отвечать на обращения) - admin@gmail.com, admin123
Менеджер (может только смотреть и отвечать на обращения) - manager@gmail.com, manager123
Клиент (может только смотреть свои, создавать и редактировать обращения) - client@gmail.com, client123
