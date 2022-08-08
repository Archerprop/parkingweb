//funcion para revisar que solo se pueda seleccionar un tipo de vehiculo a la vez
function selects(){
    $("#moto").on('change',function(ev){
        ev.preventDefault();
        $("#moto").prop("checked",true);
        $("#carro").prop("checked",false);
    });
    $("#carro").on('change',function(ev){
        ev.preventDefault();
        $("#carro").prop("checked",true);
        $("#moto").prop("checked",false);
    });
}
//funcion para verificar si lo que se ingresa de placa es valido
function checkplaca(placa) {
    key = placa.keyCode || placa.which;
    tecla = String.fromCharCode(key).toString();
    valido = "ABCDEFGHIJKLMNOPQRSTWUVXYZabcdefghijklmnopqrstwuvxyz1234567890";

    especiales = [8,13];
    tecla_especial = false

    for (var i in especiales) {
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(valido.indexOf(tecla) == -1 && !tecla_especial)
    {
        alert("Solo se admiten numeros y letras");
        return false;
    }
}


