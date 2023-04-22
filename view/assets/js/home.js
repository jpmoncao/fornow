const dataAtual = new Date();
var dia = dataAtual.getDate();
const mes = dataAtual.getMonth() + 1;


const res = document.getElementById("data-atual");

res.innerHTML = 'Hoje, dia' + ` ${dia}/${mes}`