require('./bootstrap');

window.$ = window.jQuery = require('jquery');

require('./send_form');

require('./app');

require('./table');
require('./html_editor');

Table.init();
HtmlEditor.init();


