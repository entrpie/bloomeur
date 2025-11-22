<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>alimentos</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/alimentos.css">
  <script src="../js/cart.js" defer></script>
  <script src="../js/favoritos.js" defer></script>
  <script src="../js/animations.js" defer></script>
  <script src="../js/search.js" defer></script>
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
        <a href="./tienda.php">t i e n d a ㅤ</a>
        <a href="./contacto.php">c o n t á c t o ㅤ</a>
      </nav>
      <div class="hamburger-menu">
        <a href="./alimentos.php" class="menu-item">ALIMENTOS</a>
        <a href="./cosmeticos.php" class="menu-item">COSMÉTICOS</a>
        <a href="./hogar.php" class="menu-item">HOGAR</a>
      </div>
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

  <!-- TIENDA -->
  <main class="tienda-container">
    <!-- Sidebar filtros -->
    <aside class="filters">
      <div>
        <h3>Filters</h3>
        <div class="filter-list">
          <button onclick="window.location.href='./tienda.php'">(ALL)</button>
          <button onclick="window.location.href='./alimentos.php'" style="font-weight: 600;">ALIMENTOS</button>
          <button onclick="window.location.href='./cosmeticos.php'">COSMÉTICOS</button>
          <button onclick="window.location.href='./hogar.php'">HOGAR</button>
        </div>
      </div>

      <div class="accordion">
        <div class="accordion-title">
        </div>
      </div>
    </aside>

    <!-- Productos -->
    <section class="products-area">
      <div class="page-header">
        <p class="breadcrumb">Home / tienda / alimentos</p>
        <h1>ALIMENTOS</h1>
        <div class="search-bar">
          <i class="bi bi-search"></i>
          <input type="text" placeholder="Buscar">
        </div>
      </div>

      <div class="products-grid">
        <article class="product-card">
          <img src="../img/jengibre.webp" alt="Kombucha Jengibre y limón">
          <div class="product-meta">ALIMENTOS</div>
          <div class="product-name">Kombucha de Jengibre y Limón</div>
          <div class="product-footer">
            <span class="product-price">$80</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
          </div>
        </article>

        <article class="product-card">
          <img src="../img/snack.jpeg" alt="Snacks artesanales">
          <div class="product-meta">ALIMENTOS</div>
          <div class="product-name">Pretzels Salados</div>
          <div class="product-footer">
            <span class="product-price">$100</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
          </div>
        </article>

        <article class="product-card">
          <img src="../img/miel.webp" alt="Miel de agave">
          <div class="product-meta">ALIMENTOS</div>
          <div class="product-name">Mayonesa Vegana</div>
          <div class="product-footer">
            <span class="product-price">$280</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
          </div>
        </article>

        <article class="product-card">
          <img src="../img/happea.webp" alt="Botana Happea">
          <div class="product-meta">ALIMENTOS</div>
          <div class="product-name">Snacks de papa</div>
          <div class="product-footer">
            <span class="product-price">$160</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
          </div>
        </article>

        <article class="product-card">
          <img src="../img/days.webp" alt="Two Days">
          <div class="product-meta">ALIMENTOS</div>
          <div class="product-name">Two Days</div>
          <div class="product-footer">
            <span class="product-price">$70</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
          </div>
        </article>

        <article class="product-card">
          <img src="../img/miel3.webp" alt="HELLA BEAUTY">
          <div class="product-meta">ALIMENTOS</div>
          <div class="product-name">Miel artesanal de abaje</div>
          <div class="product-footer">
            <span class="product-price">$99</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
          </div>
        </article>
      </div>
    </section>
  </main>

</body>
</html>

