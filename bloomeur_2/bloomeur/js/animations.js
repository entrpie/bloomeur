// ============================================
// BLOOMEUR - ANIMACIONES Y MEJORAS UX
// ============================================

// Animaciones de entrada para elementos
function initScrollAnimations() {
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('fade-in');
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observar tarjetas de productos
  document.querySelectorAll('.producto-card, .product-card').forEach(card => {
    observer.observe(card);
  });

  // Observar secciones
  document.querySelectorAll('section').forEach(section => {
    observer.observe(section);
  });
}

// Animación de botones al hacer hover
function initButtonAnimations() {
  document.querySelectorAll('button, .add-btn, .favorito-btn, .add-pill').forEach(btn => {
    btn.addEventListener('mouseenter', function() {
      this.style.transform = 'scale(1.05)';
    });
    
    btn.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1)';
    });
  });
}

// Efecto de ripple en botones
function addRippleEffect(button) {
  const ripple = document.createElement('span');
  const rect = button.getBoundingClientRect();
  const size = Math.max(rect.width, rect.height);
  const x = event.clientX - rect.left - size / 2;
  const y = event.clientY - rect.top - size / 2;
  
  ripple.style.width = ripple.style.height = size + 'px';
  ripple.style.left = x + 'px';
  ripple.style.top = y + 'px';
  ripple.classList.add('ripple');
  
  button.appendChild(ripple);
  
  setTimeout(() => {
    ripple.remove();
  }, 600);
}

// Agregar efecto ripple a botones principales
function initRippleEffects() {
  document.querySelectorAll('.add-btn, .favorito-btn, .shipping-btn, .pay-btn, .add-pill').forEach(btn => {
    btn.addEventListener('click', function(e) {
      addRippleEffect(this);
    });
  });
}

// Animación de carga para imágenes
function initImageLoading() {
  const images = document.querySelectorAll('img');
  
  images.forEach(img => {
    if (img.complete) {
      img.classList.add('loaded');
    } else {
      img.addEventListener('load', function() {
        this.classList.add('loaded');
      });
      
      img.addEventListener('error', function() {
        this.style.opacity = '0.5';
        console.error('Error loading image:', this.src);
      });
    }
  });
}

// Smooth scroll para enlaces internos
function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      if (href !== '#' && href.length > 1) {
        const target = document.querySelector(href);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      }
    });
  });
}

// Animación de contador numérico
function animateCounter(element, start, end, duration = 1000) {
  const range = end - start;
  const increment = end > start ? 1 : -1;
  const stepTime = Math.abs(Math.floor(duration / range));
  let current = start;
  
  const timer = setInterval(() => {
    current += increment;
    element.textContent = current;
    
    if (current === end) {
      clearInterval(timer);
    }
  }, stepTime);
}

// Feedback visual mejorado para acciones
function showSuccessFeedback(element, message) {
  const originalText = element.textContent;
  const originalBg = element.style.background;
  
  element.textContent = message || '✓';
  element.style.background = '#a9b794';
  element.style.transform = 'scale(1.1)';
  
  setTimeout(() => {
    element.textContent = originalText;
    element.style.background = originalBg;
    element.style.transform = 'scale(1)';
  }, 1000);
}

// Prevenir múltiples clics en botones
function preventDoubleClick(button) {
  button.disabled = true;
  button.classList.add('loading');
  
  setTimeout(() => {
    button.disabled = false;
    button.classList.remove('loading');
  }, 1000);
}

// Animación de tarjeta al agregar al carrito
function animateCardToCart(card, callback) {
  const rect = card.getBoundingClientRect();
  const clone = card.cloneNode(true);
  
  clone.style.position = 'fixed';
  clone.style.top = rect.top + 'px';
  clone.style.left = rect.left + 'px';
  clone.style.width = rect.width + 'px';
  clone.style.height = rect.height + 'px';
  clone.style.zIndex = '10000';
  clone.style.pointerEvents = 'none';
  clone.style.transition = 'all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
  
  document.body.appendChild(clone);
  
  const cartBtn = document.querySelector('.cart-btn');
  if (cartBtn) {
    const cartRect = cartBtn.getBoundingClientRect();
    const targetX = cartRect.left + cartRect.width / 2;
    const targetY = cartRect.top + cartRect.height / 2;
    
    setTimeout(() => {
      clone.style.transform = `translate(${targetX - rect.left - rect.width / 2}px, ${targetY - rect.top - rect.height / 2}px) scale(0.3)`;
      clone.style.opacity = '0';
    }, 10);
    
    setTimeout(() => {
      clone.remove();
      if (callback) callback();
    }, 600);
  } else {
    clone.remove();
    if (callback) callback();
  }
}

// Inicializar todas las animaciones
document.addEventListener('DOMContentLoaded', () => {
  initScrollAnimations();
  initButtonAnimations();
  initRippleEffects();
  initImageLoading();
  initSmoothScroll();
  
  // Agregar estilos para ripple
  if (!document.getElementById('ripple-styles')) {
    const style = document.createElement('style');
    style.id = 'ripple-styles';
    style.textContent = `
      .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s ease-out;
        pointer-events: none;
      }
      
      @keyframes ripple-animation {
        to {
          transform: scale(4);
          opacity: 0;
        }
      }
      
      img {
        opacity: 0;
        transition: opacity 0.3s ease;
      }
      
      img.loaded {
        opacity: 1;
      }
      
      button:disabled {
        opacity: 0.6;
        cursor: not-allowed;
      }
    `;
    document.head.appendChild(style);
  }
});

// Exportar funciones para uso global
window.BloomeurAnimations = {
  animateCounter,
  showSuccessFeedback,
  preventDoubleClick,
  animateCardToCart
};

