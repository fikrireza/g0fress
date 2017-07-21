let mix = require('laravel-mix');

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


// Default
	mix.scripts([
	    'public/plugin/jquery/jquery-3.2.0.min.js',
	    'public/amadeo/js/navbar.js'
	], 'public/amadeo/js/mix/default.js').version();
// End Default

// Home Page
	mix.styles([
	    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
	    'public/plugin/font-awesome/css/font-awesome.min.css',
	    'public/amadeo/css/public.css',
	    'public/amadeo/css/home.css',
	    'public/plugin/owl-carousel/owl.carousel.css',
	    'public/plugin/owl-carousel/owl.theme.css',
	    'public/amadeo/css/events-list-item-vidio.css'
	], 'public/amadeo/css/mix/home.css').version();

	mix.scripts([
	    'public/plugin/jquery/jquery-3.2.0.min.js',
	    'public/amadeo/js/navbar.js',
	    'public/plugin/owl-carousel/owl.carousel.js',
	    'public/amadeo/js/home.js',
	    'public/amadeo/js/youtube-embed.js'
	], 'public/amadeo/js/mix/home.js').version();
// End Home Page

// About Page
	mix.styles([
	    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
	    'public/plugin/font-awesome/css/font-awesome.min.css',
	    'public/amadeo/css/public.css',
	    'public/amadeo/css/public-sub-page.css',
	    'public/amadeo/css/for-share-wrapper.css',
	    'public/amadeo/css/about.css'
	], 'public/amadeo/css/mix/about.css').version();
// End About Page

// Contact Page
	mix.styles([
	    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
	    'public/plugin/font-awesome/css/font-awesome.min.css',
	    'public/amadeo/css/public.css',
	    'public/amadeo/css/public-sub-page.css',
	    'public/amadeo/css/contact.css',
	], 'public/amadeo/css/mix/contact.css').version();

	mix.scripts([
	    'public/plugin/jquery/jquery-3.2.0.min.js',
	    'public/amadeo/js/navbar.js',
	    'public/amadeo/js/contact.js',
	], 'public/amadeo/js/mix/contact.js').version();
// End Contact Page

// Event Index Page
	mix.styles([
	    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
	    'public/plugin/font-awesome/css/font-awesome.min.css',
	    'public/amadeo/css/public.css',
	    'public/amadeo/css/public-sub-page.css',
	    'public/amadeo/css/events-list-item-normal.css',
	    'public/amadeo/css/events-list-item-vidio.css',
	    'public/amadeo/css/for-share-wrapper.css',
	    'public/plugin/owl-carousel/owl.carousel.css',
	    'public/plugin/owl-carousel/owl.theme.css'
	], 'public/amadeo/css/mix/event-index.css').version();

	mix.scripts([
	    'public/plugin/jquery/jquery-3.2.0.min.js',
	    'public/amadeo/js/navbar.js',
	    'public/plugin/owl-carousel/owl.carousel.js',
	    'public/amadeo/js/events-index.js',
	    'public/amadeo/js/youtube-embed.js'
	], 'public/amadeo/js/mix/event-index.js').version();
// End Event Index Page

// Event Index News Page
	mix.styles([
	    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
	    'public/plugin/font-awesome/css/font-awesome.min.css',
	    'public/amadeo/css/public.css',
	    'public/amadeo/css/public-sub-page.css',
	    'public/amadeo/css/events-list-item-normal-not-owl.css',
	    'public/amadeo/css/for-share-wrapper.css'
	], 'public/amadeo/css/mix/event-index-news.css').version();
// End Event Index News Page

// Event Index Vidio Page
	mix.styles([
	    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
	    'public/plugin/font-awesome/css/font-awesome.min.css',
	    'public/amadeo/css/public.css',
	    'public/amadeo/css/events-list-item-vidio.css',
	    'public/amadeo/css/for-share-wrapper.css'
	], 'public/amadeo/css/mix/event-index-vidio.css').version();

	mix.scripts([
	    'public/plugin/jquery/jquery-3.2.0.min.js',
	    'public/amadeo/js/navbar.js',
	    'public/amadeo/js/youtube-embed.js'
	], 'public/amadeo/js/mix/event-index-vidio.js').version();
// End Event Index Vidio Page

// News Index Page
	mix.styles([
	    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
	    'public/plugin/font-awesome/css/font-awesome.min.css',
	    'public/amadeo/css/public.css',
	    'public/amadeo/css/public-sub-page.css',
	    'public/amadeo/css/news-index.css'
	], 'public/amadeo/css/mix/news-index.css').version();
// End News Index Page

// News View Page
	mix.styles([
	    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
	    'public/plugin/font-awesome/css/font-awesome.min.css',
	    'public/amadeo/css/public.css',
	    'public/amadeo/css/public-sub-page.css',
	    'public/amadeo/css/news-view.css'
	], 'public/amadeo/css/mix/news-view.css').version();
// End News View Page

// Produk Index Page
	mix.styles([
	    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
	    'public/plugin/font-awesome/css/font-awesome.min.css',
	    'public/amadeo/css/public.css',
	    'public/amadeo/css/public-sub-page.css',
	    'public/amadeo/css/for-share-wrapper.css',
	    'public/plugin/owl-carousel/owl.theme.css',
	    'public/plugin/owl-carousel/owl.carousel.css',
	    'public/amadeo/css/produk-index.css',
	    'public/amadeo/css/produk-slider-category.css'
	], 'public/amadeo/css/mix/produk-index.css').version();

	mix.scripts([
	    'public/plugin/jquery/jquery-3.2.0.min.js',
	    'public/amadeo/js/navbar.js',
	    'public/amadeo/js/produk-index.js',
	    'public/plugin/owl-carousel/owl.carousel.js'
	], 'public/amadeo/js/mix/produk-index.js').version();
// End Produk Index Page

// Produk View Page
	mix.styles([
	    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
	    'public/plugin/font-awesome/css/font-awesome.min.css',
	    'public/amadeo/css/public.css',
	    'public/amadeo/css/public-sub-page.css',
	    'public/amadeo/css/for-share-wrapper.css',
	    'public/amadeo/css/produk-view.css',
	], 'public/amadeo/css/mix/produk-view.css').version();

	mix.scripts([
	    'public/plugin/jquery/jquery-3.2.0.min.js',
	    'public/amadeo/js/navbar.js',
	    'public/amadeo/js/click-scroll-animate.js',
	    'public/amadeo/js/produk-view.js'
	], 'public/amadeo/js/mix/produk-view.js').version();
// End Produk View Page
