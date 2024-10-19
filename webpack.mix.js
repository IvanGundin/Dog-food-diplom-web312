const mix = require('laravel-mix');

mix.js('resources/js/react/src/index.js', 'public/js')  // Путь к React-коду
    .react()                                              // Обработка React
    .setPublicPath('public')                              // Путь к сборке
    .sourceMaps();                                        // Источники для отладки
