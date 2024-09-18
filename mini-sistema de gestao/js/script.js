// Função para adicionar produtos ao carrinho via AJAX
function addToCart(productId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax_update.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            var response = JSON.parse(xhr.responseText);
            updateCartUI(response);
        }
    };

    // Enviar o ID do produto para adicionar ao carrinho
    xhr.send("product_id=" + productId);
}

// Função para atualizar o UI do carrinho com os dados recebidos
function updateCartUI(cartItems) {
    var cartContainer = document.getElementById('cartItems');
    var totalContainer = document.getElementById('cartTotal');
    
    cartContainer.innerHTML = '';
    var total = 0;
    cartItems.forEach(function(item) {
        var listItem = document.createElement('li');
        listItem.textContent = item.name + ' - R$ ' + item.price.toFixed(2);
        cartContainer.appendChild(listItem);
        total += parseFloat(item.price);
    });

    // Atualizar o total do carrinho
    totalContainer.textContent = 'Total: R$ ' + total.toFixed(2);
}

// Função para processar a seleção de produtos na página de dashboard
function processSelectedProducts() {
    var selectedProducts = document.querySelectorAll('input[name="products[]"]:checked');
    var productIds = [];
    
    selectedProducts.forEach(function(product) {
        productIds.push(product.value);
    });

    if (productIds.length === 0) {
        alert("Por favor, selecione pelo menos um produto.");
        return;
    }

    // Adicionar produtos ao carrinho via AJAX
    addToCartMultiple(productIds);
}

// Função para adicionar múltiplos produtos ao carrinho via AJAX
function addToCartMultiple(productIds) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax_update.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            var response = JSON.parse(xhr.responseText);
            updateCartUI(response);
        }
    };

    // Enviar os IDs dos produtos selecionados para o servidor
    xhr.send("product_ids=" + JSON.stringify(productIds));
}

// Adiciona um event listener ao botão de adicionar ao carrinho
document.getElementById('addToCartButton').addEventListener('click', function() {
    processSelectedProducts();
});

// Função para carregar os itens do carrinho quando a página carregar
window.onload = function() {
    loadCart();
}

// Função para carregar o carrinho do usuário via AJAX
function loadCart() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax_load_cart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            var response = JSON.parse(xhr.responseText);
            updateCartUI(response);
        }
    };

    // Envia a requisição sem dados apenas para carregar o carrinho
    xhr.send();
}