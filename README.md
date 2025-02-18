```markdown
# Cuestionario ERP y CRM

Este proyecto es una aplicación web que implementa un cuestionario sobre sistemas ERP y CRM. La aplicación incluye funcionalidades de login/registro de usuarios, un cuestionario de 20 preguntas (opción múltiple y verdadero/falso), validación de respuestas en JavaScript, un diseño responsive con soporte para tema claro/oscuro y almacenamiento de resultados en un archivo CSV mediante PHP y una base de datos MySQL.

## Características

- **Login y Registro de Usuarios:**  
  Permite que nuevos usuarios se registren y usuarios existentes inicien sesión.
- **Cuestionario:**  
  20 preguntas teóricas y prácticas sobre ERP y CRM.  
  Tipos de preguntas: opción múltiple y verdadero/falso.
- **Validación de Respuestas:**  
  Validación en el lado del cliente utilizando JavaScript, con un resumen final de resultados.
- **Diseño Responsive y Moderno:**  
  Interfaz adaptable a dispositivos móviles, con opción para cambiar entre tema claro y oscuro.
- **Almacenamiento de Resultados:**  
  Los resultados se guardan en un archivo CSV en el servidor local.
- **Backend en PHP:**  
  Uso de PHP para gestionar el login, registro y procesamiento del cuestionario, integrándose con MySQL para el manejo de usuarios.

## Requisitos Previos

- Servidor local con soporte para PHP y MySQL (por ejemplo, XAMPP, WAMP, MAMP)
- PHP (versión 7.0 o superior)
- MySQL
- Navegador web moderno

## Estructura del Proyecto

```
/TestAutomatic
├── index.php          // Página de login y registro
├── register.php       // Procesa el registro de nuevos usuarios
├── login.php          // Procesa el inicio de sesión
├── quiz.php           // Página del cuestionario
├── submit.php         // Procesa el envío del cuestionario y almacena los resultados en CSV
├── logout.php         // Cierra la sesión del usuario
├── config.php         // Conexión a la base de datos MySQL
├── css/
│   └── style.css      // Estilos globales (incluye tema claro/oscuro y diseño responsive)
├── js/
│   ├── quiz.js        // Lógica para generar y validar el cuestionario
│   └── theme.js       // Funcionalidad para cambiar entre tema claro y oscuro
└── data/
    └── resultados.csv // Archivo CSV para almacenar los resultados del cuestionario
```

## Instalación y Configuración

1. **Clonar el Repositorio:**

   Clona o descarga el proyecto en tu servidor local.  
   Por ejemplo, utilizando Git:
   ```bash
   git clone https://github.com/robzoly/TestAutomatic.git
   ```

2. **Colocar el Proyecto en el Directorio Raíz:**

   Coloca la carpeta del proyecto en el directorio raíz de tu servidor web.  
   En XAMPP, este directorio suele ser `htdocs`.

3. **Configurar la Base de Datos:**

   - Accede a **phpMyAdmin** (normalmente en `http://localhost/phpmyadmin/`).
   - Crea una base de datos llamada `cuestionario_db`.
   - Ejecuta la siguiente consulta SQL para crear la tabla de usuarios:
     ```sql
     CREATE TABLE usuarios (
         id INT AUTO_INCREMENT PRIMARY KEY,
         nombre VARCHAR(100) NOT NULL,
         email VARCHAR(100) NOT NULL UNIQUE,
         password VARCHAR(255) NOT NULL,
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );
     ```
   - Verifica y, de ser necesario, ajusta los parámetros de conexión en el archivo `config.php`:
     ```php
     <?php
     $servername = "localhost";
     $username = "root";
     $password = ""; // Ajusta según tu configuración
     $dbname = "cuestionario_db";

     // Crear conexión
     $conn = new mysqli($servername, $username, $password, $dbname);

     // Verificar conexión
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
     ?>
     ```

4. **Permisos para el Archivo CSV:**

   Asegúrate de que la carpeta `data/` y el archivo `resultados.csv` tengan permisos de escritura para que PHP pueda guardar los resultados.

## Ejecución de la Aplicación

1. **Iniciar el Servidor Local:**

   - Si usas XAMPP, inicia Apache y MySQL desde el panel de control.
   - También puedes usar el servidor PHP embebido. Abre una terminal en la carpeta del proyecto y ejecuta:
     ```bash
     php -S localhost:8000
     ```

2. **Acceder a la Aplicación:**

   - En tu navegador, ingresa a:
     - `http://localhost/mi_cuestionario_erp_crm/index.php` (para XAMPP)
     - o `http://localhost:8000/index.php` (para el servidor PHP embebido).

3. **Uso de la Aplicación:**

   - Regístrate o inicia sesión.
   - Responde el cuestionario de 20 preguntas.
   - Al finalizar, se mostrará un resumen de tus respuestas y se almacenarán los resultados en el archivo CSV.

## Notas Adicionales

- **Validación y Seguridad:**  
  La validación de los formularios se realiza en el lado del cliente mediante JavaScript. Se recomienda implementar validaciones adicionales en el servidor para mayor seguridad.
  
- **Cambio de Tema:**  
  La funcionalidad para cambiar entre tema claro y oscuro está implementada en `js/theme.js`. Puedes agregar un botón en el HTML (por ejemplo, en el header) con el id `themeToggle` para activar esta función.

- **Personalización:**  
  - Puedes modificar y ampliar las preguntas del cuestionario en `js/quiz.js`.
  - El diseño puede ajustarse modificando `css/style.css` para adaptarlo a tus preferencias.

## Licencia

Este proyecto es de código abierto y se puede utilizar, modificar y distribuir según los términos de la licencia que se decida.

```