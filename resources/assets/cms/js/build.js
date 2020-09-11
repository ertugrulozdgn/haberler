// Local scripts
require('./bootstrap');
require('./send_form');
require('./app');
require('./table');


// NPM Packages
require('multiselect');
//require('select2');
require('fontawesome-4.7');
require('jquery-ui');

import alertifyjs from 'alertifyjs';
window.alertify = alertifyjs;

// require('tinymce');
// require('ckeditor');




Table.init();

App.imagePreview();
App.multiSelect();
App.textEditor();
//App.select2();





