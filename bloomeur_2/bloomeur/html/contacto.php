<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>contacto</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/contacto.css">
  <script src="../js/animations.js" defer></script>
  <script src="../js/menu.js" defer></script>
</head>
<body>

  <!-- CONTACT SECTION -->
  <main class="contact-container">
    <!-- Left Section: Contact Information -->
    <section class="contact-info">
      <h1>Contáctanos! ✶ </h1>
      
      <div class="contact-details">
        <div class="contact-item">
          <span class="contact-label">Email</span>
          <a href="#" class="contact-value">juan.corona.pe@usb.edu.mx</a>
          <a href="#" class="contact-value">frida.escamilla.ol@usb.edu.mx</a>
          <a href="#" class="contact-value">adrian.alvarado.di@usb.edu.mx</a>
        </div>
        
        
        <div class="contact-item">
          <span class="contact-label">Dirección</span>
          <p class="contact-value">Av. Río Mixcoac 48, Insurgentes Mixcoac, Benito Juárez, 03920 Ciudad de México, CDMX</p>
        </div>
      </div>

      <div class="social-section">
        <p class="social-label">Síguenos</p>
        <div class="social-icons">
          <a href="#" class="social-icon" aria-label="Instagram">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="#" class="social-icon" aria-label="Facebook">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="#" class="social-icon" aria-label="LinkedIn">
            <i class="bi bi-linkedin"></i>
          </a>
          <a href="#" class="social-icon" aria-label="Twitter">
            <i class="bi bi-twitter"></i>
          </a>
        </div>
      </div>
    </section>

    <!-- Right Section: Contact Form -->
    <section class="contact-form-section">
      <form class="contact-form" id="contactForm">
        <div class="form-group">
          <input type="text" id="name" name="name" placeholder="Tu nombre completo" required>
        </div>
        
        <div class="form-group">
          <input type="email" id="email" name="email" placeholder="Tu dirección de correo" required>
        </div>
        
        <div class="form-group">
          <textarea id="message" name="message" rows="6" placeholder="Escribe algo...." required></textarea>
        </div>
        
        <button type="submit" class="submit-btn">Enviar Mensaje</button>
      </form>
    </section>
  </main>

  <div class="nav-links">
    <a href="./inicio.php">bloomeur;</a>
  </div>

  <script>
    // Manejar envío del formulario
    document.getElementById('contactForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      
      alert('¡Gracias por tu mensaje! Te contactaremos pronto.');
      this.reset();
    });
  </script>

</body>
</html>

