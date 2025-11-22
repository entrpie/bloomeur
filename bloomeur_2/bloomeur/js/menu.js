// ============================================
// BLOOMEUR - MENÚ HAMBURGUESA
// ============================================

document.addEventListener('DOMContentLoaded', () => {
  const hamburgerBtns = document.querySelectorAll('.menu-hamburger');
  const hamburgerMenus = document.querySelectorAll('.hamburger-menu');
  
  hamburgerBtns.forEach((btn, index) => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      btn.classList.toggle('active');
      
      // Toggle hamburger menu
      if (hamburgerMenus[index]) {
        hamburgerMenus[index].classList.toggle('active');
      }
    });
  });
  
  // Cerrar menú al hacer clic fuera
  document.addEventListener('click', (e) => {
    if (!e.target.closest('.navbar-left')) {
      hamburgerBtns.forEach(btn => {
        btn.classList.remove('active');
      });
      hamburgerMenus.forEach(menu => {
        menu.classList.remove('active');
      });
    }
  });
});

