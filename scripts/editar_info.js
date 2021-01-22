
const form = document.getElementById('form');
const inputs = document.querySelectorAll('#form input');
const selEscuela = document.querySelector('#selEscuela');
const selectors = document.querySelectorAll('#form select');
const count_error = 0;

const expressions = {
    nombre: /^[a-zA-ZÀ-ÿ\s]+$/,
    boleta: /^P{2}\d{8}$|^P{1}E{1}\d{8}$|^\d{10}$/,
    curp: /^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/,
    codpostal: /^\d{5}$/,
    tel: /^\d{10}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    noVacio: /^\w/
}

const campos = {
    boleta: true,
    nombre: true,
    apellidop: true,
    apellidom: true,
    daten: true,
    curp: true,
    calle: true,
    colonia: true,
    codpostal: true,
    tel: true,
    correo: true,
    nombreE: true,
    promedio: true,
    escuela: true,
    entidad: true,
    escom: true
}

const validCampo = (expression, input, campo) => {
    if(expression.test(input)){
        document.getElementById(`group-${campo}`).classList.remove('form-group-notcorrect');
        document.getElementById(`group-${campo}`).classList.add('form-group-correct');
        document.querySelector(`#group-${campo} i`).classList.remove('fa-times');
        document.querySelector(`#group-${campo} i`).classList.add('fa-check');
        document.querySelector(`#group-${campo} .form-input-err`).classList.remove('form-input-err-active');
        campos[campo]=true;
    }else{
        document.getElementById(`group-${campo}`).classList.remove('form-group-correct');
        document.getElementById(`group-${campo}`).classList.add('form-group-notcorrect');
        document.querySelector(`#group-${campo} i`).classList.remove('fa-check');
        document.querySelector(`#group-${campo} i`).classList.add('fa-times');
        document.querySelector(`#group-${campo} .form-input-err`).classList.add('form-input-err-active');
        campos[campo]=false;
    }
}

const validForm = (e) => {
    switch (e.target.name){
        case "boleta":
            validCampo(expressions.boleta, e.target.value, 'boleta');
        break;
        case "nombre":
            validCampo(expressions.nombre, e.target.value, 'nombre');
        break;
        case "apellidop":
            validCampo(expressions.nombre, e.target.value, 'apellidop');
        break;
        case "apellidom":
            validCampo(expressions.nombre, e.target.value, 'apellidom');
        break;
        case "curp":
            validCampo(expressions.curp, e.target.value, 'curp');
        break;
        case "calle":
            validCampo(expressions.noVacio, e.target.value, 'calle');
        break;
        case "colonia":
            validCampo(expressions.noVacio, e.target.value, 'colonia');
        break;
        case "codpostal":
            validCampo(expressions.codpostal, e.target.value, 'codpostal');
        break;
        case "tel":
            validCampo(expressions.tel, e.target.value, 'tel');
        break;
        case "correo":
            validCampo(expressions.correo, e.target.value, 'correo');
        break;
        case "daten":
            validCampo(expressions.noVacio, e.target.value, 'daten');
        break;
        case "nombreE":
            validCampo(expressions.noVacio, e.target.value, 'nombreE');
        break;
        case "promedio":
            if(e.target.value>=0 && e.target.value<=10 && expressions.noVacio.test(e.target.value)){
                document.getElementById('group-promedio').classList.remove('form-group-notcorrect');
                document.getElementById('group-promedio').classList.add('form-group-correct');
                document.querySelector('#group-promedio i').classList.remove('fa-times');
                document.querySelector('#group-promedio i').classList.add('fa-check');
                document.querySelector('#group-promedio .form-input-err').classList.remove('form-input-err-active');
                campos.promedio=true;
            }else{
                document.getElementById('group-promedio').classList.remove('form-group-correct');
                document.getElementById('group-promedio').classList.add('form-group-notcorrect');
                document.querySelector('#group-promedio i').classList.remove('fa-check');
                document.querySelector('#group-promedio i').classList.add('fa-times');
                document.querySelector('#group-promedio .form-input-err').classList.add('form-input-err-active');
                campos.promedio=false;
            }
        break;
    }
}

inputs.forEach( (input) => {
    input.addEventListener('keyup', validForm);
    input.addEventListener('blur', validForm);
});

selectors.forEach( (select) => {
    select.addEventListener('change', (e) => {
        if(e.target.value == 'null'){
            console.log(e.target.name);
            campos[e.target.name] = false;
        }else{
            campos[e.target.name] = true;
        }
    })
});

selEscuela.addEventListener('change', (e) => {  //para mostrar el campo nombreE si en escuela se selecciona OTRO
    if(e.target.value == 'otro'){
        document.querySelector('.nombreE').classList.add('nombreE-active');
        campos.nombreE=false;
    }else{
        document.querySelector('.nombreE').classList.remove('nombreE-active');
        campos.nombreE=true;
    }
});

form.addEventListener('submit', (e) => {
    e.preventDefault();
    if(campos.boleta && campos.nombre && campos.apellidop && campos.apellidom && campos.daten && campos.curp && campos.calle && campos.colonia && campos.codpostal && campos.correo && campos.nombreE && campos.promedio && campos.escuela && campos.entidad && campos.escom){
        console.log('Formulario llenado correctamente');
        document.querySelector('#form-mens').classList.remove('form-mens-active');
        llenarInfo();
        $("#myModal").modal();

    }else{
        console.log('nelPastel');
        document.querySelector('#form-mens').classList.add('form-mens-active');
    }
    
});

const formGroups = document.querySelectorAll('div.form-group');
form.addEventListener('reset', () => {
    campos.boleta = false;
    campos.nombre = false;
    campos.apellidop = false;
    campos.apellidom = false;
    campos.daten = false;
    campos.curp = false;
    campos.calle = false;
    campos.colonia = false;
    campos.codpostal = false;
    campos.tel = false;
    campos.correo = false;
    campos.nombreE = true,
    campos.promedio = false;
    campos.escuela = false;
    campos.entidad = false;
    campos.escom = false;
    
    formGroups.forEach( (formGroup) => {
        if(formGroup.querySelector('input')){
            formGroup.classList.remove('form-group-correct');
            formGroup.classList.add('form-group-notcorrect');
        }
        if(formGroup.querySelector('i'))
            formGroup.querySelector('i').classList.remove('fa-check');
    });
});
