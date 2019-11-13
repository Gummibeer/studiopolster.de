const mix = require('laravel-mix');
require('laravel-mix-purgecss');
const glob = require('glob');
const path = require('path');

Mix.listen('configReady', webpackConfig => {
    webpackConfig.module.rules.forEach(rule => {
        if (Array.isArray(rule.use)) {
            rule.use.forEach(ruleUse => {
                if (ruleUse.loader === 'resolve-url-loader') {
                    ruleUse.options.engine = 'postcss';
                }
            });
        }
    });
});
mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.svg(\?.*)?$/,
                use: [
                    {
                        loader: 'svgo-loader',
                        options: {
                            plugins: [
                                {removeTitle: true},
                                {convertColors: {shorthex: false}},
                                {convertPathData: false}
                            ]
                        }
                    },
                    {loader: 'svg-transform-loader'}
                ]
            }
        ]
    }
});
mix.options({
    processCssUrls: true,
    postCss: [
        require('postcss-move-props-to-bg-image-query'),
        require('postcss-discard-comments')({
            removeAll: true,
        }),
    ],
});
mix.purgeCss({
    whitelistPatterns: [
        /body-home/,
    ]
});
mix.version();

mix
    .sass('resources/assets/scss/app.scss', 'css')
    .js('resources/assets/js/app.js', 'public/js/app.js')
    .copy('resources/assets/img/favicon.ico', 'public/favicon.ico')
    .copy('resources/assets/img/home.svg', 'public/images/home.svg')
;

glob.sync(path.resolve(__dirname, 'resources', 'assets', 'img', 'work') + '/*.jpg').forEach(jpg => {
    mix.copy(jpg, 'public/images/work/' + path.basename(jpg));
});

glob.sync(path.resolve(__dirname, 'resources', 'assets', 'downloads') + '/*.pdf').forEach(pdf => {
    mix.copy(pdf, 'public/downloads/' + path.basename(pdf));
});