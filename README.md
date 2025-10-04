# Proyecto IMAGENE APPS

## Descripción
Aplicación de gestión de tareas colaborativas con backend en Laravel y Node.js, frontend web en React y app móvil en React Native.

## Requisitos
- PHP 8.3+
- Node.js 18+
- Composer
- npm
- Expo Go (para React Native)
- Git
- SQLite

## Instalación

### 1. Clonar el Repositorio
git clone https://github.com/waltercarvajaldev-rgb/tech-test.git
cd proyecto-auth

### 2. Configurar el Backend PHP (Laravel)
- Navega al directorio `backend-php`:
  cd backend-php
- Instala las dependencias:
  composer install
- Copia el archivo de entorno:
  cp .env.example .env
- Genera la clave de aplicación:
  php artisan key:generate
- Configura la base de datos en `.env`:
  DB_CONNECTION=sqlite
  DB_DATABASE=database/database.sqlite
- Crea la base de datos:
  touch database/database.sqlite
  php artisan migrate
- Registra un usuario de prueba:
  curl -X POST http://localhost:8000/api/register -H "Accept: application/json" -H "Content-Type: application/json" -d "{\"name\":\"Test User\",\"email\":\"test2@prueba.com\",\"password\":\"123456\"}"
- Inicia el servidor:
  php -S 192.168.80.113:8000 -t public

### 3. Configurar el Microservicio Node.js
- Navega al directorio `backend-node`:
  cd backend-node
- Instala las dependencias:
  npm install
- Inicia el microservicio:
  node app.js

### 4. Configurar el Frontend Web (React)
- Navega al directorio `frontend-react`:
  cd frontend-react
- Instala las dependencias:
  npm install
- Ajusta la URL de la API en `src/App.js`:
  - Cambia `const API_URL = 'http://192.168.80.113:8000';` a la IP del servidor local o remoto.
- Inicia la aplicación:
  npm start

### 5. Configurar la App Móvil (React Native)
- Navega al directorio `frontend-mobile`:
  cd frontend-mobile
- Instala las dependencias:
  npm install
- Inicia la aplicación con Expo:
  npx expo start --tunnel
- Escanea el QR con la app Expo Go en tu dispositivo móvil.

## Uso

### Backend PHP
- Inicia el servidor:
  php -S 192.168.80.113:8000 -t public
- Accede a la API en `http://192.168.80.113:8000/api/...`.

### Frontend Web
- Abre `http://localhost:3000` en el navegador.
- Ingresa con `test2@prueba.com` y `123456`.
- Carga proyectos, selecciona uno, carga tareas, completa tareas y ve comentarios.

### App Móvil
- Sigue las instrucciones de Expo para conectar tu dispositivo.
- Ingresa con `test2@prueba.com` y `123456`.
- Carga proyectos, selecciona uno, carga tareas, completa tareas y ve comentarios.

## Notas
- Ajusta `API_URL` en `frontend-react/src/App.js` y `frontend-mobile/app/index.tsx` según la IP del servidor.
- Usa el token devuelto por el registro para autenticar las peticiones API.
