const mix = require("laravel-mix");

mix.sass("resources/assets/sass/style.scss", "public/css")
    .js("resources/assets/js/common.js", "public/js")
    .js("resources/assets/js/payment.js", "public/js");
