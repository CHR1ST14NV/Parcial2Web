# Parcial2Web

Parcial 2 090 - 22 - 7443

Este proyecto entrega dos implementaciones del formulario de registro provisto: una en PHP/Apache y otra en Node.js/Express. Ambas experiencias comparten el mismo estilo visual y se ejecutan dentro de contenedores Docker construidos desde un único `Dockerfile` multi-stage.

## Estructura

- `php/public/` – Sitio PHP con `index.php`, `registro.php` y estilos.
- `php/conf.d/` – Ajustes duros de PHP (opcache, timezone, límites).
- `node/` – Aplicación Express con plantillas EJS y middleware de seguridad.
- `Dockerfile` – Define los targets `parcial_php`, `node_dev` y `parcial_js`.
- `docker-compose.yml` – Orquesta ambos servicios listos para producción.
- `docker-compose.override.yml` – Perfil de desarrollo con recarga en caliente.

## Construcción de imágenes

Las imágenes solicitadas (`parcial:php-1` y `parcial:js-1`) se generan con Docker Compose:

```powershell
# Construye ambas imágenes
docker compose build
```

Detrás de escena se ejecutan los targets `parcial_php` y `parcial_js` del `Dockerfile`, asignando automáticamente las etiquetas requeridas.

## Ejecución

```powershell
# Levantar ambos contenedores
docker compose up -d

# Ver servicios
# PHP  -> http://localhost:8080
# Node -> http://localhost:3000
```

Finalizar y limpiar:

```powershell
docker compose down
```

## Modo desarrollo

El archivo `docker-compose.override.yml` habilita edición en vivo.

```powershell
# Ejecutar con el perfil extendido
docker compose -f docker-compose.yml -f docker-compose.override.yml up --build
```

- PHP monta `php/public/` directamente en Apache.
- Node usa el target `node_dev`, instala dependencias de desarrollo (incluyendo `nodemon`) y expone el servidor en `http://localhost:3001`.

## Validación rápida

1. Abrir `http://localhost:8080`, completar el formulario y enviar. Verifica que `registro.php` muestre los datos capturados y el mensaje de bienvenida.
2. Abrir `http://localhost:3000` (o `3001` en modo dev), repetir el formulario. El backend Express valida campos, enmascara la contraseña y presenta el resumen.

Ambos contenedores comparten red `parcial-registry`, lo que facilita futuras integraciones (por ejemplo, compartir una base de datos segura).


