<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>bloomeur.mx</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/inicio.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <script src="../js/favoritos.js" defer></script>
  <script src="../js/animations.js" defer></script>
  <script src="../js/search.js" defer></script>
</head>

<body>

<header class="navbar">
  <div class="navbar-left">
    <button class="menu-hamburger" id="hamburgerBtn">
        <span></span>
        <span></span>
        <span></span>
      </button>
        
    <nav class="nav-links">
      <a href="./inicio.php">i n i c i o ㅤ</a>
      <a href="./productos.php">t i e n d a ㅤ</a>
      <a href="./contacto.php">c o n t á c t o ㅤ</a>
    </nav>
  </div>

  <div class="navbar-center">
    <div class="star">✶</div>
  </div>

<!-- botones -->

  <div class="navbar-right">
    <button class="icon-btn" onclick="window.location.href='./favoritos.php'"><i class="bi bi-heart" style="color:white; font-size:20px;"></i></button>
    <button class="cart-btn" onclick="window.location.href='./checkout.php'"><i class="bi bi-bag" style="color:white; font-size:20px;"></i></button>
    <button class="icon-btn" onclick="window.location.href='./login.php'"><i class="bi bi-person" style="color:white; font-size:20px;"></i></button>

  </div>
</header>

<!-- HERO BLOOMEUR -->
<section class="bloomeur-hero container">

    <!-- Columna Izquierda -->
    <div class="bloomeur-left">
      <ul class="bloomeur-menu">
        <li><a href="./alimentos.php">ALIMENTOS</a></li>
        <li><a href="./cosmeticos.php">COSMÉTICOS</a></li>
        <li><a href="./hogar.php">HOGAR</a></li>
      </ul>
  
      <!-- Buscador -->
      <div class="bloomeur-search">
        <input type="text" placeholder="Buscar">
        <i class="bi bi-search"></i>
      </div>
  
      <!-- Título -->
      <h1 class="bloomeur-title">BLOOMEUR </h1>
      <p class="bloomeur-subtitle">p r o d u c t o s ㅤo r g á n i c o s</p>
  
      <!-- Botón -->
      <button class="bloomeur-btn">
        <a href="./productos.php">go to shop</a> <span>→</span>
      </button>
  
  
    </div>
  
    <!-- Columna Derecha -->
    <div class="bloomeur-right">
      <img src="../img/bloom.webp" alt="Bloomeur">
    </div>
  
  </section>
  

</body>
</html>

