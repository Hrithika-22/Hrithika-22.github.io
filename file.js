function updatePrice(unitPrice, price, quantity)
{
    var newPrice = unitPrice * quantity.value;
    price.innerHTML = newPrice.toFixed(2);

    localStorage.setItem('quantity', quantity.value)
}

function loadQty(quantity)
{
    if (localStorage.getItem('quantity'))
        quantity.value = localStorage.getItem('quantity');
    else
        quantity.value = 1;
}

function moredescrip(){
    var more =document.getElementById('myDiv');
    var mybtn = document.getElementById('more-text')
    if(myDiv.style.display =='none'){
        myDiv.style.display='inline';
        more-text.style.display=='none';
        mybtn.innerHTML='more-text'

    }else{
        myDiv.style.display='none';
        more-text.style.display=='inline';
        mybtn.innerHTML='more-text'
    }
}
