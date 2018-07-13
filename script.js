function verifyFields(){
    var errors = 0;
    var modele = document.getElementById('modele');
    var marque = document.getElementById('marque');
    var size = document.getElementById('size');
    var res = document.getElementById('res');
    var price = document.getElementById('price');
    var quantity = document.getElementById('quantity');

    resetError(modele);
    resetError(marque);
    resetError(size);
    resetError(res);
    resetError(price);
    resetError(quantity);

    if(!verifyTextField(modele.value, 2, 30)) {
        errors++;
        displayError(modele, 'Taille invalide');
    }
    if(!verifyTextField(marque.value, 2, 30)) {
        errors++;
        displayError(marque, 'Taille invalide');
    }
    if(!verifyNumberField(size.value, 1, 100)){
        errors++;
        displayError(size, 'Nombre invalide');
    }
    if(!verifyNumberField(res.value, 1, 8000)){
        errors++;
        displayError(res, 'Nombre invalide');
    }
    if(!verifyNumberField(price.value, 1, 2000)){
        errors++;
        displayError(price, 'Nombre invalide');
    }
    if(!verifyNumberField(quantity.value, 1, 50)){
        errors++;
        displayError(quantity, 'Nombre invalide');
    }

    if(errors === 0){
        createTV(modele.value, marque.value, size.value, res.value, price.value, quantity.value);
        displayTV();
    }
}

function verifyTextField(value, minLength, maxLength){
    return value.length >= minLength && value.length <= maxLength;
}

function verifyNumberField(value, minValue, maxValue){
    console.log(value);
    return value >= minValue && value <= maxValue;
}

function displayError(input, message){
    input.style.borderColor = 'red';
    var parent = input.parentNode;
    var error = document.createElement('span');
    error.setAttribute('class', 'label label-danger');
    error.innerHTML = message;
    parent.appendChild(error);
}

function resetError(input) {
    input.style.borderColor = '';
    var parent = input.parentNode;
    var elements = parent.getElementsByTagName('span');
    if(elements.length > 0) {
        parent.removeChild(elements[0]);
    }
}

function createTV(modele, marque, size, res, price, quantity){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if (request.readyState === 4 && request.status === 200) {
            if(request.responseText === '1')
                console.log('created');
        }
    };
    request.open('POST','newTV.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = [
        'modele=' + modele,
        'marque=' + marque,
        'size=' + size,
        'res=' + res,
        'price=' + price,
        'quantity=' + quantity
    ];
    var body = params.join('&');
    request.send(body);
    console.log(body);
}

function displayTV(){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if (request.readyState === 4 && request.status === 200) {
            var TV = JSON.parse(request.responseText);
            printTV(TV);
        }
    };
    request.open('GET','getTV.php');
    request.send();
}

function printTV(TV) {
    var list= ["id", "modele", "marque", "size", "res", "price", "quantity", "sold"];
    var parent = document.getElementById("tvList");
    parent.innerHTML='';

    for (var i = 0; i < TV.length; i++) {
        var tr = document.createElement("tr");
        tr.setAttribute('id', TV[i][list[0]]);
        parent.appendChild(tr);

        for (var j = 0; j < list.length; j++) {
            var td = document.createElement("td");
            td.setAttribute('id', list[j]+list[0]);
            td.innerHTML= TV[i][list[j]];
            tr.appendChild(td);
        }

        td = document.createElement("td");
        var sell = document.createElement("button");
        sell.innerHTML = "Vendre";
        sell.className = "btn btn-success";
        sell.setAttribute('onclick', 'sellTV('+TV[i][list[0]]+')')
        td.appendChild(sell);
        tr.appendChild(td);

        td = document.createElement("td");
        var remove = document.createElement("button");
        remove.innerHTML = "Supprimer";
        remove.className = "btn btn-danger";
        remove.setAttribute('onclick','deleteTV('+TV[i][list[0]]+')');
        td.appendChild(remove);
        tr.appendChild(td);
    }
}

function sellTV(id) {
    sendGetAjaxRequest('sellTV.php?id='+id, 'Sold');
    displayTV();
}


function deleteTV(id){
    sendGetAjaxRequest('deleteTV.php?id='+id, 'Removed');
    displayTV();
}

function sendGetAjaxRequest(url, message){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            console.log(message);
        }
    };
    request.open('GET', url);
    request.send();
}