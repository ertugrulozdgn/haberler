require('./bootstrap');

require('multiselect');

require('select2');

require('fontawesome-4.7');

import alertifyjs from 'alertifyjs';
window.alertify = alertifyjs;

require('jquery-ui');

require('ckeditor');

require('./send_form');

require('./app');

require('./table');
require('./html_editor');


Table.init();
HtmlEditor.init();




