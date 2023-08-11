const btn_add = document.getElementById('btn_add');
const fieldset = document.getElementById('fieldset');

let i = 0;

btn_add.onclick = () => {
    i++;
    let label_quantity = document.createElement('label'),
    input_quantity = document.createElement('input'),
    label_tool = document.createElement('label'),
    input_tool = document.createElement('input');

    input_quantity.setAttribute('name', 'cantidad_solicitada' + i);
    input_quantity.setAttribute('type', 'number');

    input_tool.setAttribute('name', 'herramienta' + i);
    input_tool.setAttribute('type', 'text');

    label_quantity.innerHTML = 'Cantidad solicitada';
    label_tool.innerHTML = 'Herramienta';

    fieldset.appendChild(label_quantity);
    fieldset.appendChild(input_quantity);
    fieldset.appendChild(label_tool);
    fieldset.appendChild(input_tool);
}
