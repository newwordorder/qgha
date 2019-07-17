const purgecss = require('@fullhuman/postcss-purgecss')({
  // Specify the paths to all of the template files in your project
  content: [
    '*/**.php',
    // etc.
  ],

  // Include any special characters you're using in this regular expression
  defaultExtractor: content => content.match(/[A-Za-z0-9-_:/]+/g) || [],
});

// postcss.config.js
module.exports = {
  plugins: [
    require('autoprefixer'),
    require('cssnano'),
    //...(process.env.NODE_ENV === 'production' ? [purgecss] : []),
  ],
};
