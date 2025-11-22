<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pago con tarjeta</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/pagotargeta.css">
  <script src="../js/cart.js" defer></script>
  <script src="../js/validation.js" defer></script>
  <script src="../js/animations.js" defer></script>
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

  <!-- PAGO TARJETA CONTAINER -->
  <main class="pago-tarjeta-container">
    <div class="pago-header">
      <a href="./formadepago.php" class="back-link">
        <i class="bi bi-arrow-left"></i>
        Volver
      </a>
      <h1>PAGO CON TARJETA</h1>
    </div>

    <div class="pago-tarjeta-wrapper">
      <section class="card-form-section">
        <form class="card-form" id="cardForm">
          <div class="form-group">
            <label for="cardNumber">NÚMERO DE TARJETA</label>
            <div class="card-input-wrapper">
              <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19" required>
              <div class="card-icons">
                <i class="bi bi-credit-card"></i>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="cardName">NOMBRE EN LA TARJETA</label>
            <input type="text" id="cardName" name="cardName" placeholder="JUAN PÉREZ" required>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="expiryDate">FECHA DE EXPIRACIÓN</label>
              <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/AA" maxlength="5" required>
            </div>
            <div class="form-group">
              <label for="cvv">CVV</label>
              <input type="text" id="cvv" name="cvv" placeholder="123" maxlength="4" required>
            </div>
          </div>

          <div class="form-group">
            <label class="checkbox-label">
              <input type="checkbox" name="saveCard">
              <span>Guardar tarjeta para futuras compras</span>
            </label>
          </div>

          <button type="submit" class="pay-btn">
            <i class="bi bi-lock-fill"></i>
            PAGAR AHORA
          </button>
        </form>

        <div class="security-info">
          <i class="bi bi-shield-check"></i>
          <p>Tu información está protegida con encriptación SSL</p>
        </div>
      </section>

      <aside class="order-summary">
        <h2>RESUMEN DEL PEDIDO</h2>
        <div class="order-items-summary" id="orderSummary">
          <!-- Se cargará dinámicamente -->
        </div>
        <div class="summary-totals">
          <div class="summary-row">
            <span>Subtotal</span>
            <span id="subtotal">$0.00</span>
          </div>
          <div class="summary-row">
            <span>Envío</span>
            <span id="shipping">$99.00</span>
          </div>
          <div class="summary-row total">
            <span>Total</span>
            <span id="total">$99.00 MXN</span>
          </div>
        </div>
      </aside>
    </div>
  </main>

  <script>
    // Formatear número de tarjeta
    document.getElementById('cardNumber').addEventListener('input', function(e) {
      let value = e.target.value.replace(/\s/g, '');
      let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
      e.target.value = formattedValue;
    });

    // Formatear fecha de expiración
    document.getElementById('expiryDate').addEventListener('input', function(e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length >= 2) {
        value = value.substring(0, 2) + '/' + value.substring(2, 4);
      }
      e.target.value = value;
    });

    // Solo números para CVV
    document.getElementById('cvv').addEventListener('input', function(e) {
      e.target.value = e.target.value.replace(/\D/g, '');
    });

    // Cargar resumen del pedido
    document.addEventListener('DOMContentLoaded', () => {
      if (typeof cart !== 'undefined') {
        const items = cart.items;
        const summaryContainer = document.getElementById('orderSummary');
        const subtotalEl = document.getElementById('subtotal');
        const totalEl = document.getElementById('total');

        if (items.length === 0) {
          summaryContainer.innerHTML = '<p>No hay productos en el carrito</p>';
          return;
        }

        let html = '';
        items.forEach(item => {
          const price = parseFloat(item.price.replace(/[^0-9.]/g, '')) || 0;
          html += `
            <div class="summary-item">
              <span>${item.name} x${item.quantity}</span>
              <span>$${(price * item.quantity).toFixed(2)}</span>
            </div>
          `;
        });
        summaryContainer.innerHTML = html;

        const subtotal = cart.getSubtotal();
        const shipping = 99;
        const total = subtotal + shipping;

        if (subtotalEl) subtotalEl.textContent = `$${subtotal.toFixed(2)}`;
        if (totalEl) totalEl.textContent = `$${total.toFixed(2)} MXN`;
      }
    });

    // Manejar envío del formulario
    document.getElementById('cardForm').addEventListener('submit', function(e) {
      e.preventDefault();
      alert('¡Pago procesado exitosamente! Gracias por tu compra.');
      if (typeof cart !== 'undefined') {
        cart.clearCart();
      }
      window.location.href = './inicio.php';
    });
  </script>

</body>
</html>

