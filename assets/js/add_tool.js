const btn_add = document.getElementById('btn_add');
const fieldset = document.getElementById('fieldset');

btn_add.onclick = () => {
    let label_quantity = document.createElement('label'),
    input_quantity = document.createElement('input'),
    label_tool = document.createElement('label'),
    input_tool = document.createElement('input');

    label_quantity.innerHTML = 'Cantidad';
    label_tool.innerHTML = 'Herramienta';

    fieldset.appendChild(label_quantity);
    fieldset.appendChild(input_quantity);
    fieldset.appendChild(label_tool);
    fieldset.appendChild(input_tool);
}