<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>log in</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/login.css">
  <script src="../js/animations.js" defer></script>
  <script src="../js/menu.js" defer></script>
</head>
<body>

  <div class="login-container">
    <!-- Left Panel: Login Form -->
    <div class="login-panel">
      <div class="login-content">
        <h1 class="login-title">✶ LOG IN ✶</h1>
        
        <form class="login-form" id="loginForm">
          <div class="form-group">
            <label for="username">USERNAME</label>
            <input type="text" id="username" name="username" placeholder="Ingresa tu usuario" required>
          </div>
          
          <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
          </div>
          
          <div class="form-options">
            <label class="remember-me">
              <input type="checkbox" name="remember">
              <span>Recordarme</span>
            </label>
            <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
          </div>
          
          <button type="submit" class="login-btn">INICIAR SESIÓN</button>
        </form>
        
        <div class="signup-prompt">
          <p>¿No tienes una cuenta? <a href="./signin.php">Regístrate aquí</a></p>
        </div>
      </div>
    </div>

<!-- Right Panel: Branding -->
<div class="branding-panel">
  <div class="branding-overlay">
    <div class="brand-text">
      <h2>BLOOMEUR</h2>
      <p>p r o d u c t o sㅤo r g á n i c o s</p>
    </div>
  </div>
</div>


  <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();
      // Aquí puedes agregar la lógica de autenticación
      alert('Inicio de sesión exitoso');
      window.location.href = './inicio.php';
    });
  </script>

</body>
</html>

