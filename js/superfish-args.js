jQuery(function ($) {
  'use strict';
  $('.js-superfish').superfish({
    'delay': 100,                                         // 0.1 second delay on mouseout
    'animation': {'opacity': 'show', 'height': 'show'}, // fade-in and slide-down animation
    'dropShadows': false, // disable drop shadows
    'speed': 0
  });
});
