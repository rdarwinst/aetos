/* Dependencias de SASS */
const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const purgecss = require('gulp-purgecss');

/* Dependencias de JS */
const terser = require('gulp-terser');
const bro = require('gulp-bro');

/* Dependencias de imagenes */
const imagemin = require('gulp-imagemin');
const avif = require('gulp-avif');
const webp = require('gulp-webp');

/* Otras dependencias */
const sm = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const concat = require('gulp-concat');
const plumber = require('gulp-plumber');

/* Paths */
const paths = {
    css: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    img: 'src/img/**/*',
    fonts: 'src/fonts/**/*',
};

/* Funciones */
function css(done) {
    src(paths.css)
        .pipe(sm.init())
        .pipe(plumber())
        .pipe(sass())
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sm.write('.'))
        .pipe(dest('build/css'))
    done();
}

function buildcss(done) {
    src('build/css/app.css')
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(purgecss({
            content: ['index.html', 'build/js/**/*.js']
        }))
        .pipe(dest('build/css'));
    done();

}

function js(done) {
    src(paths.js)
        .pipe(sm.init())
        .pipe(plumber())
        .pipe(bro())
        .pipe(concat('bundle.js'))
        .pipe(terser())
        .pipe(rename({ suffix: '.min' }))
        .pipe(sm.write('.'))
        .pipe(dest('build/js'))
    done();
}

function imagenes(done) {
    src(paths.img)
        .pipe(imagemin({ optimizationLevel: 3 }))
        .pipe(dest('build/img'))
    done();
}

function convertirAvif(done) {
    const opciones = {
        quality: 70,
    };

    src('src/img/**/*{jpg,jpeg,png}')
        .pipe(avif(opciones))
        .pipe(dest('build/img'))
    done();
}

function convertirWebp(done) {
    const opciones = {
        quality: 70,
    };

    src('src/img/**/*{jpg,jpeg,png}')
        .pipe(webp(opciones))
        .pipe(dest('build/img'))
    done();
}

function dev(done) {
    watch(paths.css, css)
    watch(paths.js, js)
    done();
}

exports.css = css;
exports.js = js;
exports.imagenes = imagenes;
exports.convertirAvif = convertirAvif;
exports.convertirWebp = convertirWebp;
exports.dev = dev;

exports.default = series(imagenes, convertirAvif, convertirWebp, css, js, dev);
exports.build = series(buildcss);