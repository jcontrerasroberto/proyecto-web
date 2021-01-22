function addEntry(data) {
    console.log(data);
    console.log(data["boleta"]);
    var text = data["apellidop"] + " " + data["apellidom"] + " " + data["nombre"] + " - " + data["boleta"];
    var curp = data["curp"];

    var contenedor = document.getElementById("resultados-list");
    console.log(contenedor);

    var contenedor_entry = document.createElement('div');
    contenedor_entry.setAttribute('class', 'entrada-container');

    var a_box = document.createElement('a');
    a_box.setAttribute('href', '/vistas/show_info.php?key=' + data["boleta"] );
    a_box.setAttribute('class', 'list-group-item list-group-item-action resultado-item');

    var h3_info = document.createElement('h5');
    h3_info.innerText = text;

    var p_curp = document.createElement('p');
    p_curp.innerText = curp;

    a_box.appendChild(h3_info);
    a_box.appendChild(p_curp);

    contenedor_entry.appendChild(a_box);
    contenedor.appendChild(contenedor_entry);
}