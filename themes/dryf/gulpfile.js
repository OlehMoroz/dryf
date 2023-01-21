'use strict';

/* параметри autoprefixer */
var autoprefixerList = [
    'Chrome >= 45',
    'Firefox ESR',
    'Edge >= 12',
    'Explorer >= 10',
    'iOS >= 9',
    'Safari >= 9',
    'Android >= 4.4',
    'Opera >= 30'
];

/* шляхи до вихідних файлів */
var path = {
    build: {
        js: 'build/js/',
        css: 'build/css/',
        img: 'build/images/',
    },
    src: {
        js: 'src/js/**/*.js',
        style: 'src/style/**/*.scss',
        img: 'src/img/**/*.*'
    },
    watch: {
        js: 'src/js/**/*.js',
        css: 'src/style/**/*.scss',
        img: 'src/img/**/*.*',
        css_build: 'build/css/*.css',
        js_build: 'build/js/*.js'
    },
    clean: './build/*'
};

/* налаштування сервера */
var config = {
    server: {
        baseDir: './build'
    },
    notify: false,
    version: {
        value: '%MDS%',
        append: {
            key: 'v',
            to: ['css', 'js'],
        },
    }
};

/* підключення gulp і плагінів */
var gulp = require('gulp'),                                 // підключення Gulp
    webserver = require('browser-sync'),                    // авто оновлення сторінки
    plumber = require('gulp-plumber'),                      // відслідковування помилок
    rigger = require('gulp-rigger'),                        // модуль імпортк
    fileinclude = require('gulp-file-include'),
    sass = require('gulp-sass')(require('sass')),           // компіляція SASS (SCSS) в CSS
    autoprefixer = require('gulp-autoprefixer'),            // авто встановлення autoprefixer
    cleanCSS = require('gulp-clean-css'),                   // мінімізація CSS
    uglify = require('gulp-uglify-es').default,             // мінімізація JavaScript
    cache = require('gulp-cache'),                          // кешування
    imagemin = require('gulp-imagemin'),                    // зжимання PNG, JPEG, GIF і SVG зодраження
    jpegrecompress = require('imagemin-jpeg-recompress'),   // зжимання jpeg	
    pngquant = require('imagemin-pngquant'),                // зжимання png
    rimraf = require('gulp-rimraf'),                        // видалення файлів
    version = require('gulp-version-number'),               // додавання версій css і js файлів
    rename = require('gulp-rename');

/* Задачі */

// запуск сервера
gulp.task('webserver', function () {
    webserver(config);
});

// Стілі
gulp.task('css:build', function () {
    return gulp.src(path.src.style)     // отримання main.scss
        .pipe(plumber())                // відслідковування помилок
        .pipe(sass())                   // scss -> css
        .pipe(autoprefixer({            // додавання префіксів
            overrideBrowserslist: autoprefixerList
        }))
        .pipe(gulp.dest(path.build.css))
        .pipe(rename({ suffix: '.min' }))
        .pipe(cleanCSS())                           // мінімізація CSS
        .pipe(gulp.dest(path.build.css))            // вигрузка build
        .pipe(webserver.reload({ stream: true }));  // перезавантаження сервера
});

// js
gulp.task('js:build', function () {
    return gulp.src(path.src.js)                    // отримання main.js
        .pipe(plumber())                            // відслідковування помилок
        .pipe(rigger())                             // імпорт в main.js
        .pipe(gulp.dest(path.build.js))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())                             // мінімізація js
        .pipe(gulp.dest(path.build.js))             // отримання готового файла
        .pipe(webserver.reload({ stream: true }));  // перезавантаження сервера
});


// Картинки
gulp.task('image:build', function () {
    return gulp.src(path.src.img)                       // шдяях до вихідних картинок
        .pipe(cache(imagemin([                          // зжимання картинок
            imagemin.gifsicle({ interlaced: true }),
            jpegrecompress({
                progressive: true,
                max: 90,
                min: 80
            }),
            pngquant(),
            imagemin.svgo({ plugins: [{ removeViewBox: false }] })
        ])))
        .pipe(gulp.dest(path.build.img));               // вивантаження файлів
});

// Видалення катологк build 
gulp.task('clean:build', function () {
    return gulp.src(path.clean, { read: false })
        .pipe(rimraf());
});

// видалення кешу
gulp.task('cache:clear', function () {
    cache.clearAll();
});

// Збірка
gulp.task('build',
    gulp.series('clean:build',
        gulp.parallel(
            'css:build',
            'js:build',
            'image:build',
        )
    )
);

// Старт задач при зміні файлів
gulp.task('watch', function () {
    gulp.watch(path.watch.css, gulp.series('css:build'));
    gulp.watch(path.watch.js, gulp.series('js:build'));
    gulp.watch(path.watch.img, gulp.series('image:build'));
    gulp.watch(path.watch.css_build).on('change', webserver.reload);
    gulp.watch(path.watch.js_build).on('change', webserver.reload);
});

// Задача за замовчуванням
gulp.task('default', gulp.series(
    'build',
    gulp.parallel('webserver','watch')      
));
