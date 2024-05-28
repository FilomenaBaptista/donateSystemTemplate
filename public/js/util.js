function dataResumida(created_at) {
    var data = new Date(created_at);
    var meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
    return meses[data.getMonth()] + ' ' + data.getDate() + ', ' + data.getFullYear();
}


function campanhaRecentes(dados) {
    $.ajax({
        url: '/campanhas-recentes/5',
        type: 'GET',
        dataType: 'json',
        data: dados,
        success: function (response) {
            $('.campanhasRecentes').empty();
            response.data.forEach(function (item) {
                let rotaCompleta = dados.route.slice(0, -1) + item.id;
                var html = '<div class="post-item">';
                html += '<img src="' + item.imagem +
                    '" alt="" class="flex-shrink-0">';
                html += '<div>';
                html += '<h4><a href="' + rotaCompleta + '">' + item.titulo + '</a></h4>';
                html += '<time datetime="' + item.created_at + '">' + dataResumida(
                    item.created_at) + '</time>';
                html += '</div>';
                html += '</div>';
                $('.campanhasRecentes').append(html);
            });
        },
        error: function (xhr, status, error) { }
    });
}


function doacaoRecentes(dados) {
    $.ajax({
        url: '/doacoes-recentes/5',
        type: 'GET',
        dataType: 'json',
        data: dados,
        success: function (response) {
            $('.doacoesRecentes').empty();
        
            response.data.forEach(function (item) {
                let rotaCompleta = dados.route.slice(0, -1) + item.id;
                var html = '<div class="post-item">';
                html += '<img src="' + item.imagem +
                    '" alt="" class="flex-shrink-0">';
                html += '<div>';
                html += '<h4><a href="' + rotaCompleta + '">' + item.anuncio + '</a></h4>';
                html += '<time datetime="' + item.created_at + '">' + dataResumida(
                    item.created_at) + '</time>';
                html += '</div>';
                html += '</div>';
                $('.doacoesRecentes').append(html);
            });
        },
        error: function (xhr, status, error) { 
        }
    });
}

function formatCurrencyAngola(value) {
    let number = parseFloat(value).toFixed(2); // Garantir que temos duas casas decimais
    let parts = number.split('.'); // Separar a parte inteira da parte decimal
    let integerPart = parts[0];
    let decimalPart = parts[1];
    // Adicionar separadores de milhares
    integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

    return `Kz ${integerPart},${decimalPart}`;
}

function currencyAngolaToFloat(currencyString) {
    // Remove "Kz" e espaços
    let numberString = currencyString.replace('Kz', '').trim();
    // Substitui pontos por nada e vírgula por ponto
    numberString = numberString.replace(/\./g, '').replace(',', '.');
    // Converte para float
    return parseFloat(numberString);
}

function updateSubTotal() {
    var subTotal = 0;
    var cartItems = document.querySelectorAll('#cart-items tr');
    cartItems.forEach(function(item) {
        var productId = item.getAttribute('data-product-id');
        subTotal += currencyAngolaToFloat($("#total-" + productId).text());
    });
    $('#subtotal').text(formatCurrencyAngola(subTotal));
    $('#total').text(formatCurrencyAngola(subTotal + currencyAngolaToFloat( $('#envio').text())));
}

function addCart(dados) {
    $.ajax({
        url: '/cart',
        type: 'get',
        dataType: 'json',
        data: dados,
        success: function (response) {
            if(dados.action == '+'){
                $("#quantity-" + dados.product_id).val(parseInt( $("#quantity-" + dados.product_id).val()) + 1);
            }else{
                $("#quantity-" + dados.product_id).val(parseInt( $("#quantity-" + dados.product_id).val()) - 1);
            }
            total = dados.price * parseInt( $("#quantity-" + dados.product_id).val());
            $("#total-" + dados.product_id).text(formatCurrencyAngola(total));
            updateSubTotal()
        },
        error: function (xhr, status, error) { 
            console.log(xhr)
        }
    });
}

