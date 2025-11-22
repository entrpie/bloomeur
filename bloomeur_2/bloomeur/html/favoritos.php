<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>favoritos</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/favoritos.css">
  <script src="../js/cart.js" defer></script>
  <script src="../js/favoritos.js" defer></script>
  <script src="../js/animations.js" defer></script>
  <script src="../js/menu.js" defer></script>
</head>
<body>

  <!-- NAVBAR -->
  <header class="navbar">
    <div class="navbar-left">
      <button class="menu-hamburger">
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

    <div class="navbar-right">
      <button class="icon-btn" onclick="window.location.href='./favoritos.php'"><i class="bi bi-heart" style="color:white; font-size:20px;"></i></button>
      <button class="cart-btn" onclick="window.location.href='./checkout.php'"><i class="bi bi-bag" style="color:white; font-size:20px;"></i></button>
      <button class="icon-btn" onclick="window.location.href='./login.php'"><i class="bi bi-person" style="color:white; font-size:20px;"></i></button>
    </div>
  </header>

  <!-- FAVORITOS -->
  <main class="favoritos-container">
    <h1 class="favoritos-title">FAVORITOS</h1>

    <div class="favoritos-items" id="favoritosItems">
      <!-- Los items se cargarán dinámicamente desde favoritos.js -->
      <div class="empty-state">
        <i class="bi bi-heart"></i>
        <p>Tu lista de favoritos está vacía</p>
        <a href="./productos.php" class="shop-link">Explorar productos</a>
      </div>
    </div>

    <div class="favoritos-actions">
      <div class="actions-left">
        <a href="#" class="action-link" id="updateWishlist">ㅤ</a>
        <a href="#" class="action-link" id="shareWishlist">ㅤ</a>
      </div>
      <button class="add-all-btn" id="addAllToBag">Agregar todo al carrito</button>
    </div>
  </main>

</body>
</html>


