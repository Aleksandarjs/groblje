const mix = require('laravel-mix');

mix.sass('resources/sass/main.scss', 'public/assets/stylesheets', {
    sassOptions: {
        outputStyle: 'compressed',
        }
    })
    .options({ processCssUrls: false }
)