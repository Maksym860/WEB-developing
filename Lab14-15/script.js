// Глобальний об'єкт для зберігання товарів у кошику
let cart = {};

// Функція для оновлення відображення кошика
function updateCartDisplay() {
    const cartItems = document.getElementById('cartItems');
    const totalPriceElement = document.getElementById('totalPrice');
    
    // Очищаємо контейнер кошика
    cartItems.innerHTML = '';
    
    let totalPrice = 0;
    let hasItems = false;
    
    // Проходимо по всіх товарах у кошику
    for (const [id, item] of Object.entries(cart)) {
        hasItems = true;
        const itemTotal = item.price * item.quantity;
        totalPrice += itemTotal;
        
        // Створюємо елемент товару в кошику
        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <div>
                <strong>${item.name}</strong><br>
                <small>${item.price} грн × ${item.quantity} шт.</small>
            </div>
            <div>
                <strong>${itemTotal} грн</strong>
            </div>
        `;
        
        cartItems.appendChild(cartItem);
    }
    
    // Якщо кошик порожній
    if (!hasItems) {
        cartItems.innerHTML = '<p class="empty-cart">Кошик порожній</p>';
    }
    
    // Оновлюємо загальну суму
    totalPriceElement.textContent = totalPrice;
}

// Обробник кліків для лічильників
document.addEventListener('click', function(event) {
    // Перевіряємо, чи клікнули на кнопку + або -
    if (event.target.dataset.action === 'plus' || event.target.dataset.action === 'minus') {
        // Знаходимо батьківський контейнер лічильника
        const counterWrapper = event.target.closest('.counter-wrapper');
        
        if (counterWrapper) {
            // Знаходимо елемент зі значенням лічильника
            const counter = counterWrapper.querySelector('[data-counter]');
            
            // Поточне значення
            let currentValue = parseInt(counter.textContent);
            
            // Змінюємо значення в залежності від кнопки
            if (event.target.dataset.action === 'plus') {
                counter.textContent = ++currentValue;
            } else if (event.target.dataset.action === 'minus' && currentValue > 1) {
                counter.textContent = --currentValue;
            }
        }
    }
    
    // Обробка додавання товару в кошик
    if (event.target.classList.contains('add-to-cart')) {
        const productCard = event.target.closest('.product-card');
        const productId = event.target.dataset.id;
        const productName = productCard.querySelector('h3').textContent;
        
        // Отримуємо ціну (прибираємо " грн" і перетворюємо на число)
        const priceText = productCard.querySelector('.price').textContent;
        const productPrice = parseInt(priceText.replace(' грн', '').replace(/\s/g, ''));
        
        // Отримуємо кількість
        const counter = productCard.querySelector('[data-counter]');
        const quantity = parseInt(counter.textContent);
        
        // Додаємо товар в кошик
        if (cart[productId]) {
            cart[productId].quantity += quantity;
        } else {
            cart[productId] = {
                name: productName,
                price: productPrice,
                quantity: quantity
            };
        }
        
        // Скидаємо лічильник до 1
        counter.textContent = '1';
        
        // Оновлюємо відображення кошика
        updateCartDisplay();
        
        // Показуємо сповіщення
        alert(`Додано ${quantity} шт. "${productName}" в кошик!`);
    }
});

// Ініціалізація при завантаженні сторінки
document.addEventListener('DOMContentLoaded', function() {
    console.log('Магазин завантажено!');
});