function displayDisponivel(id) {
  window.location.href = "../php/mudarCondicaoEquip.php?id=" + id + "&condicao=" + 1;
}

function displayManutencao(id){
  window.location.href = "../php/mudarCondicaoEquip.php?id=" + id + "&condicao=" + 2;
}

function displayQuebrado(id) {
  window.location.href = "../php/mudarCondicaoEquip.php?id=" + id + "&condicao=" + 3;
}