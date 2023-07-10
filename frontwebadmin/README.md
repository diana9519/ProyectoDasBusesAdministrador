# 🚍Safey - Aplicativo Web para la ANT

Safey es un sistema que permite la gestión y venta de pasajes a usuarios de buses interprovinciales en Ecuador.  
La presente aplicación web tiene como propósito proporcionar la administración de la información de cooperativas y frecuencias a los usuarios de la Agencia Nacional de Tránsito ecuatoriana.

## 👣 Primeros Pasos

Estas instrucciones te guiarán en la configuración y ejecución de la aplicación en tu entorno local para propósitos de desarrollo y pruebas.

### ✔️ Prerrequisitos

Asegúrate de tener instalado lo siguiente:

- [Servidor web](https://www.apachefriends.org/download.html)
  Para este proyecto se utilizó el servidor Apache proporcionado por la herramienta XAMPP [🔗](https://www.apachefriends.org/download.html) pero también puedes utilizar otros servidores similares de tu preferencia.
  💡 Recuerda que este proyecto utiliza PHP, JavaScript y   AJAX. Verifica la compatibilidad con la herramienta que elijas.
  
- [Repositorio - Backend](https://github.com/YadiraAllauca/ServiciosProyectoDAS) 
  Los enlaces a los servicios y la base de datos que se encuentran implicados en el código de este proyecto están alojados en un HostingWeb. Pero puedes verificar la estructura en el repositorio de backend. Te recomendamos revisar la documentación [🔗](https://github.com/YadiraAllauca/ServiciosProyectoDAS)

### ⚙️ Instalación

1. Clona el repositorio en tu máquina local dentro de htdocs del directorio de XAMPP:

```bash
git clone https://github.com/diana9519/ProyectoDasBusesAdministrador.git
```

2. Verificación del funcionamiento
Cuando levantes Apache en XAMPP podrás acceder ya a la app con localhost.
![Localhost](https://cdn.glitch.global/1d3dd682-c1e7-4386-94b7-857b9d3c741b/d1704f62-01c5-433a-bb2e-7b42ad99f853.jpg?v=1688858510973)

⚠️El proyecto incluye la carpeta de Bootstrap con los estilos y componentes necesarios. No es necesario instalar nada adicional.

## 💻 Uso

#### Login
Te permitirá ingresar como administrador. Su funcionalidad en código está presente en **frontwebadmin/login.php**
![Localhost](https://cdn.glitch.global/1d3dd682-c1e7-4386-94b7-857b9d3c741b/fc99b374-43f0-4e2d-af10-b8df6ca241d2.jpg?v=1688858566878)
#### Gestión Cooperativas
En esta interfaz se encuentra implementado un CRUD para Cooperativas a excepción de la eliminación con el fin de mantener la integridad de los datos. Una funcionalidad adicional es la asignación de frecuencias a cooperativas. Los archivos a revisar para el manejo de este módulo son:
* **views/modules/cooperativasadmin.php**
* **views/modules/formularios/cooperativasformadmin.php**
![Localhost](https://cdn.glitch.global/1d3dd682-c1e7-4386-94b7-857b9d3c741b/98cc3c9c-9622-4956-9602-d11b47c33fbc.jpg?v=1688858936830)
#### Gestión Frecuencias
En esta interfaz se encuentra implementado un CRUD para Frecuencias a excepción de la eliminación con el fin de mantener la integridad de los datos. Los archivos a revisar para el manejo de este módulo son:
* **views/modules/frecuenciasadmin.php**
* **views/modules/formularios/frecuenciasformadmin.php**
![Localhost](https://cdn.glitch.global/1d3dd682-c1e7-4386-94b7-857b9d3c741b/98cc3c9c-9622-4956-9602-d11b47c33fbc.jpg?v=1688858936830)

#### Perfil de Usuario
En esta interfaz se encuentra implementada la edición de datos y contraseña del usuario. Los archivos a revisar para el manejo de este módulo son:
* **views/modules/nuevacontraseniaadmin.php**
* **views/modules/perfilusuarioadmin.php**
* **views/modules/usuarioformadmin.php**
![Localhost](https://cdn.glitch.global/1d3dd682-c1e7-4386-94b7-857b9d3c741b/6522b396-fdb2-4337-be3d-139dba6232f4.jpg?v=1688859750351)

## 🤝 Contribución
Si deseas contribuir a este proyecto, sigue los siguientes pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama:
```bash
git checkout -b nombre-de-la-rama
```
3. Realiza los cambios y haz commit:
```bash
git commit -m "Descripción de los cambios"
```
4. Envía los cambios a tu fork:
```bash
git push origin nombre-de-la-rama
```
5. Crea una pull request en este repositorio.

## ©️ Licencia
Este proyecto académico no tiene una licencia específica asignada. Todos los derechos de autor pertenecen a los miembros del equipo de desarrollo. Ten en cuenta que esto significa que no se otorgan permisos explícitos para utilizar, modificar o distribuir el código fuente o los archivos relacionados. Cualquier uso, reproducción o distribución del proyecto debe obtener permiso previo.
## 📧 Contacto
Si tienes alguna pregunta o comentario, puedes contactarte con los miembros del equipo de desarrollo:

* dpinchao9519@uta.edu.ec
* anaranjo1676@uta.edu.ec
* kzamora7938@uta.edu.ec
* tarmijos0985@uta.edu.ec
* yallauca3770@uta.edu.ec

