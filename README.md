# Sistema de Gestión de Biblioteca

Este proyecto implementa un sistema de gestión de biblioteca con API REST y una interfaz web en **Blade + TailwindCSS**

Incluye:

-   CRUD de _Libros_, _Autores_, _Usuarios_ y _Préstamos_
-   **Relaciones Eloquent** (muchos a muchos y uno a muchos)
-   **Validaciones FormRequest**
-   **Seeders y Factories** para datos de ejemplo
-   **Interfaz web responsive** con TailwindCSS
-   **Postman Collection** lista para pruebas de API

---

## Tecnologías utilizadas

| Componente    | Versión / Herramienta      |
| ------------- | -------------------------- |
| Framework     | Laravel 11                 |
| Base de datos | PostgreSQL                 |
| Frontend      | Blade + TailwindCSS        |
| ORM           | Eloquent                   |
| Autenticación | Sanctum (opcional)         |
| API           | RESTful JSON               |
| Tests         | PHPUnit / Laravel TestCase |

---

### 1️⃣ Crear nuevo proyecto Laravel

```bash
composer create-project laravel/laravel biblioteca
```

## Web (Blade)

Rutas disponibles:

-   `/books`: lista y búsqueda en tiempo real
-   `/loans/new`: formulario para crear préstamo
-   `/dashboard`: métricas simples

## Postman

Se incluye `postman_collection.json` con los campos alineados a los modelos/controladores.

## Seeders

Ajustados para 10 autores, 20 libros, 15 usuarios y 10 préstamos. Los factories ahora usan los nombres de columnas reales.
