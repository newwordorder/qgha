const purgecss=require("@fullhuman/postcss-purgecss")({content:["./src/**/*.html","**.php"],defaultExtractor:e=>e.match(/[A-Za-z0-9-_:\/]+/g)||[]});module.exports={plugins:[require("autoprefixer"),require("cssnano"),..."production"===process.env.NODE_ENV?[purgecss]:[]]};