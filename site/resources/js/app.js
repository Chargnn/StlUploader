require('./bootstrap');
const AColorPicker = require('a-color-picker');

let picker = AColorPicker.from('div.color-picker');
picker.on('change', (picker, color) => { document.getElementById('tags-color').value = AColorPicker.parseColor(color, 'hex'); })
