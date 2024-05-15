document.addEventListener('DOMContentLoaded', function() {
    const totalMes = document.querySelector('.amountMes').value;
    const totalAno = document.querySelector('.amountAno').value;

    if (totalMes > 0){
        document.querySelector('.amountMes').style.color = '#00aa00';
    } else {
        document.querySelector('.amountMes').style.color = '#aa0000';
    }

    if (totalAno > 0){
        document.querySelector('.amountAno').style.color = '#00aa00';
    } else {
        document.querySelector('.amountAno').style.color = '#aa0000';
    }
});