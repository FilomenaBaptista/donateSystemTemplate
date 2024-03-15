function dataResumida(created_at) {
    var data = new Date(created_at);
    var meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
    return meses[data.getMonth()] + ' ' + data.getDate() + ', ' + data.getFullYear();
  }