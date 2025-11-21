# Web personal - David Torres

Mi proyecto consistio en un sitio web personal diseñado para presentar mi biografia y para describirme como estudiante de Ingeniería en Tecnologías de la Información. 
El desarrollo se centra en un diseño moderno y responsivo, con integración de backend para la gestión de contacto.

## Acceso al Proyecto
Use un hosting gratuito llamado infinityfree para subir mi sitio web, el sitio ya se encuentra desplegado y 100% funcional
Enlace: **(http://david-web.free.nf)**

---

## Las tecnologías utilizadas fueron:
* **Frontend:** HTML5, Tailwind CSS y Lucide Icons.
* **Backend:** PHP para procesamiento de datos.
* **Hosting:** InfinityFree.

---

## Estructura de mi sitio
El proyecto consta de tres secciones principales:

1.  **Inicio (`index.html`):** Pantalla de bienvenida basado en el inicio de Linkedin con accesos rápidos y resumen de habilidades.
2.  **Sobre Mí (`biografia.html`):** Detalle de formación académica (UTPL), certificaciones y stack tecnológico.
3.  **Contacto (`contacto.html`):** Formulario funcional para el envío de mensajes.

---

## Funcionamiento del Formulario
El archivo `enviar.php` procesa los datos del formulario de la siguiente manera:

1.  Recibe y valida los datos como nombre, email, mensaje vía POST.
2.  **Registro de Datos:** Debido a las restricciones de envío de correos en el hosting gratuito, el sistema guarda automáticamente cada mensaje recibido en un archivo de registro dentro del servidor.
3.  **Verificación:** Los mensajes se almacenan en el archivo: `mensajes_recibidos.txt` y se lo puede visualizar desde el File Manager.
4.  El usuario recibe una confirmación visual inmediata de "Éxito" tras el envío.

---

**Autor:** David Torres | Estudiante de Ingeniería en TI