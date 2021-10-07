# FullStack Developer Test - Heymondo

Prueba de aplicación web sencilla que lea datos de las fuentes públicas de Flickr y muestre las imágenes de la página al usuario.

Al cargar la página, las aplicaciones deben cargar las imágenes de feeds públicos en una vista de lista o cuadrícula.

El usuario debe poder ingresar una palabra clave en un cuadro de búsqueda y hacer clic en un botón de búsqueda y la aplicación debe devolver imágenes con las etiquetas relevantes.

## Arranque 🚀

_Instrucciones básicas:._

1. [Clona o descarga](https://help.github.com/en/github/creating-cloning-and-archiving-repositories/cloning-a-repository) el codigo fuente de la aplicación a tu ordenador.
2. Instala Node.js si no lo tienes instalado. [Pagina de descarga](https://nodejs.org/en/download/) or [via package manager](https://nodejs.org/en/download/package-manager/).
3. Muevete a la carpeta del directorio.
4. Ejecuta `composer install` para coger todas las dependencias laravel
5. Ejecuta `npm install && npm run dev` para coger todas las dependencias vue. Puede ser que esta operación requiera de `sudo`.

```
npm install && npm run dev
```

_o_

```
yarn install yarn dev
```

### Pre-requisitos 📋

- Servidor web (Apache o nginx)

- php 7.4

- node + npm

Configura apache o nginx para exponer la web.

_Este es un ejemplo de configuración para apache_:

```
<VirtualHost *:443>
  DocumentRoot /var/www/finderflickr/public
  ServerName finderflickr.local
  #DirectoryIndex index.php index.html
  ErrorLog /var/log/apache2/finderflickr-error_log
  CustomLog "/var/log/apache2/finderflickr-access_log" "%h %l %u %t \"%r\" %s %b \"%{Referer}i\" \"%{User-agent}i\" \"[ORIGEN %{X-Forwarded-For}i]\""

   SSLEngine on
   SSLCertificateFile /etc/apache2/certificate/finderflickr.crt
   SSLCertificateKeyFile /etc/apache2/certificate/finderflickr.key
  <FilesMatch "\.(cgi|shtml|phtml|php)$">
    SSLOptions +StdEnvVars
  </FilesMatch>
  <Directory "/var/www/finderflickr/public">
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    SSLOptions +StdEnvVars
  </Directory>

  RewriteEngine On
  RewriteCond %{REQUEST_METHOD} OPTIONS
  RewriteRule ^(.*)$ [R=200,L]

</VirtualHost>
```

## Despliegue 📦

Copiar el archivo .env.example a .env

```
cp .env.example .env
```

Añadir al archivo .env los siguientes parametros:

```
FLICKR_URL=https://www.flickr.com/services/feeds/photos_public.gne
```

Genera la app key de laravel:

```
php artisan key:generate
```

y con esto

**`Ya estaría desplegado el proyecto`**

---

## Construido con 🛠️

- [Laravel](https://laravel.com) - El framework PHP
- [Vue](https://vuejs.org) - El framework JS
- [TailwindCSS](https://tailwindcss.com) - El framework CSS

## Autor ✒️

- **Nacho Quero** - [NqEmO](https://github.com/Nqemo)

## Licencia 📄

_privada_

[Nacho](https://github.com/Nqemo) 😊
