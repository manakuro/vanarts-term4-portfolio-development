module.exports = function() {
    return {
        'document_root': 'http://vanarts_portfolio',
        'js': {
            'app': './app/js/**/*.js',
            'ignore': './app/js/vendors/**/*.js',
            'dist': './dist/js/',
            'bundled': 'bundle.js'
        },
        'css': {
            'app': './app/css/**/*.scss',
            'dist': './dist/css/'
        },
        'img': {
            'app': './app/img/**/*.+(png|jpg|gif|svg)',
            'dist': './dist/img/'
        },
        'html': {
            'app': ['./app/template/header.php', './app/template/footer.php'],
            'dist': '../template/'
        },
        'fonts': {
            'app': './app/fonts/**/*',
            'dist': './dist/fonts/'
        } 
    };
};