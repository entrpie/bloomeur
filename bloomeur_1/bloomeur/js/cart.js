// Sistema de carrito usando localStorage
class Cart {
  constructor() {
    this.items = this.loadCart();
    this.updateCartBadge();
  }

  // Cargar carrito desde localStorage
  loadCart() {
    const saved = localStorage.getItem('bloomeur_cart');
    return saved ? JSON.parse(saved) : [];
  }

  // Guardar carrito en localStorage
  saveCart() {
    localStorage.setItem('bloomeur_cart', JSON.stringify(this.items));
    this.updateCartBadge();
  }

  // Agregar producto al carrito
  addProduct(product, animateCard = null) {
    const existingItem = this.items.find(item => item.id === product.id);
    
    if (existingItem) {
      existingItem.quantity += 1;
    } else {
      this.items.push({
        ...product,
        quantity: 1
      });
    }
    
    this.saveCart();
    
    // Animación de tarjeta al carrito si está disponible
    if (animateCard && typeof window.BloomeurAnimations !== 'undefined') {
      window.BloomeurAnimations.animateCardToCart(animateCard, () => {
        this.showNotification('Producto agregado al carrito');
      });
    } else {
      this.showNotification('Producto agregado al carrito');
    }
  }

  // Remover producto del carrito
  removeProduct(productId) {
    this.items = this.items.filter(item => item.id !== productId);
    this.saveCart();
  }

  // Actualizar cantidad de un producto
  updateQuantity(productId, quantity) {
    const item = this.items.find(item => item.id === productId);
    if (item) {
      if (quantity <= 0) {
        this.removeProduct(productId);
      } else {
        item.quantity = quantity;
        this.saveCart();
      }
    }
  }

  // Obtener total de items
  getTotalItems() {
    return this.items.reduce((total, item) => total + item.quantity, 0);
  }

  // Calcular subtotal
  getSubtotal() {
    return this.items.reduce((total, item) => {
      const price = parseFloat(item.price.replace(/[^0-9.]/g, ''));
      return total + (price * item.quantity);
    }, 0);
  }

  // Actualizar badge del carrito
  updateCartBadge() {
    const totalItems = this.getTotalItems();
    const cartButtons = document.querySelectorAll('.cart-btn');
    
    cartButtons.forEach(btn => {
      // Remover badge existente
      const existingBadge = btn.querySelector('.cart-badge');
      if (existingBadge) {
        existingBadge.remove();
      }
      
      // Agregar nuevo badge si hay items
      if (totalItems > 0) {
        const badge = document.createElement('span');
        badge.className = 'cart-badge';
        badge.textContent = totalItems;
        btn.style.position = 'relative';
        btn.appendChild(badge);
      }
    });
  }

  // Mostrar notificación
  showNotification(message) {
    // Crear notificación temporal
    const notification = document.createElement('div');
    notification.className = 'cart-notification';
    notification.textContent = message;
    document.body.appendChild(notification);
    
    setTimeout(() => {
      notification.classList.add('show');
    }, 10);
    
    setTimeout(() => {
      notification.classList.remove('show');
      setTimeout(() => {
        notification.remove();
      }, 300);
    }, 2000);
  }

  // Renderizar productos en checkout
  renderCheckoutItems() {
    const orderCard = document.querySelector('.order-card');
    if (!orderCard) return;

    // Actualizar badge del número de items en la tarjeta
    orderCard.setAttribute('data-item-count', this.getTotalItems());

    // Buscar contenedor de items (antes del totals)
    const totals = orderCard.querySelector('.totals');
    if (!totals) return;

    // Remover contenedor de items existente si existe
    const existingContainer = orderCard.querySelector('.order-items-container');
    if (existingContainer) {
      existingContainer.remove();
    }

    // Remover items individuales que puedan existir
    const existingItems = orderCard.querySelectorAll('.order-item');
    existingItems.forEach(item => item.remove());

    // Si no hay items, mostrar mensaje
    if (this.items.length === 0) {
      const emptyMessage = document.createElement('div');
      emptyMessage.className = 'order-empty';
      emptyMessage.textContent = 'Tu carrito está vacío';
      emptyMessage.style.padding = '2rem';
      emptyMessage.style.textAlign = 'center';
      emptyMessage.style.color = '#9b9485';
      totals.parentNode.insertBefore(emptyMessage, totals);
      return;
    }

    // Insertar items del carrito
    const itemsContainer = document.createElement('div');
    itemsContainer.className = 'order-items-container';
    
    this.items.forEach(item => {
      const orderItem = document.createElement('div');
      orderItem.className = 'order-item';
      const price = parseFloat(item.price.replace(/[^0-9.]/g, '')) || 0;
      const totalPrice = price * item.quantity;
      orderItem.innerHTML = `
        <img src="${item.image}" alt="${item.name}">
        <div class="order-details">
          <strong>${item.name}</strong>
          <a href="#" class="remove-item" data-id="${item.id}">Eliminar</a>
        </div>
        <div class="order-qty">
          <span>(${item.quantity})</span>
          <strong>$${this.formatPrice(totalPrice)}</strong>
        </div>
      `;
      itemsContainer.appendChild(orderItem);
    });

    totals.parentNode.insertBefore(itemsContainer, totals);

    // Actualizar totales
    const subtotal = this.getSubtotal();
    const subtotalEl = totals.querySelector('.totals-row:first-child span:last-child');
    const totalEl = totals.querySelector('.totals-row.total span:last-child');
    
    if (subtotalEl) {
      subtotalEl.textContent = `$${this.formatPrice(subtotal)}`;
    }
    if (totalEl) {
      totalEl.textContent = `$${this.formatPrice(subtotal)} MXN`;
    }

    // Agregar event listeners para eliminar
    itemsContainer.querySelectorAll('.remove-item').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const productId = btn.getAttribute('data-id');
        this.removeProduct(productId);
        this.renderCheckoutItems();
      });
    });
  }

  // Formatear precio
  formatPrice(price) {
    return price.toFixed(2);
  }

  // Limpiar carrito
  clearCart() {
    this.items = [];
    this.saveCart();
  }
}

// Inicializar carrito global
const cart = new Cart();

// Función para agregar producto desde el botón
function addToCart(button) {
  // Prevenir doble clic
  if (button.disabled) return;
  
  // Buscar en .producto-card (productos.html) o .product-card (tienda.html)
  const productCard = button.closest('.producto-card') || button.closest('.product-card');
  if (!productCard) return;

  // Extraer datos del producto
  const img = productCard.querySelector('img');
  let nombre = '';
  let categoria = '';
  let precio = '';

  // Intentar formato de productos.html primero (.nombre, .categoria, .precio)
  nombre = productCard.querySelector('.nombre')?.textContent.trim() || 
           productCard.querySelector('.product-name')?.textContent.trim() || '';
  categoria = productCard.querySelector('.categoria')?.textContent.trim() || 
              productCard.querySelector('.product-meta')?.textContent.trim() || '';
  precio = productCard.querySelector('.precio')?.textContent.trim() || 
           productCard.querySelector('.product-price')?.textContent.trim() || '';

  if (!nombre || !precio) {
    console.error('No se pudieron extraer los datos del producto');
    return;
  }

  // Generar ID único basado en el nombre
  const productId = nombre.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');

  // Obtener la ruta de la imagen (relativa o absoluta)
  let imagePath = '';
  if (img) {
    imagePath = img.src;
    // Si es una ruta absoluta completa, mantenerla; si no, usar el src tal cual
    if (!imagePath.startsWith('http') && !imagePath.startsWith('data:')) {
      // Es una ruta relativa, mantenerla como está
      imagePath = img.getAttribute('src') || imagePath;
    }
  }

  const product = {
    id: productId,
    name: nombre,
    category: categoria,
    price: precio,
    image: imagePath
  };

  // Feedback visual
  if (typeof window.BloomeurAnimations !== 'undefined') {
    window.BloomeurAnimations.showSuccessFeedback(button, '✓');
    window.BloomeurAnimations.preventDoubleClick(button);
  }

  cart.addProduct(product, productCard);
}

// Event listeners cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
  // Actualizar badge del carrito al cargar la página
  cart.updateCartBadge();

  // Agregar event listeners a todos los botones de agregar
  // Botones de productos.html (.add-btn)
  document.querySelectorAll('.add-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      addToCart(btn);
    });
  });

  // Botones de tienda.html (.add-pill)
  document.querySelectorAll('.add-pill').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      addToCart(btn);
    });
  });

  // Hacer el botón del carrito clickeable para ir al checkout
  document.querySelectorAll('.cart-btn').forEach(btn => {
    // Solo agregar el listener si no tiene onclick ya definido
    if (!btn.getAttribute('onclick')) {
      btn.addEventListener('click', () => {
        if (cart.getTotalItems() > 0) {
          window.location.href = './checkout.html';
        }
      });
    }
    btn.style.cursor = 'pointer';
  });

  // Si estamos en checkout, renderizar items
  if (document.querySelector('.order-card')) {
    cart.renderCheckoutItems();
  }
});

