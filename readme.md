## Requisitos
- instalar composer

## Para instalar debes seguir los siguientes pasos

- Descarga el proyecto en tu pc.
- Edita el archivo .env.example (renombra y deja solo .env).
- Dentro del archivo .env encontraras DB_DATABASE, reemplaza la palabra laravel por "apirestangular"
- Abre tu terminal y ubicate en la carpeta del proyecto.
- Ingresa el comando "composer install".
- Crea una base de datos de nombre apirestangular.
- Ejecuta en tu terminal, "php artisan config:cache".
- Ejecuta en tu terminal, "php artisan migrate".

#Si todo ha ido bien podras ejecutar el sistema de manera local con el comando "php artisan serve"
