// ============================================
// BLOOMEUR - SISTEMA DE BÚSQUEDA
// ============================================

class SearchSystem {
  constructor() {
    this.products = [];
    this.init();
  }

  init() {
    // Cargar productos de la página actual
    this.loadProducts();
    
    // Agregar event listeners a los campos de búsqueda
    document.querySelectorAll('.searchbar, input[type="text"][placeholder*="Buscar"], .bloomeur-search input').forEach(input => {
      input.addEventListener('input', (e) => this.handleSearch(e.target.value));
      input.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
          e.preventDefault();
          this.performSearch(e.target.value);
        }
      });
    });
  }

  loadProducts() {
    // Cargar productos de las tarjetas en la página
    const cards = document.querySelectorAll('.producto-card, .product-card');
    this.products = Array.from(cards).map(card => {
      const img = card.querySelector('img');
      const nombre = card.querySelector('.nombre')?.textContent.trim() || 
                     card.querySelector('.product-name')?.textContent.trim() || '';
      const categoria = card.querySelector('.categoria')?.textContent.trim() || 
                        card.querySelector('.product-meta')?.textContent.trim() || '';
      const precio = card.querySelector('.precio')?.textContent.trim() || 
                     card.querySelector('.product-price')?.textContent.trim() || '';
      
      return {
        element: card,
        name: nombre.toLowerCase(),
        category: categoria.toLowerCase(),
        price: precio,
        fullText: `${nombre} ${categoria}`.toLowerCase()
      };
    }).filter(p => p.name);
  }

  handleSearch(query) {
    if (!query || query.length < 2) {
      this.showAllProducts();
      return;
    }

    const searchTerm = query.toLowerCase().trim();
    let hasResults = false;

    this.products.forEach(product => {
      const matches = product.fullText.includes(searchTerm) || 
                      product.name.includes(searchTerm) ||
                      product.category.includes(searchTerm);
      
      if (matches) {
        product.element.style.display = '';
        product.element.classList.add('fade-in');
        hasResults = true;
      } else {
        product.element.style.display = 'none';
      }
    });

    // Mostrar mensaje si no hay resultados
    this.showNoResults(hasResults, query);
  }

  performSearch(query) {
    if (!query || query.length < 2) return;
    
    // Guardar búsqueda en localStorage para persistencia
    localStorage.setItem('bloomeur_search', query);
    
    // Si estamos en productos.html, filtrar ahí
    // Si no, redirigir a productos.html con parámetro de búsqueda
    if (window.location.pathname.includes('productos.html')) {
      this.handleSearch(query);
    } else {
      window.location.href = `./productos.html?search=${encodeURIComponent(query)}`;
    }
  }

  showAllProducts() {
    this.products.forEach(product => {
      product.element.style.display = '';
    });
    
    // Ocultar mensaje de no resultados
    const noResults = document.getElementById('no-results-message');
    if (noResults) {
      noResults.remove();
    }
  }

  showNoResults(hasResults, query) {
    // Remover mensaje anterior si existe
    const existing = document.getElementById('no-results-message');
    if (existing) {
      existing.remove();
    }

    if (!hasResults && query.length >= 2) {
      const container = document.querySelector('.products-grid, .productos-grid') || 
                        document.querySelector('section');
      
      if (container) {
        const message = document.createElement('div');
        message.id = 'no-results-message';
        message.style.cssText = `
          grid-column: 1 / -1;
          text-align: center;
          padding: 3rem 2rem;
          color: #8c8678;
        `;
        message.innerHTML = `
          <i class="bi bi-search" style="font-size: 3rem; opacity: 0.5; margin-bottom: 1rem; display: block;"></i>
          <p style="font-size: 1.1rem; margin-bottom: 0.5rem;">No se encontraron productos</p>
          <p style="font-size: 0.9rem; opacity: 0.8;">Intenta con otros términos de búsqueda</p>
        `;
        container.appendChild(message);
      }
    }
  }
}

// Inicializar sistema de búsqueda
document.addEventListener('DOMContentLoaded', () => {
  const searchSystem = new SearchSystem();
  
  // Si hay parámetro de búsqueda en la URL, ejecutarlo
  const urlParams = new URLSearchParams(window.location.search);
  const searchQuery = urlParams.get('search');
  if (searchQuery) {
    const searchInput = document.querySelector('.searchbar, input[type="text"][placeholder*="Buscar"]');
    if (searchInput) {
      searchInput.value = searchQuery;
      searchSystem.handleSearch(searchQuery);
    }
  }
});

