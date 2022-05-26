# Manual para instalar y desplegar la aplicación

**Para poder utilizar la aplicación en local has de tener instalado Symfony,VUE y XAMPP en tu maquina**

- **Symfony:** https://symfony.com/doc/current/setup.html
- **XAMPP:** https://www.apachefriends.org/es/index.html
- **VUE:** https://es.vuejs.org/v2/guide/installation.html


## Backend
- Clona el repositorio y abre la carpeta "**back > quiz**" con Visual Studio Code u otro editor de codigo.
- Abre el terminal del editor de codigo y ejecute la orden **symfony server:start -d**.
- Abre XAMPP, incia Apache y MySQL, tras esto pulse el boton Admin de MySQL, cree una base de datos llamada **quiz** e importe el fichero **quiz.sql** que encontrara en la carpeta **back**.
- En el fichero .env añade las credenciales de tu base de datos.

## Frontend

