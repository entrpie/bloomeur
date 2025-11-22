<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sign in</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/signin.css">
  <script src="../js/animations.js" defer></script>
  <script src="../js/menu.js" defer></script>
</head>
<body>

  <div class="signin-container">
    <!-- Left Panel: Sign Up Form -->
    <div class="signin-panel">
      <div class="signin-content">
        <h1 class="signin-title">ㅤCREAR CUENTA ✶</h1>
        <p class="signin-subtitle">Únete a bloomeur.mx y descubre los mejores productos orgánicos</p>
        
        <!-- Social Login Buttons -->
        <div class="social-login">
          <button class="social-btn google-btn">
            <i class="bi bi-google"></i>
            <span>Continuar con Google</span>
          </button>
          
          <button class="social-btn apple-btn">
            <i class="bi bi-apple"></i>
            <span>Continuar con Apple</span>
          </button>
          
          <button class="social-btn facebook-btn">
            <i class="bi bi-facebook"></i>
            <span>Continuar con Facebook</span>
          </button>
        </div>
        
        <div class="divider">
          <span>o</span>
        </div>
        
        <!-- Registration Form -->
        <form class="signin-form" id="signinForm">
          <div class="form-group">
            <label for="fullname">NOMBRE COMPLETO</label>
            <input type="text" id="fullname" name="fullname" placeholder="Ingresa tu nombre completo" required>
          </div>
          
          <div class="form-group">
            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email" placeholder="tu@correo.com" required>
          </div>
          
          <div class="form-group">
            <label for="password">CONTRASEÑA</label>
            <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" required minlength="8">
          </div>
          
          <div class="form-group">
            <label for="confirmPassword">CONFIRMAR CONTRASEÑA</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirma tu contraseña" required>
          </div>
          
          <div class="form-checkbox">
            <label class="terms-label">
              <input type="checkbox" name="terms" required>
              <span>Acepto los <a href="#">términos y condiciones</a> y la <a href="#">política de privacidad</a></span>
            </label>
          </div>
          
          <button type="submit" class="signin-btn">CREAR CUENTA</button>
        </form>
        
        <div class="login-prompt">
          <p>¿Ya tienes una cuenta? <a href="./login.php">Inicia sesión aquí</a></p>
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
    document.getElementById('signinForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirmPassword').value;
      
      if (password !== confirmPassword) {
        alert('Las contraseñas no coinciden');
        return;
      }
      
      // Aquí puedes agregar la lógica de registro
      alert('¡Cuenta creada exitosamente!');
      window.location.href = './inicio.php';
    });

    // Social login buttons
    document.querySelectorAll('.social-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const provider = this.classList.contains('google-btn') ? 'Google' :
                         this.classList.contains('apple-btn') ? 'Apple' : 'Facebook';
        alert(`Iniciando sesión con ${provider}...`);
      });
    });
  </script>

</body>
</html>

