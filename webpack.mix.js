const mix = require("laravel-mix")

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

if (!mix.inProduction()) {
    mix.webpackConfig({
        devtool: "source-map"
    }).sourceMaps()
}

mix
    // .js('resources/js/app.js', 'public/js')
    // .sass('resources/sass/app.scss', 'public/css')
    .react("resources/js/image-manager/index.js", "public/js/image-manager.js")

    .browserSync({
        host: "www.laravel-react.test",
        port: 3000,
        proxy: {
            target: "laravel-react.test:8080"
        }
    })

//add versioning
mix.version()
