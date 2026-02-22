<main class="auth">

    <h2 class="auth__heading"><?php echo s($titulo); ?></h2>
    <p class="auth__texto">
        Regístrate para comenzar a aprender o enseñar
    </p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form method="POST" action="/registro" class="formulario">

        <div class="formulario__campo">
            <label for="nombre" class="formulario__label">Nombre</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                class="formulario__input"
                placeholder="Tu Nombre"
                value="<?php echo s($usuario->nombre ?? ''); ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="rol" class="formulario__label">¿Qué quieres ser?</label>
            <select name="rol" id="rol" class="formulario__input">
                <option value="" selected disabled>-- Selecciona --</option>
                <option value="2">Quiero ser Mentor</option>
                <option value="3">Quiero ser Aprendiz</option>
            </select>
        </div>

        <input type="submit" class="formulario__submit" value="Crear Cuenta">

    </form>

    <!-- enlace inferior -->
    <div class="auth__acciones">
        <p>
            ¿Ya tienes una cuenta?
            <a href="/login" class="auth__enlace">Inicia sesión aquí</a>
        </p>
    </div>

</main>