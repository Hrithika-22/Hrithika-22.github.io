
function plusOne(){
  document.getElementById("quan1").value = parseInt(document.getElementById("quan1").value) + 1;
  calT("total1","quan1")
  plusSubTot("quan1")
}

function minusOne(){
  var val = parseInt(document.getElementById("quan1").value);
  if (val >= 1){
    document.getElementById("quan1").value = val - 1;
  }
  calT("total1","quan1")
  minusSubTot("quan1")
}

function plusOne1(){
  document.getElementById("quan2").value = parseInt(document.getElementById("quan2").value) + 1;
  calT("total2","quan2")
  plusSubTot("quan2")
}

function minusOne1(){
  var val = parseInt(document.getElementById("quan2").value);
  if (val >= 1){
    document.getElementById("quan2").value = val - 1;
  }
  calT("total2","quan2")
  minusSubTot("quan2")
}

function plusOne2(){
  document.getElementById("quan3").value = parseInt(document.getElementById("quan3").value) + 1;
  calT("total3","quan3")
  plusSubTot("quan3")
}

function minusOne2(){
  var val = parseInt(document.getElementById("quan3").value);
  if (val >= 1){
    document.getElementById("quan3").value = val - 1;
  }
  calT("total3","quan3")
  minusSubTot("quan3")
}

function plusSubTot(q){
  document.getElementById("subT").innerHTML = 5 + parseInt(document.getElementById(q).value)*5;
  calTax()
}
function minusSubTot(q){
  document.getElementById("subT").innerHTML = 5 - parseInt(document.getElementById(q).value)*5;
  calTax()
}

function calTot(){
  document.getElementById("total").innerHTML = parseFloat(document.getElementById("subT").innerHTML) +
                                              parseFloat(document.getElementById("tax").innerHTML) + 5;
}
function calTax(){
  document.getElementById("tax").innerHTML = parseFloat(document.getElementById("subT").innerHTML)*0.15;
  calTot()
}

function calT(t,q){
  document.getElementById(t).innerHTML = parseFloat(document.getElementById(q).value) * 5;
}
