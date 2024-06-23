# Фреймворк Yii2

1. Используется фреймворк Yii2 https://www.yiiframework.com
1.1. Инструкция по установке https://www.yiiframework.com/extension/yiisoft/yii2-app-advanced/doc/guide/2.0/en/start-installation

# База данных
1.2. БД MariaDB. Название БД `fotof_db`. Пользователь `root`, пароль `123456`.

# Как запустить

1. Прописать локальный адрес в etc/hosts:

```bash
127.0.0.1   fotof.local
127.0.0.1   admin.fotof.local
```

2. Собрать проект

Выполнить команду `docker compose up -d`, чтобы собрать сервисы указанные в файле `docker-compose.yml` для работы сайта: приложение PHP, база данных MariaDB.

2.2. Установить пакеты: `composer install`

2.3. Выполнить инициализацию `php init`, Указать 0 Development


3. Сайт

Главный сайт доступен по адресу: http://fotof.local

Админка доступна по адресу: http://fotof.local/admin

Логин от оператора: `operator1`
Пароль от оператора: `operator1`