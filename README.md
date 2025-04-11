# Laravel Auth App 🔐

Proyecto de autenticación desarrollado con **Laravel 10**, pensado como base profesional para aplicaciones modernas que requieren:

- Autenticación con tokens (Sanctum)
- Login y registro desde el navegador
- Gestión de roles: `Administrador` y `Usuario`
- Control de acceso por middleware
- Dashboard visual con datos del usuario
- Vistas estilizadas con CSS externo

---

## ⚙️ Requisitos

- PHP 8.1 o superior
- Composer
- MySQL o SQLite
- Laravel 10

---

## 🚀 Instalación

```bash
git clone https://github.com/TU_USUARIO/TU_REPO.git
cd TU_REPO
composer install
cp .env.example .env
php artisan key:generate
