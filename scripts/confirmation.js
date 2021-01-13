function llenarInfo(){
    const entradas = document.querySelectorAll('#form input');
    const selectores = document.querySelectorAll('#form select');
    entradas.forEach(
        element => {
            if(element.name != "") {
                pos = document.getElementById("mostrar_"+element.name);
                pos.innerHTML = '';
                if(element.name == "sexo"){
                    if(element.checked){
                        var node = document.createTextNode((element.value).toUpperCase());
                        pos.appendChild(node);
                    }
                }else{
                    var node = document.createTextNode((element.value).toUpperCase());
                    pos.appendChild(node);
                }
                
            }
            
        }
    );

    selectores.forEach(
        element => {
            console.log(element.value);
            pos = document.getElementById("mostrar_"+element.name);
            pos.innerHTML = '';
            if(element.name == "escuela" && element.value == "otro")
                document.getElementById("label_nombreE").style.display = "block";
            var node = document.createTextNode((element.value).toUpperCase());
            pos.appendChild(node);
        }
    )
}

function guardarDatos(){
    
}