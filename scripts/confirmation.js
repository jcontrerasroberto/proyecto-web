function llenarInfo() {
    const entradas = document.querySelectorAll('#form input');
    const selectores = document.querySelectorAll('#form select');
    entradas.forEach(
        element => {
            if (element.name != "") {
                pos = document.getElementById("mostrar_" + element.name);
                pos.innerHTML = '';
                if (element.name == "sexo") {
                    if (element.checked) {
                        var node = document.createTextNode((element.value).toUpperCase());
                        pos.appendChild(node);
                    }
                } else {
                    var node = document.createTextNode((element.value).toUpperCase());
                    pos.appendChild(node);
                }

            }

        }
    );

    selectores.forEach(
        element => {
            console.log(element.value);
            pos = document.getElementById("mostrar_" + element.name);
            pos.innerHTML = '';
            if (element.name == "escuela" && element.value == "otro")
                document.getElementById("label_nombreE").style.display = "block";
            var node = document.createTextNode((element.value).toUpperCase());
            pos.appendChild(node);
        }
    )
}

function guardarDatos() {
    var alumno = {}
    const entradas = document.querySelectorAll('#form input');
    const selectores = document.querySelectorAll('#form select');
    entradas.forEach(
        element => {
            if (element.name != "") {
                alumno[element.name] = element.value;
            }

        }
    );
    selectores.forEach(
        element => {
            alumno[element.name] = element.value;
        }
    )
    var jsonformat = JSON.stringify(alumno);

    $.ajax({
        url: '../backend/conexionbd.php',
        type: 'post',
        dataType: 'json',
        contentType: 'application/json',
        success: function (data) {
            console.log(data);
        },
        data: jsonformat
    });

}