function MudarTela(el, le) {
    var display = document.getElementById(el).style.display;
    var display2 = document.getElementById(le).style.display;
    if (display == "block") {
        document.getElementById(el).style.display = 'none';
        document.getElementById(le).style.display = 'block';
    } else {
        document.getElementById(el).style.display = 'block';
        document.getElementById(le).style.display = 'none';
    }
}

function info(el) {
    var display = document.getElementById(el).style.display;
    if (display == "block") {
        document.getElementById(el).style.display = 'none';
    } else {
        document.getElementById(el).style.display = 'block';
    }
}

function info2(el) {

    var id = el.getAttribute('newid');
    var display = document.getElementById(id).style.display;
    if (display == "block") {
        document.getElementById(id).style.display = 'none';
    } else {
        document.getElementById(id).style.display = 'block';
    }
}


$(document).ready(function () {
    var i = 1;
    $("#addcampo").click(function () {
        $(" .telefones").append('<div><label for="telefone">Telefone</label><input type="text" name="telefone[' + i + ']" id="telefone"></div>')
        i++;
    });

    //document.getElementById('numTelefones').value = i;
});
