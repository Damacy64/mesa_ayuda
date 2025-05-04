# Mesa de Ayuda - Sistema de Gestión de Tickets

![Laravel](https://img.shields.io/badge/Laravel-12-red)
![Livewire](https://img.shields.io/badge/Livewire-3-blue)
![Tailwind CSS](https://img.shields.io/badge/TailwindCSS-3-teal)
![Jetstream](https://img.shields.io/badge/Jetstream-Enabled-purple)

Mesa de Ayuda es un sistema en desarrollo diseñado para facilitar la gestión de incidencias técnicas en una organización. Permite a los usuarios reportar problemas mediante tickets y a los técnicos darles seguimiento eficiente, todo dentro de una interfaz limpia y moderna.

---

## ✨ Características principales

* 🎫 Levantamiento de tickets por parte de los usuarios
* 📊 Métricas clave como:

  * Tiempo promedio de resolución
  * Técnicos con mayor número de tickets resueltos
* 👥 Tres tipos de usuarios con dashboards personalizados:

  * **Administrador:** Gestión completa del sistema
  * **Técnico:** Seguimiento y resolución de tickets
  * **Usuario convencional:** Levantamiento y consulta de tickets propios
* 🔐 Autenticación y registro utilizando **Jetstream** con Livewire
* 📋 Panel de control intuitivo basado en componentes dinámicos

---

## 🧰 Tecnologías utilizadas

* **Laravel 12** – Framework backend robusto
* **Livewire 3** – Interacción reactiva sin necesidad de escribir JavaScript
* **Tailwind CSS** – Estilo moderno y altamente personalizable
* **Jetstream** – Sistema de autenticación y manejo de sesiones

---

## 🚀 Instalación local (entorno de desarrollo)

```bash
# Clonar el repositorio
https://github.com/Damacy64/mesa_ayuda.git

cd mesa_ayuda

# Instalar dependencias PHP
composer install

# Instalar dependencias JS
npm install && npm run dev

# Crear archivo de entorno
cp .env.example .env

# Generar clave de la aplicación
php artisan key:generate

# Migrar base de datos
php artisan migrate
```

---

## 🧑‍💻 Acceso al sistema

1. Regístrate como nuevo usuario o inicia sesión si ya tienes cuenta.
2. El sistema detecta tu rol y te redirige a tu dashboard correspondiente.

---

## 📌 Estado del proyecto

🔧 **En desarrollo** – Se están agregando nuevas funcionalidades y refinando la experiencia de usuario.

---

## 📬 Contribuciones

¡Las contribuciones son bienvenidas! Puedes crear un fork y enviar un pull request.

---

## 📄 Licencia

Este proyecto se encuentra bajo la [licencia MIT](https://opensource.org/licenses/MIT).

---

Gracias por visitar este repositorio. ⭐ ¡Si te gusta el proyecto, considera darle una estrella!
