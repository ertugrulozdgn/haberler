import jquery from 'jquery';
var $ = jQuery;
global.$ = $;
global.jQuery = $;

import popper from 'popper.js';
import bootstrap from 'bootstrap';

import Swiper from 'swiper';
global.Swiper = Swiper;

require('./sliders');

Slider.headlines();
