// Sistema de favoritos usando localStorage
class Favoritos {
  constructor() {
    this.items = this.loadFavoritos();
    this.updateFavoritosBadge();
  }

  // Cargar favoritos desde localStorage
  loadFavoritos() {
    const saved = localStorage.getItem('bloomeur_favoritos');
    return saved ? JSON.parse(saved) : [];
  }

  // Guardar favoritos en localStorage
  saveFavoritos() {
    localStorage.setItem('bloomeur_favoritos', JSON.stringify(this.items));
    this.updateFavoritosBadge();
  }

  // Agregar producto a favoritos
  addFavorito(product, button = null) {
    const existingItem = this.items.find(item => item.id === product.id);
    
    if (!existingItem) {
      this.items.push({
        ...product,
        size: 'One size',
        dateAdded: new Date().toISOString()
      });
      this.saveFavoritos();
      
      // Actualizar estado visual del botón
      if (button) {
        button.classList.add('active');
        const icon = button.querySelector('i');
        if (icon) {
          icon.classList.remove('bi-heart');
          icon.classList.add('bi-heart-fill');
        }
        
        // Animación
        button.style.transform = 'scale(1.2)';
        setTimeout(() => {
          button.style.transform = 'scale(1)';
        }, 300);
      }
      
      this.showNotification('Producto agregado a favoritos');
      return true;
    } else {
      // Remover si ya está en favoritos
      this.removeFavorito(product.id, button);
      return false;
    }
  }

  // Remover producto de favoritos
  removeFavorito(productId, button = null) {
    this.items = this.items.filter(item => item.id !== productId);
    this.saveFavoritos();
    
    // Actualizar estado visual del botón
    if (button) {
      button.classList.remove('active');
      const icon = button.querySelector('i');
      if (icon) {
        icon.classList.remove('bi-heart-fill');
        icon.classList.add('bi-heart');
      }
    }
    
    // Actualizar todos los botones de favoritos en la página
    document.querySelectorAll(`.favorito-btn[data-id="${productId}"]`).forEach(btn => {
      btn.classList.remove('active');
      const icon = btn.querySelector('i');
      if (icon) {
        icon.classList.remove('bi-heart-fill');
        icon.classList.add('bi-heart');
      }
    });
    
    this.showNotification('Producto eliminado de favoritos');
  }

  // Verificar si un producto está en favoritos
  isFavorito(productId) {
    return this.items.some(item => item.id === productId);
  }

  // Obtener total de favoritos
  getTotalFavoritos() {
    return this.items.length;
  }

  // Actualizar badge del botón de favoritos
  updateFavoritosBadge() {
    const totalFavoritos = this.getTotalFavoritos();
    const favoritosButtons = document.querySelectorAll('.icon-btn .bi-heart');
    
    favoritosButtons.forEach(btn => {
      const button = btn.closest('.icon-btn');
      if (!button) return;
      
      // Remover badge existente
      const existingBadge = button.querySelector('.favoritos-badge');
      if (existingBadge) {
        existingBadge.remove();
      }
      
      // Agregar nuevo badge si hay items
      if (totalFavoritos > 0) {
        const badge = document.createElement('span');
        badge.className = 'favoritos-badge';
        badge.textContent = totalFavoritos;
        button.style.position = 'relative';
        button.appendChild(badge);
      }
    });
  }

  // Mostrar notificación
  showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'favoritos-notification';
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

  // Renderizar favoritos en la página
  renderFavoritos() {
    const favoritosItems = document.getElementById('favoritosItems');
    if (!favoritosItems) return;

    // Limpiar contenido
    favoritosItems.innerHTML = '';

    if (this.items.length === 0) {
      favoritosItems.innerHTML = `
        <div class="empty-state">
          <i class="bi bi-heart"></i>
          <p>Tu lista de favoritos está vacía</p>
          <a href="./productos.php" class="shop-link">Explorar productos</a>
        </div>
      `;
      return;
    }

    // Renderizar items
    this.items.forEach(item => {
      const favoritoItem = document.createElement('div');
      favoritoItem.className = 'favorito-item';
      favoritoItem.innerHTML = `
        <img src="${item.image}" alt="${item.name}">
        <div class="favorito-details">
          <div class="favorito-name">${item.name}</div>
          <div class="favorito-price">${item.price}</div>
          <div class="favorito-size">Talla: One size</div>
        </div>
        <div class="favorito-actions">
          <button class="add-to-bag-btn" data-id="${item.id}">Agregar al carrito</button>
          <div class="favorito-links">
            <a href="#" class="edit-link">Editar</a>
            <a href="#" class="remove-link" data-id="${item.id}">Eliminar</a>
            <a href="#" class="comment-link">Agregar comentario</a>
          </div>
        </div>
      `;
      favoritosItems.appendChild(favoritoItem);
    });

    // Event listeners
    favoritosItems.querySelectorAll('.remove-link').forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        const productId = link.getAttribute('data-id');
        this.removeFavorito(productId);
        this.renderFavoritos();
      });
    });

    favoritosItems.querySelectorAll('.add-to-bag-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const productId = btn.getAttribute('data-id');
        const item = this.items.find(i => i.id === productId);
        if (item && typeof cart !== 'undefined') {
          cart.addProduct(item);
          this.showNotification('Producto agregado al carrito');
        }
      });
    });
  }

  // Agregar todos al carrito
  addAllToBag() {
    if (this.items.length === 0) {
      this.showNotification('No hay productos en favoritos');
      return;
    }

    if (typeof cart === 'undefined') {
      this.showNotification('Error: sistema de carrito no disponible');
      return;
    }

    this.items.forEach(item => {
      cart.addProduct(item);
    });

    this.showNotification(`${this.items.length} productos agregados al carrito`);
  }
}

// Inicializar favoritos global
const favoritos = new Favoritos();

// Función para agregar a favoritos desde el botón
function addToFavoritos(button) {
  // Prevenir doble clic
  if (button.disabled) return;
  
  // Buscar en .producto-card (productos.php) o .product-card (tienda.php)
  const productCard = button.closest('.producto-card') || button.closest('.product-card');
  if (!productCard) return;

  // Extraer datos del producto
  const img = productCard.querySelector('img');
  let nombre = '';
  let categoria = '';
  let precio = '';

  // Intentar formato de productos.php primero (.nombre, .categoria, .precio)
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
  
  // Guardar ID en el botón para referencia
  button.setAttribute('data-id', productId);

  // Obtener la ruta de la imagen
  let imagePath = '';
  if (img) {
    imagePath = img.src;
    if (!imagePath.startsWith('http') && !imagePath.startsWith('data:')) {
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

  favoritos.addFavorito(product, button);
}

// Event listeners cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
  // Actualizar badge al cargar la página
  favoritos.updateFavoritosBadge();

  // Agregar event listeners a todos los botones de favoritos
  document.querySelectorAll('.favorito-btn, .heart-btn').forEach(btn => {
    // Verificar si el producto ya está en favoritos
    const productCard = btn.closest('.producto-card') || btn.closest('.product-card');
    if (productCard) {
      const nombre = productCard.querySelector('.nombre')?.textContent.trim() || 
                     productCard.querySelector('.product-name')?.textContent.trim() || '';
      if (nombre) {
        const productId = nombre.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
        if (favoritos.isFavorito(productId)) {
          btn.classList.add('active');
          const icon = btn.querySelector('i');
          if (icon) {
            icon.classList.remove('bi-heart');
            icon.classList.add('bi-heart-fill');
          }
        }
        btn.setAttribute('data-id', productId);
      }
    }
    
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      addToFavoritos(btn);
    });
  });

  // Si estamos en favoritos.php, renderizar items
  if (document.getElementById('favoritosItems')) {
    favoritos.renderFavoritos();
  }

  // Botón agregar todo al carrito
  const addAllBtn = document.getElementById('addAllToBag');
  if (addAllBtn) {
    addAllBtn.addEventListener('click', () => {
      favoritos.addAllToBag();
    });
  }

  // Botones de acción
  const updateBtn = document.getElementById('updateWishlist');
  if (updateBtn) {
    updateBtn.addEventListener('click', (e) => {
      e.preventDefault();
      favoritos.renderFavoritos();
      favoritos.showNotification('Favoritos actualizados');
    });
  }

  const shareBtn = document.getElementById('shareWishlist');
  if (shareBtn) {
    shareBtn.addEventListener('click', (e) => {
      e.preventDefault();
      if (navigator.share) {
        navigator.share({
          title: 'Mis Favoritos - Bloomeur',
          text: 'Mira mis productos favoritos en Bloomeur',
          url: window.location.href
        });
      } else {
        // Fallback: copiar al portapapeles
        navigator.clipboard.writeText(window.location.href);
        favoritos.showNotification('Enlace copiado al portapapeles');
      }
    });
  }
});


