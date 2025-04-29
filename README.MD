# Sistema de Gestión de Proyectos

## Descripción
Aplicación web desarrollada con Symfony para la gestión de proyectos y empleados. Permite realizar operaciones CRUD en ambas entidades e incluye un sistema de autenticación.

## Características
- **Gestión de empleados**: Crear, ver, editar y eliminar perfiles de empleados
- **Gestión de proyectos**: Administrar la información de proyectos
- **Sistema de autenticación**: Login y registro de usuarios
- **Interfaz intuitiva**: Navegación simple entre las diferentes secciones

## Requisitos
- PHP 8.0+
- Composer
- MySQL/MariaDB
- Extensiones PHP: pdo_mysql, json, xml

## Instalación

```bash
# Clonar repositorio
git clone [https://github.com/sebasmzg/php-symfony-proyectos-empleados]
cd [directorio-proyecto]

# Instalar dependencias
composer install

# Configurar base de datos en .env.local
# DATABASE_URL="mysql://usuario:contraseña@127.0.0.1:3306/db_name"

# Crear base de datos y ejecutar migraciones
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

# Iniciar servidor desarrollo
symfony server:start
```

## Estructura del proyecto

### Controladores principales
- `EmpleadoController`: Gestiona operaciones CRUD para empleados
- `ProyectoController`: Gestiona operaciones CRUD para proyectos
- `SecurityController`: Maneja autenticación (login/logout)
- `RegistrationController`: Gestiona registro de usuarios

### Entidades
- `Empleado`: Almacena información de empleados
- `Proyecto`: Almacena información de proyectos
- `User`: Gestiona usuarios del sistema

## Funcionalidades de autenticación
- **Login**: Acceso mediante email y contraseña
- **Registro**: Creación de nuevas cuentas
- **Logout**: Cierre de sesión con redirección a login
- **Protección de rutas**: Acceso restringido según rol de usuario

## Tecnologías utilizadas
- Symfony 6.x
- Doctrine ORM
- Twig
- MySQL
- PHP 8.x

## Seguridad
- Protección CSRF
- Codificación segura de contraseñas
- Validación de formularios
- Control de acceso por roles