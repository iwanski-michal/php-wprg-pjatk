var a = 0;
var b = 0;
var c;
var dz = '';

function button(nextNumber) {
    var el = document.getElementById('display');
    if (el.value === '0') {
        el.value = nextNumber;
    } else {
        el.value += nextNumber;
    }
}

function remove() {
    var el = document.getElementById('display');
    el.value = '0';
}

function removeLast() {
    var el = document.getElementById('display');

}

function dzialanie(sign) {
    var el = document.getElementById('display');
    a = parseFloat(el.value.replace(',', '.'));
    dz = sign;
    remove();
}
function isEqual() {
    var el = document.getElementById('display');
    b = parseFloat(el.value.replace(',', '.'));

    switch (dz) {
        case '+': c= a + b;

            break;
        case '-': c= a - b;

            break;
        case '/': c= a / b;

            break;
        case '*': c= a * b;

            break;

        default:
            break;
    }

    c = Math.round(c * 10000)/10000;
    el.value = c.toString().replace('.', ',');

}

function comma(){
    var el = document.getElementById('display');
    if (el.value.indexOf(',') === -1){
        el.value += ',';
    }
}