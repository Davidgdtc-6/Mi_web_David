<?php
$status = ""; 
$feedback = "";
$nombre = ""; 
$email = "";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    if (empty($nombre) || empty($email) || empty($mensaje)) {
        $status = "error";
        $feedback = "Faltan datos. Por favor rellena todos los campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $status = "error";
        $feedback = "El formato del correo no es válido.";
    } else {
        
        $fecha = date("Y-m-d H:i:s");
        $registro = "[$fecha] Nuevo Mensaje:\n";
        $registro .= "Nombre: $nombre\n";
        $registro .= "Email: $email\n";
        $registro .= "Mensaje: $mensaje\n";
        $registro .= "-----------------------------------\n\n";
        $destinatario = "gustavotorresc2001@gmail.com"; 
        $asunto = "Contacto Web de: $nombre";
        $headers = "From: web@tudominio.com\r\nReply-To: $email\r\n";
        
        @mail($destinatario, $asunto, $registro, $headers);

        if (file_put_contents("mensajes_recibidos.txt", $registro, FILE_APPEND)) {
            $status = "success";
            $feedback = "¡Mensaje registrado en el sistema correctamente!";
        } else {
            $status = "error";
            $feedback = "Error al guardar los datos en el servidor.";
        }
    }
} else {
    header("Location: contacto.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado del Envío</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-white min-h-screen font-sans flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-100 text-center p-8 md:p-10 relative animate-fade-in-up">
        
        <?php if ($status == "success"): ?>
            <div class="w-20 h-20 bg-green-50 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6 border-4 border-green-100">
                <i data-lucide="check" class="w-10 h-10"></i>
            </div>
            <h1 class="text-3xl font-bold text-slate-900 mb-2 tracking-tight">¡Exitoso!</h1>
            <p class="text-slate-500 mb-8 text-lg">Tu mensaje ha sido guardado en la base de datos del servidor.</p>
            
            <div class="bg-slate-50 rounded-2xl p-6 text-left border border-slate-100 mb-8">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Resumen:</p>
                <div class="flex items-center gap-3 text-slate-700 mb-2 font-medium">
                    <i data-lucide="user" class="w-4 h-4 text-blue-500"></i> <?php echo $nombre; ?>
                </div>
                <div class="flex items-start gap-3 text-slate-600 italic text-sm mt-3 pt-3 border-t border-slate-200">
                    <i data-lucide="message-square" class="w-4 h-4 text-blue-500 mt-0.5"></i> 
                    "<?php echo $mensaje; ?>"
                </div>
            </div>

        <?php else: ?>
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6 border-4 border-red-100">
                <i data-lucide="x" class="w-10 h-10"></i>
            </div>
            <h1 class="text-3xl font-bold text-slate-900 mb-2">Alerta</h1>
            <p class="text-red-500 mb-8 text-lg"><?php echo $feedback; ?></p>
        <?php endif; ?>

        <a href="index.html" class="w-full inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl bg-slate-900 text-white font-bold hover:bg-blue-600 transition-all shadow-lg">
            <i data-lucide="arrow-left" class="w-5 h-5"></i> Volver al Inicio
        </a>
    </div>
    <script>lucide.createIcons();</script>
</body>
</html>