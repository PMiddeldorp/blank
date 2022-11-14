// webpack.dev.js
const path = require( 'path' );

module.exports = {
    entry: [
        __dirname + '/assets/js/main.js',
        __dirname + '/sass/styles.scss'
    ],
    output: {
        path: path.resolve(__dirname, 'development'),
        filename: 'main.js',
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: 'babel-loader',
            }, {
                test: /\.scss$/,
                exclude: /node_modules/,
                use: [
                    {
                        loader: 'file-loader',
                        options: { outputPath: '/', name: '[name].css'}
                    },
                    'sass-loader'
                ]
            }
        ]
    }
};
