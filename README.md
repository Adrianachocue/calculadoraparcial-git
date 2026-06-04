# Calculadora CI

[![PHP Continuous Integration](https://github.com/Adrianachocue/calculadoraparcial-git/actions/workflows/php-ci.yml/badge.svg?branch=master)](https://github.com/Adrianachocue/calculadoraparcial-git/actions/workflows/php-ci.yml)

## GitHub Actions CI

## Enlace público del repositorio

https://github.com/Adrianachocue/calculadoraparcial-git.git

## Descripción

Proyecto desarrollado en PHP que implementa una calculadora básica con operaciones aritméticas. El proyecto incluye pruebas unitarias utilizando PHPUnit y un flujo de Integración Continua (CI) mediante GitHub Actions para validar automáticamente el funcionamiento del código.

## Tecnologias utilizadas
PHP
Composer
PHPUnit
Git
GitHub
GitHub Actions

## Objetivo del parcial
Este proyecto muestra el uso de PHP con Composer, pruebas unitarias con PHPUnit y un flujo de Integración Continua con GitHub Actions.

## Instrucciones
1. Clonar el repositorio.
2. Abrir el proyecto en Visual Studio Code.
3. Instalar las dependencias con:
   - `composer install`

## Ejecución local
Para ver la calculadora en el navegador:
1. Abrir una terminal en la carpeta del proyecto.
2. Ejecutar este comando en PowerShell:

   php -S 127.0.0.1:8000

3. Abrir en el navegador:

   http://127.0.0.1:8000

> Si el servidor no arranca por el puerto 8000, prueba con:
>
>   php -S 127.0.0.1:8080
>
> y luego abre:
>
>   http://127.0.0.1:8080

## Ejecución de pruebas
- Ejecutar `.\vendor\bin\phpunit tests` en PowerShell

## Integración Continua
El workflow de GitHub Actions está en `.github/workflows/php-ci.yml` y ejecuta:
- checkout del repositorio
- configuración de PHP 8.2
- instalación de dependencias con Composer
- ejecución de PHPUnit

## Estructura del proyecto
src/: Código fuente de la calculadora.
tests/: Pruebas unitarias.
vendor/: Dependencias instaladas por Composer.
.github/workflows/: Configuración de GitHub Actions.

## Integrantes

- Nombre completo integrante 1 luz adriana chocue 
- Nombre completo integrante 2 eyder andres acalo
