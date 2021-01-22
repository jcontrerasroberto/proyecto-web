function llenarInfo() {
    const entradas = document.querySelectorAll('#form input');
    const selectores = document.querySelectorAll('#form select');
    console.log(entradas);
    entradas.forEach(
        element => {
            if (element.name != "") {
                pos = document.getElementById("mostrar_" + element.name);
                pos.innerHTML = '';
                if (element.name == "sexo") {
                    if (element.checked) {
                        var node = document.createTextNode((element.id).toUpperCase());
                        pos.appendChild(node);
                    }else{
                        var node = document.createTextNode("femenino".toUpperCase());
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
            pos = document.getElementById("mostrar_" + element.name);
            pos.innerHTML = '';
            if (element.name == "escuela" && element.value == "otro")
                document.getElementById("label_nombreE").style.display = "block";
            var node = document.createTextNode((element.value).toUpperCase());
            pos.appendChild(node);
        }
    )
}

function guardarDatos(boletaOriginal) {
    var alumno = {
        "boletaOriginal": boletaOriginal
    }
    const entradas = document.querySelectorAll('#form input');
    const selectores = document.querySelectorAll('#form select');
    entradas.forEach(
        element => {
            if (element.name != "") {
                if (element.name == "sexo") {
                    if (element.checked) {
                        alumno[element.name] = element.value;
                    }
                }else{
                    alumno[element.name] = element.value;
                }
                
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
        url: '../backend/update_alumno.php',
        type: 'post',
        dataType: 'json',
        contentType: 'application/json',
        success: function (data) {
            console.log(data);
            if(data[0].success){
                window.location.href="registro_exitoso.html?id="+data[0].id+"&curp="+data[0].curp;
            }else{
                document.getElementById("errorbd").style.display="block";
            }
        },
        data: jsonformat
    });

}

function deleteUser(boleta) {
    var alumno = {
        "boleta": boleta
    }
    var jsonformat = JSON.stringify(alumno);
    $.ajax({
        url: '../backend/delete_alumno.php',
        type: 'post',
        dataType: 'json',
        contentType: 'application/json',
        success: function (data) {
            console.log(data);
            if(data[0].success){
                //window.location.href="registro_exitoso.html?id="+data[0].id+"&curp="+data[0].curp;
            }else{
                document.getElementById("errorbd").style.display="block";
            }
        },
        data: jsonformat
    });

}