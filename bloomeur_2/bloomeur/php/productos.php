<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>tienda</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/productos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="../js/cart.js" defer></script>
    <script src="../js/favoritos.js" defer></script>
    <script src="../js/animations.js" defer></script>
    <script src="../js/search.js" defer></script>
    <script src="../js/menu.js" defer></script>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        
        <!-- IZQUIERDA -->
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
            <div class="hamburger-menu">
                <a href="./alimentos.php" class="menu-item">ALIMENTOS</a>
                <a href="./cosmeticos.php" class="menu-item">COSMÉTICOS</a>
                <a href="./hogar.php" class="menu-item">HOGAR</a>
            </div>
        </div>

        <!-- CENTRO -->
        <div class="navbar-center">
            <div class="star">✶</div>
        </div>

        <!-- DERECHA -->
        <div class="navbar-right">

            <input type="text" placeholder="Buscar..." class="searchbar">

            <button class="icon-btn" onclick="window.location.href='./favoritos.php'"><i class="bi bi-heart" style="color:white; font-size:20px;"></i></button>
            <button class="cart-btn" onclick="window.location.href='./checkout.php'"><i class="bi bi-bag" style="color:white; font-size:20px;"></i></button>
            <button class="icon-btn" onclick="window.location.href='./login.php'"><i class="bi bi-person" style="color:white; font-size:20px;"></i></button>         
        </div>
    </nav>

    <!-- NUEVOS PRODUCTOS -->
    <section class="section-title">
        <h2 class="section-title-text">NUEVOS PRODUCTOS</h2>
        <div class="section-title-divider"></div>
    </section>

<!-- PRODUCTOS -->
    <!-- carrusel -->
    <div class="carousel">
        <div class="carousel-track" id="carouselTrack">
            <div class="producto"><img src="../img/oolio.webp" alt=""></div>
            <div class="producto"><img src="../img/skincare.webp" alt=""></div>
            <div class="producto"><img src="../img/crema_aguacate.webp" alt=""></div>
            <div class="producto"><img src="../img/suplemento.webp" alt=""></div>
            <div class="producto"><img src="../img/alice.webp" alt=""></div>
            <div class="producto"><img src="../img/ultra.webp" alt=""></div>
            <div class="producto"><img src="../img/oolio.webp" alt=""></div>
            <div class="producto"><img src="../img/skincare.webp" alt=""></div>
            <div class="producto"><img src="../img/crema_aguacate.webp" alt=""></div>
            <div class="producto"><img src="../img/suplemento.webp" alt=""></div>
            <div class="producto"><img src="../img/alice.webp" alt=""></div>
            <div class="producto"><img src="../img/ultra.webp" alt=""></div>
        </div>
    </div>
    
<!-- MÁS VENDIDOS -->
<section class="section-title">
    <h2 class="section-title-text">LO MÁS VENDIDO</h2>
    <div class="section-title-divider"></div>
</section>


<!-- PRODUCTOS GRID -->
<section class="products-grid">

    <!-- PRODUCTO 1 -->
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

    <!-- PRODUCTO 2 -->
    <article class="product-card">
        <img src="../img/jugoarandano.webp" alt="Jugo de arandano">
        <div class="product-meta">ALIMENTOS</div>
        <div class="product-name">Kombucha de frutos rojos</div>
        <div class="product-footer">
            <span class="product-price">$80</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>

    <!-- PRODUCTO 3 -->
    <article class="product-card">
        <img src="../img/hella.webp" alt="HELLA BEAUTY">
        <div class="product-meta">COSMETICOS</div>
        <div class="product-name">Exfoliante de fresa</div>
        <div class="product-footer">
            <span class="product-price">$299</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>

    <!-- PRODUCTO 4 -->
    <article class="product-card">
        <img src="../img/snack.jpeg" alt="Atom Eats">
        <div class="product-meta">ALIMENTOS</div>
        <div class="product-name">Pretzels salados</div>
        <div class="product-footer">
            <span class="product-price">$100</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>

    <article class="product-card">
        <img src="../img/touchandb.webp" alt="Atom Eats">
        <div class="product-meta">HOGAR</div>
        <div class="product-name">Desinfectante orgánico</div>
        <div class="product-footer">
            <span class="product-price">$100</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>

</section>

<!-- PROMOS -->
<section class="promociones-section">
    <h2 class="promociones-title">PARA TI</h2>
    <div class="promociones-divider"></div>
    <div class="promociones-filters">
        <a href="./tienda.php" class="filter-active">(ALL)</a>
        <a href="./alimentos.php">ALIMENTOS</a>
        <a href="./cosmeticos.php">COSMÉTICOS</a>
        <a href="./hogar.php">HOGAR</a>
    </div>
</section>


<!-- PROMO GRID -->
<section class="products-grid">

    <!-- PRODUCTO 1 -->
    <article class="product-card">
        <img src="../img/miel.webp" alt="Aesop">
        <div class="product-meta">ALIMENTOS</div>
        <div class="product-name">Mayonesa Vegana</div>
        <div class="product-footer">
            <span class="product-price">$280</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>

    <!-- PRODUCTO 2 -->
    <article class="product-card">
        <img src="../img/jabones.webp" alt="ORRIS">
        <div class="product-meta">HOGAR</div>
        <div class="product-name">Jabón corporal</div>
        <div class="product-footer">
            <span class="product-price">$150</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>

    <!-- PRODUCTO 3 -->
    <article class="product-card">
        <img src="../img/vitaminac.webp" alt="Typology">
        <div class="product-meta">COSMETICOS</div>
        <div class="product-name">Vitamina C </div>
        <div class="product-footer">
            <span class="product-price">$699</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>

    <!-- PRODUCTO 4 -->
    <article class="product-card">
        <img src="../img/crema_higo.webp" alt="beAllow">
        <div class="product-meta">COSMETICOS</div>
        <div class="product-name">Crema de higo para manos</div>
        <div class="product-footer">
            <span class="product-price">$200</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>

    <!-- PRODUCTO 5 -->
    <article class="product-card">
        <img src="../img/miel2.webp" alt="Two Days">
        <div class="product-meta">ALIMENTOS</div>
        <div class="product-name">Miel artesanal </div>
        <div class="product-footer">
            <span class="product-price">$80</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>

    <!-- PRODUCTO 6 -->
    <article class="product-card">
        <img src="../img/ludrops.webp" alt="Miel de Agave">
        <div class="product-meta">COSMETICOS</div>
        <div class="product-name">Serum nocturno</div>
        <div class="product-footer">
            <span class="product-price">$280</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>

    <!-- PRODUCTO 7 -->
    <article class="product-card">
        <img src="../img/kombucha.webp" alt="Kit Skincare">
        <div class="product-meta">ALIMENTOS</div>
        <div class="product-name">Kombucha de cítricos</div>
        <div class="product-footer">
            <span class="product-price">$70</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>

    <!-- PRODUCTO 8 -->
    <article class="product-card">
        <img src="../img/exfoliante.webp" alt="Suplemento Ultra">
        <div class="product-meta">HOGAR</div>
        <div class="product-name">Crema exfoliante</div>
        <div class="product-footer">
            <span class="product-price">$120</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>

    <article class="product-card">
        <img src="../img/3bot.webp" alt="Suplemento Ultra">
        <div class="product-meta">HOGAR</div>
        <div class="product-name">Esencia de limocillo</div>
        <div class="product-footer">
            <span class="product-price">$599</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>

    <article class="product-card">
        <img src="../img/serrum.webp" alt="Suplemento Ultra">
        <div class="product-meta">HOGAR</div>
        <div class="product-name">Body mist</div>
        <div class="product-footer">
            <span class="product-price">$520</span>
            <button class="add-pill">Agregar</button>
            <button class="heart-btn"><i class="bi bi-heart"></i></button>
        </div>
    </article>
</section>




<!-- CAMPO -->
<section class="d-campo">
    <div class="d-campo-text">
    <h3>DIRECTO DEL CAMPO A TU MESA, CUIDANDO TU SALUD Y EL PLANETA</h3>
    <h4>En Bloomeur creemos que lo natural siempre es mejor. Por eso trabajamos con pequeños productores locales <br> 
        y marcas responsables que priorizan la salud, la calidad y el respeto por la Tierra. <br> 
        Queremos que cada compra sea una elección consciente y saludable.</h4>
    </div>
</section>


<!-- CAMPO GRID -->
<section class="campo">
    <div class="item i1"><img src="../img/pistache.webp"></div>
    <div class="item i2"><img src="../img/touchandb.webp"></div>
    <div class="item i3"><img src="../img/jengibre.webp"></div>
    <div class="item i4"><img src="../img/papa.webp"></div>
  </section>
  
<!-- FOOTER -->
  <footer class="bloomeur-footer">

    <div class="footer-left">
        <div class="footer-section">
            <p class="footer-heading">BORING STUFF</p>
            <ul>
                <li>PRICING</li>
                <li>ABOUT</li>
                <li>CONTACTS</li>
            </ul>
        </div>
  
        <div class="footer-section">
            <p class="footer-heading">LANGUAGES</p>
            <ul>
                <li>ENG</li>
                <li>ESP</li>
                <li>SVE</li>
            </ul>
        </div>
    </div>
  
    <div class="footer-center">
        <p class="footer-subtitle">by</p>
        <h5 class="footer-logo">BLOO</h5>
        <h6 class="footer-logo">MEUR<br>MX</h6>   
    </div>
  
  
    <div class="footer-bottom">
        <p>ㅤ</p>
        <p>© 2025 — copyright</p>
    </div>
  
  </footer>
  

</body>
</html>
