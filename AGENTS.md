# Tlamati Access - Guía para Agentes de IA

## Stack Tecnológico
- **Backend**: Laravel 13 (PHP 8.3+)
- **Base de datos**: PostgreSQL (`pgsql`)
- **Frontend**: Vite + Tailwind CSS 4 + Bootstrap 5
- **Generación de código**: `ibex/crud-generator`

## Comandos Esenciales

### Desarrollo diario
```bash
# Servidor
php artisan serve

# Compilar assets (producción)
npm run build

# Dev server concurrente
composer dev

# Ejecutar tests
composer test  # equivale a: php artisan config:clear && php artisan test
```

### Configuración inicial
```bash
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run build
php artisan storage:link
```

## Estructura del Proyecto

- `app/` → Lógica de negocio (MVC Laravel)
- `database/migrations/` → Migraciones PostgreSQL
- `database/factories/` → Factories para tests
- `database/seeders/` → Seeders para datos iniciales
- `resources/views/` → Vistas Blade
- `routes/` → Definición de rutas API y web

## Herramientas Dev

| Herramienta | Comando | Propósito |
|-------------|---------|-----------|
| Pint (formatter) | `composer install --dev && php artisan pint` | Formateo PSR |
| PHPUnit | `php artisan test` | Tests unitarios |
| Crud-generator | `php artisan crud:make <Model>` | Generar CRUDs |

## Características Clave del Sistema

1. **Autenticación QR dinámica**: Tokens únicos por sesión, uso único
2. **Biometría facial**: Módulo de reconocimiento integrado (OpenCV/Python)
3. **Validación documental IA**: Detección de falsificaciones en IDs oficiales
4. **Notificaciones en tiempo real**: Sistema inter-usuario

## Directrices de Código

- PSR-12 para PHP
- Tailwind CSS para estilos
- Laravel 13 conventions (PHP 8.3+)
- PostgreSQL migrations con seeders

## Notas Importantes

- El proyecto usa `ibex/crud-generator` para generar código CRUD rápidamente
- Los QR se generan dinámicamente con tokens aleatorios + hash criptográfico
- Python se usa para módulos de biometría (no parte del stack PHP)
- Storage link debe configurarse: `php artisan storage:link`
