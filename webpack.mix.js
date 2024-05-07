const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .ts('resources/js/app.ts', 'public/js');
