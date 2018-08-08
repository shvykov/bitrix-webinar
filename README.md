# Вебинар по CMS 1C-Bitrix

## Вебинар №1

1. Полезные ссылки:
    - phpDoc
        - https://docs.phpdoc.org/references/phpdoc/index.html
        - https://ru.wikipedia.org/wiki/PHPDoc
    - 1C-Bitrix
        - https://www.1c-bitrix.ru
        - https://www.1c-bitrix.ru/download/cms.php
        - Документация
            - https://dev.1c-bitrix.ru/api_help/
            - https://dev.1c-bitrix.ru/api_d7/index.php
        - Чистая установка системы
            - https://bx-cert.ru/advices/33/kak-ustanovit-chistuyu-cms-1s-bitriks/
    - Git
        - https://htmlacademy.ru/blog/86-useful-commands-for-working-with-git
        - https://proglib.io/p/git-cheatsheet/
    - PSR стандарты
        - https://www.php-fig.org/psr/psr-1/
        - https://www.php-fig.org/psr/psr-2/
        - https://www.php-fig.org/psr/psr-4/
        - [ru] http://svyatoslav.biz/misc/psr_translation/

2. Требования к коду и файлам
   * Все файлы в кодировке UTF-8 w/o BOM.
   * Код пишется согласно стандартам [PSR-2](http://www.php-fig.org/psr/psr-2/). 
   * Именование методов, переменных camelCase. Именование классов CamelCase.
   * Формат наименования переменных camelCase с указанием типа переменной в начале, из имени переменной должно быть точно 
   понятно к чему она относится:
       * s - строка или текст `$sStingName = ''`
       * b - булево значение `$bFlag = true`
       * i - число (дробное и целое) `$iHeight = 100`
       * o - объект какого-либо класса `$oDate = new \DateTime()`
       * ar - массив данных `$arResult = []`
       * r - тип resource `$rOpenFile`
   * Все классы, методы, функции должны быть с комментариями [phpDoc](https://phpdoc.org/).
   * Все php файлы не должны содержать закрывающего `?>`
   * Тело каждой управляющей конструкции должно быть заключено в фигурные скобки. Запрещено пропускать `{}`, даже если 
   конструкция состоит из одной строки.
   
3. Задание вебинара
    - Изучить требования к коду и файлам проекта
    - Изучить PSR
    - Поднять web-server (PHP 5.6 и выше, MySQL 5.6 и выше)
    - Развернуть чистый битрикс проект
    - Склонировать репозиторий
    - Доработать компонент
        - Создать инфоблок для хранения информации о пользователях - Пользователи
        - Модифицировать метод getUsersList, чтобы данные возвращались из инфоблока Пользователи
        - Расставить phpDoc по классу компонента
        
        
## Вебинар №2

1. Полезные ссылки:
    - Composer 
        - https://getcomposer.org
        - https://phpprofi.ru/blogs/post/52
        - https://packagist.org
    - Валидация данных
        - http://laravel.su/docs/5.0/validation
        - https://laravel.ru/docs/v5/validation
        - https://github.com/ylabio/ylab.validation
    - Необходимые библиотеки 
        - https://packagist.org/packages/illuminate/validation
        - https://packagist.org/packages/robmorgan/phinx
    - Миграции https://phinx.org
    
2. Задание вебинара
    - Изучить материал полезных ссылок
    - Поставить себе через композер phinx
    - Поставить себе через композер illuminate/validation
    - Написать миграцию по созданию ИБ (phinx)
        - Расширить информацию о пользователе, новыми свойствами: дата рождения (формат 01.01.1980), номер телефона 
        (формат +79210000000), свойство список - город (варианты Москва, Санкт-Петербург, Казань) 
    - Установить git репу https://github.com/ylabio/ylab.validation (можно добавить в свою репу код модуля)
    - Создать компонент добавления пользователя с валидацией
        - Имя может содержать любые данные
        - Все поля компонента обязательны
        - При успешном сохранении выводим соответствующее сообщение, в противном случае список ошибок
    
## Вебинар №3
    ...