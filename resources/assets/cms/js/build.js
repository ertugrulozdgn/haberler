// Local scripts
require('./bootstrap');
require('./send_form');
require('./app');
require('./table');



// NPM Packages
require('multiselect');
require('select2');
require('bootstrap-tagsinput');

require('jquery-ui/ui/widgets/sortable');
//require('jquery-ui');
// require('imask');
// require('moment')

import alertifyjs from 'alertifyjs';
window.alertify = alertifyjs;

// require('tinymce');
// require('ckeditor');




Table.init();

SendForm.init();

App.imagePreview();
App.multiSelect();
App.textEditor();
App.sortable();
//App.select2();





