function getPDF() {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const ID = urlParams.get('id');
    const CURP = urlParams.get('curp');
    //window.location.href="../backend/descargarpdf.php?id="+ID;
    var datos = {
        "id" : ID,
        "curp" : CURP
    };
    $.ajax({
        url: '../backend/descargarpdf.php',
        type: 'post',
        dataType: 'json',
        success: function (data) {
           
        },
        data: datos
    });
}