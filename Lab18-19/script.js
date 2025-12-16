// Глобальна змінна для кошика
let cartItems = [];
const cartWrapper = document.querySelector('.cart-wrapper');

// Функція для оновлення загальної суми
function updateTotalPrice() {
    const totalPriceElement = document.getElementById('totalPrice');
    let total = 0;
    
    cartItems.forEach(item => {
        const price = parseFloat(item.price.replace(',', '')) || 0;
        const quantity = parseInt(item.counter) || 1;
        total += price * quantity;
    });
    
    totalPriceElement.textContent = total.toLocaleString('uk-UA');
}

// Функція для відображення кошика
function renderCart() {
    cartWrapper.innerHTML = '';
    
    if (cartItems.length === 0) {
        cartWrapper.innerHTML = '<p class="empty-cart">Кошик порожній</p>';
    } else {
        cartItems.forEach((productInfo, index) => {
            const price = parseFloat(productInfo.price.replace(',', '')) || 0;
            const quantity = parseInt(productInfo.counter) || 1;
            const totalItemPrice = price * quantity;
            
            const cartItemHTML = `
                <div class="cart-item" data-id="${productInfo.id}">
                    <img src="${productInfo.imgsrc}" 
                         alt="${productInfo.title}" 
                         class="cart-item-img">
                    <div class="cart-item-info">
                        <div class="cart-item-title">${productInfo.title}</div>
                        <div class="cart-item-details">
                            Кількість: ${productInfo.counter} шт. × ${productInfo.price} грн
                        </div>
                        <div class="cart-item-price">
                            Разом: ${totalItemPrice.toLocaleString('uk-UA')} грн
                        </div>
                    </div>
                    <button class="control remove-item" data-index="${index}">×</button>
                </div>
            `;
            cartWrapper.insertAdjacentHTML('beforeend', cartItemHTML);
        });
    }
    
    updateTotalPrice();
}

// Функція для додавання товару в кошик
function addToCart(productInfo) {
    // Перевіряємо, чи товар вже є в кошику
    const existingItemIndex = cartItems.findIndex(item => item.id === productInfo.id);
    
    if (existingItemIndex !== -1) {
        // Якщо товар вже є, оновлюємо кількість
        const existingCounter = parseInt(cartItems[existingItemIndex].counter) || 0;
        const newCounter = parseInt(productInfo.counter) || 1;
        cartItems[existingItemIndex].counter = (existingCounter + newCounter).toString();
    } else {
        // Якщо товару немає, додаємо новий
        cartItems.push({...productInfo});
    }
    
    renderCart();
    showNotification(`Товар "${productInfo.title}" додано до кошика!`);
}

// Функція для показу сповіщення
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
        color: white;
        padding: 15px 25px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        z-index: 1000;
        animation: slideIn 0.3s ease;
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Додаємо CSS анімації для сповіщень
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Основний обробник подій
document.addEventListener('click', function(event) {
    // Обробка кліків на кнопки +/- лічильника
    if (event.target.dataset.action === 'plus' || event.target.dataset.action === 'minus') {
        const counterWrapper = event.target.closest('.counter-wrapper');
        
        if (counterWrapper) {
            const counter = counterWrapper.querySelector('[data-counter]');
            let currentValue = parseInt(counter.textContent);
            
            if (event.target.dataset.action === 'plus') {
                counter.textContent = ++currentValue;
            } else if (event.target.dataset.action === 'minus' && currentValue > 1) {
                counter.textContent = --currentValue;
            }
        }
    }
    
    // Обробка кліків на кнопку "У кошик"
    if (event.target.hasAttribute('data-cart')) {
        const card = event.target.closest('.card');
        
        if (card) {
            const productInfo = {
                id: card.dataset.id,
                imgsrc: card.querySelector('.product-img').getAttribute('src'),
                title: card.querySelector('.item-title').innerText,
                itemsInBox: card.querySelector('[data-items-in-box]').innerText,
                weight: card.querySelector('.price_weight').innerText,
                price: card.querySelector('.price_currency').innerText,
                counter: card.querySelector('[data-counter]').innerText
            };
            
            addToCart(productInfo);
            
            // Скидаємо лічильник до 1
            card.querySelector('[data-counter]').textContent = '1';
        }
    }
    
    // Обробка видалення товару з кошика
    if (event.target.classList.contains('remove-item')) {
        const index = parseInt(event.target.dataset.index);
        if (!isNaN(index) && index >= 0 && index < cartItems.length) {
            const removedItem = cartItems[index];
            cartItems.splice(index, 1);
            renderCart();
            showNotification(`Товар "${removedItem.title}" видалено з кошика`);
        }
    }
    
    // Обробка очищення всього кошика
    if (event.target.id === 'clearCart') {
        if (cartItems.length > 0 && confirm('Ви впевнені, що хочете очистити весь кошик?')) {
            cartItems = [];
            renderCart();
            showNotification('Кошик очищено!');
        }
    }
});

// Ініціалізація при завантаженні сторінки
document.addEventListener('DOMContentLoaded', function() {
    console.log('Інтернет-магазин завантажено!');
    renderCart();
});