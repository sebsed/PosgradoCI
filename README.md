**Proyecto iniciado por:** Diego Prieto
	https://github.com/elpriet8
	
**Mantenimiento y desarrollo de contenedores:** Sebastián Castañeda

## Resumen de Tecnología
En esta sección se describe rápidamente la tecnología utilizada en el proyecto y se referencia a la documentación oficial para mayor información. También, se hace una descripción de la estructura de archivos.

- Framework: Laravel versión 8.62.0
	- PHP versión 7.3 o superior
- Frontend: VueJs
- BD: MySQL
- Contenedores PHP y MySQL: Docker y docker-compose

## Estructura del proyecto
Las carpetas importantes a modificar dentro del proyecto se encuentra en la ruta: `/public/storage`. En esta ruta, se pueden encontrar las carpetas donde se almacenan los archivos correspondientes a las imágenes o documentos a presentar en la página web.

En la carpeta `/resources/js` se encuentra parte del código fuente de la página. Estos archivos pueden modificarse utilizando sintaxis de html.

## Instalación en ambiente local con docker
La ventaja de trabajar con contenedores es que se configuran las dependencias sin necesidad de instalarlas en el ambiente local.
Como primer paso sería necesario instalar docker en la plataforma que se esté utilizando. 
- Se recomienda utilizar [Docker Desktop](https://www.docker.com/products/docker-desktop/).

Se recomienda clonar este repositorio para tener acceso a los archivos necesarios.
Para poder levantar y modificar los contenedores se utilizan distintos comandos de Makefile:
- `make build`: Construir o reconstruir el contenedor.
- `make run`: Levantar el contenedor existente.
- `make remove`: Finalizar la ejecución de los contenedores.
- `make update-db`: Actualizar la base de datos con un mysql-dump nombrado `posgradoci_dump.sql`.

### Errores comunes
#### Actualización de base de datos
Para actualizar la base de datos, se recomienda tener una copia de la misma en un ambiente local y modificarla.
Finalmente, hacer un mysql-dump de la base de datos en local y guardarlo en la carpeta base del proyecto con el nombre `posgradoci-dump.sql`.
Finalmente, ejecutar el comando `make update-db`.

#### Comunicación entre contenedores
Es posible que en un principio existan problemas de comunicación entre los contenedores `web` y `db`. Para asegurar que exista un enlace entre ambos es necesario seguir los siguientes pasos:
1. Levantar contenedores.
2. Ejecutar el comando `make update-db`.
3. Inspeccionar el contenedor de la base de datos:
	- Ejecutar el comando `docker ps` para obtener el id del contenedor `db`.
	- Ejecutar el comando `docker inspect -f '{{range.NetworkSettings.Networks}}{{.IPAddress}}{{end}}' <id-contenedor>`
4. Poner la ip obtenida en la variable DB_HOST en el archivo `.env` para poder conectarlo con el contenedor web`.

## Instalación en ambiente local sin docker
Para poder ejecutar el proyecto de forma local se requieren instalar algunas dependencias primero:
- Composer, administrador de paquetes de php,
- NPM administrador de paquetes de node/js
- PHP versión 7.3 o superior

>Para apoyo se proporcionan los siguientes sitios oficiales:
>- https://getcomposer.org/
>- https://nodejs.org/en/

### Ejecución del proyecto
Una vez que se han instalado las dependencias, composer, npm y la versión correcta de php, se puede proceder a clonar el repositorio del proyecto e instalar las librerias correspondientes, los pasos son los siguientes:
- Clonar repositorio
- Instalar dependencias del proyecto

### Compilación de manera local
Para compilar la página web de manera local y poder observar los cambios, es necesario contar con alguna herramienta que permita levantar un ambiente de servidor local. 
	Se recomienda el uso de MAMP, ya sea en MacOS o en Windows.

Los comandos a ejecutar para compilar (con las dependencias propuestas en el resumen de tecnología), son: 
```bash
npm run dev 
php artisan serve
```
El primer comando permite la compilación y el segundo comando levanta la página web

Se recomienda instalar `yarn` para poder realizar la compilación de manera más ágil. En este caso, la compilación sería:
```bash
yarn dev
php artisan serve
```
La instalación de `yarn` puede hacerse con `npm` o con `homebrew` (MacOS).

