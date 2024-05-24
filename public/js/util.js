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