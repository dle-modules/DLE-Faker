# DLE-Faker
DLE-Модуль для заполнения БД тестовыми данными

![version](https://img.shields.io/badge/version-1.0.0-red.svg?style=flat-square "Version")
![DLE](https://img.shields.io/badge/DLE-10.x-green.svg?style=flat-square "DLE Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/pafnuty/DLE-Faker/blob/master/LICENSE)

## Назнчение
Модуль предназначен для быстрого наполнения DLE-сайта тестовыми новостями в неограниченном количестве.

## Преимущества
- Лёгкий в использовании. Работает на основе [класса faker](https://github.com/fzaninotto/Faker).
- Наполняет БД и структуру сайта приближенными к реальности, данными. Новости разного размера, с картинками, загруженными на сайт, вставленными в текст новостей.
- Добавляет пользователей при необходимоти и загружает для них аватарки на сайт.


## Установка и использование.
- Распаковать содержимое папки **upload** в корень сайта.
- Запустить файл **/faker_install.php**.
- Сренерировать нужное количество новостей с нужными параметрами.
