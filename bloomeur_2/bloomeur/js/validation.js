// ============================================
// BLOOMEUR - VALIDACIONES DE FORMULARIOS
// ============================================

class FormValidator {
  constructor(form) {
    this.form = form;
    this.errors = [];
    this.init();
  }

  init() {
    if (!this.form) return;
    
    this.form.addEventListener('submit', (e) => {
      if (!this.validate()) {
        e.preventDefault();
        this.showErrors();
      }
    });

    // Validación en tiempo real
    this.form.querySelectorAll('input, select, textarea').forEach(field => {
      field.addEventListener('blur', () => this.validateField(field));
      field.addEventListener('input', () => this.clearFieldError(field));
    });
  }

  validate() {
    this.errors = [];
    const fields = this.form.querySelectorAll('input[required], select[required], textarea[required]');
    
    fields.forEach(field => {
      this.validateField(field);
    });

    return this.errors.length === 0;
  }

  validateField(field) {
    const value = field.value.trim();
    const type = field.type;
    const name = field.name || field.id;

    // Validar campo requerido
    if (field.hasAttribute('required') && !value) {
      this.addError(field, 'Este campo es obligatorio');
      return false;
    }

    // Validaciones específicas por tipo
    switch (type) {
      case 'email':
        if (value && !this.isValidEmail(value)) {
          this.addError(field, 'Ingresa un email válido');
          return false;
        }
        break;
      
      case 'tel':
        if (value && !this.isValidPhone(value)) {
          this.addError(field, 'Ingresa un teléfono válido');
          return false;
        }
        break;
      
      case 'text':
        if (name.includes('cardNumber') && value && !this.isValidCardNumber(value)) {
          this.addError(field, 'Número de tarjeta inválido');
          return false;
        }
        if (name.includes('cvv') && value && !this.isValidCVV(value)) {
          this.addError(field, 'CVV inválido');
          return false;
        }
        if (name.includes('expiry') && value && !this.isValidExpiry(value)) {
          this.addError(field, 'Fecha de expiración inválida');
          return false;
        }
        break;
    }

    this.clearFieldError(field);
    return true;
  }

  isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  isValidPhone(phone) {
    return /^[\d\s\-\+\(\)]+$/.test(phone) && phone.replace(/\D/g, '').length >= 10;
  }

  isValidCardNumber(cardNumber) {
    const cleaned = cardNumber.replace(/\s/g, '');
    return /^\d{13,19}$/.test(cleaned) && this.luhnCheck(cleaned);
  }

  isValidCVV(cvv) {
    return /^\d{3,4}$/.test(cvv);
  }

  isValidExpiry(expiry) {
    return /^\d{2}\/\d{2}$/.test(expiry);
  }

  luhnCheck(cardNumber) {
    let sum = 0;
    let isEven = false;
    
    for (let i = cardNumber.length - 1; i >= 0; i--) {
      let digit = parseInt(cardNumber[i]);
      
      if (isEven) {
        digit *= 2;
        if (digit > 9) {
          digit -= 9;
        }
      }
      
      sum += digit;
      isEven = !isEven;
    }
    
    return sum % 10 === 0;
  }

  addError(field, message) {
    this.errors.push({ field, message });
    field.classList.add('error');
    
    // Mostrar mensaje de error
    this.showFieldError(field, message);
  }

  showFieldError(field, message) {
    // Remover error anterior
    this.clearFieldError(field);
    
    // Crear elemento de error
    const errorEl = document.createElement('span');
    errorEl.className = 'field-error';
    errorEl.textContent = message;
    errorEl.style.cssText = `
      display: block;
      color: #d85a5a;
      font-size: 0.85rem;
      margin-top: 0.3rem;
      animation: fadeIn 0.3s ease;
    `;
    
    field.parentNode.appendChild(errorEl);
  }

  clearFieldError(field) {
    field.classList.remove('error');
    const errorEl = field.parentNode.querySelector('.field-error');
    if (errorEl) {
      errorEl.remove();
    }
  }

  showErrors() {
    if (this.errors.length > 0) {
      const firstError = this.errors[0];
      firstError.field.focus();
      firstError.field.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
  }
}

// Inicializar validaciones en formularios
document.addEventListener('DOMContentLoaded', () => {
  // Formulario de checkout
  const checkoutForm = document.querySelector('.checkout-form form');
  if (checkoutForm) {
    new FormValidator(checkoutForm);
  }

  // Formulario de pago con tarjeta
  const cardForm = document.getElementById('cardForm');
  if (cardForm) {
    new FormValidator(cardForm);
  }

  // Agregar estilos para campos con error
  if (!document.getElementById('validation-styles')) {
    const style = document.createElement('style');
    style.id = 'validation-styles';
    style.textContent = `
      input.error,
      select.error,
      textarea.error {
        border-color: #d85a5a !important;
        box-shadow: 0 0 0 3px rgba(216, 90, 90, 0.2) !important;
      }
      
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(-5px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
    `;
    document.head.appendChild(style);
  }
});

