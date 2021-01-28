const currentTask = process.env.npm_lifecycle_event;
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const { WebpackManifestPlugin } = require('webpack-manifest-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const fse = require('fs-extra');

const postCSSPlugins = [
    require('postcss-import'),
    require('postcss-mixins'),
    require('postcss-simple-vars'),
    require('postcss-nested'),
    require('postcss-hexrgba'),
    require('postcss-color-function'),
    require('autoprefixer'),
];

class RunAfterCompile {
    apply(compiler) {
        compiler.hooks.done.tap('Update functions.php', function () {
            // update functions php here
            const manifest = fse.readJsonSync('./dist/manifest.json');

            fse.readFile('./functions.php', 'utf8', function (err, data) {
                if (err) {
                    console.log(err);
                }
                const homeRegex = new RegExp("/dist/home.+?'", 'g');
                const practiceAreaRegex = new RegExp("/dist/practiceArea.+?'", 'g');
                const scriptsRegEx = new RegExp("/dist/scripts.+?'", 'g');
                const vendorsRegEx = new RegExp("/dist/vendors.+?'", 'g');
                const cssRegEx = new RegExp("/dist/styles.+?'", 'g');

                let result = data
                    .replace(scriptsRegEx, `/dist/${manifest['scripts.js']}'`)
                    .replace(vendorsRegEx, `/dist/${manifest['vendors.js']}'`)
                    .replace(cssRegEx, `/dist/${manifest['scripts.css']}'`)
                    .replace(homeRegex, `/dist/${manifest['home.js']}'`)
                    .replace(practiceAreaRegex, `/dist/${manifest['practiceArea.js']}'`);

                fse.writeFile('./functions.php', result, 'utf8', function (err) {
                    if (err) return console.log(err);
                });
            });
        });
    }
}

let cssConfig = {
    test: /\.css$/i,
    use: [
        'css-loader?url=false',
        {
            loader: 'postcss-loader',
            options: {
                postcssOptions: {
                    plugins: postCSSPlugins,
                },
            },
        },
    ],
};

let sassConfig = {
    test: /\.s[ac]ss$/i,
    use: [
        {
            loader: 'css-loader',
            options: {
                sourceMap: true,
                importLoaders: 1,
            },
        },
        {
            loader: 'sass-loader',
            options: {
                sourceMap: true,
            },
        },
    ],
    sideEffects: true,
};

let config = {
    entry: {
        scripts: './js/scripts.js',
        home: './js/home.js',
        practiceArea: './js/practiceArea.js',
    },
    plugins: [],
    module: {
        rules: [
            cssConfig,
            sassConfig,
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [
                            '@babel/preset-react',
                            ['@babel/preset-env', { debug: true, useBuiltIns: 'usage', corejs: 3 }],
                        ],
                    },
                },
            },
        ],
    },
};

if (currentTask == 'devFast') {
    config.devtool = 'source-map';
    cssConfig.use.unshift('style-loader');
    sassConfig.use.unshift('style-loader');
    config.output = {
        filename: '[name].js',
        chunkFilename: '[name].js',
        publicPath: 'http://localhost:3000/',
    };
    config.devServer = {
        before: function (app, server) {
            // server._watch(["./**/*.php", "./**/*.js"])
            server._watch(['./**/*.php', '!./functions.php']);
        },
        public: 'http://localhost:3000',
        publicPath: 'http://localhost:3000/',
        disableHostCheck: true,
        contentBase: path.join(__dirname),
        contentBasePublicPath: 'http://localhost:3000/',
        hot: true,
        port: 3000,
        headers: {
            'Access-Control-Allow-Origin': '*',
        },
    };
    config.mode = 'development';
    config.optimization = {
        runtimeChunk: 'single',
    };
}

if (currentTask == 'build' || currentTask == 'buildWatch') {
    cssConfig.use.unshift(MiniCssExtractPlugin.loader);
    sassConfig.use.unshift(MiniCssExtractPlugin.loader);
    postCSSPlugins.push(require('cssnano'));
    config.output = {
        publicPath: '/wp-content/themes/acv/dist/',
        filename: '[name].[chunkhash].js',
        chunkFilename: '[name].[chunkhash].js',
        path: path.resolve(__dirname, 'dist'),
    };
    config.mode = 'production';
    config.optimization = {
        splitChunks: {
            cacheGroups: {
                commons: {
                    test: /[\\/]node_modules[\\/]/,
                    name: 'vendors',
                    chunks: 'all',
                },
            },
        },
        minimize: true,
        minimizer: [
            new TerserPlugin({
                extractComments: true,
                parallel: true,
            }),
        ],
    };
    config.plugins.push(
        new CleanWebpackPlugin(),
        new MiniCssExtractPlugin({ filename: 'styles.[chunkhash].css' }),
        new WebpackManifestPlugin({ publicPath: '' }),
        new RunAfterCompile()
    );
}

module.exports = config;
