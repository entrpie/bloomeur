// Sistema de navegación entre secciones del checkout
document.addEventListener('DOMContentLoaded', () => {
  const stepLinks = document.querySelectorAll('.step-link');
  const sections = {
    informacion: document.getElementById('section-informacion'),
    envio: document.getElementById('section-envio'),
    pago: document.getElementById('section-pago')
  };

  // Función para cambiar de sección
  function showSection(sectionName) {
    // Ocultar todas las secciones
    Object.values(sections).forEach(section => {
      if (section) section.style.display = 'none';
    });

    // Mostrar la sección seleccionada
    if (sections[sectionName]) {
      sections[sectionName].style.display = 'block';
    }

    // Actualizar steps activos
    stepLinks.forEach(link => {
      link.classList.remove('active');
      if (link.getAttribute('data-step') === sectionName) {
        link.classList.add('active');
      }
    });
  }

  // Event listeners para los links de steps
  stepLinks.forEach(link => {
    link.addEventListener('click', () => {
      const step = link.getAttribute('data-step');
      showSection(step);
    });
    link.style.cursor = 'pointer';
  });

  // Botones de navegación
  const nextToEnvio = document.getElementById('nextToEnvio');
  const nextToPago = document.getElementById('nextToPago');
  const backToInformacion = document.getElementById('backToInformacion');
  const backToEnvio = document.getElementById('backToEnvio');

  if (nextToEnvio) {
    nextToEnvio.addEventListener('click', (e) => {
      e.preventDefault();
      showSection('envio');
    });
  }

  if (nextToPago) {
    nextToPago.addEventListener('click', (e) => {
      e.preventDefault();
      showSection('pago');
    });
  }

  if (backToInformacion) {
    backToInformacion.addEventListener('click', (e) => {
      e.preventDefault();
      showSection('informacion');
    });
  }

  if (backToEnvio) {
    backToEnvio.addEventListener('click', (e) => {
      e.preventDefault();
      showSection('envio');
    });
  }
});

