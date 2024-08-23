<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomepageSelectionController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectTypeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TagController;

//Language Change
Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])) {
        abort(400);
    }
    Session()->put('locale', $locale);
    Session::get('locale');
    return back();
    // return redirect()->route('home',Session::get('locale'));
})->name('lang');

// Route::get('/set_language/{lang}', [App\Http\Controllers\Controller::class, 'set_language'])->name('set_language');

 Route::post('/session/store', [HomeController::class, 'setSession'])->name('setSession');

Route::get('/login', [HomeController::class, 'index'])->name('login');
Route::get('/home/{idiom?}', [HomeController::class, 'index'])->name('home');
Route::get('/{idiom?}', [HomeController::class, 'index']);
Route::get('/{idiom?}/cases', [HomeController::class, 'cases'])->name('cases');
Route::get('/{idiom?}/cases/{project?}', [HomeController::class, 'detailCases'])->name('detailCases');
Route::get('/{idiom?}/stafff', [HomeController::class, 'stafff'])->name('stafff');

Route::get('/{idiom?}/dataResearch', [HomeController::class, 'dataResearch'])->name('dataResearch');
Route::get('/{idiom?}/dataResearch/{id?}', [HomeController::class, 'detail'])->name('detailResearch');

Route::get('/{idiom?}/services', [HomeController::class, 'service'])->name('service');
Route::get('/{idiom?}/services/{id?}', [HomeController::class, 'detailservice'])->name('detailService');

Route::post('/newsletter/store', [UserController::class, 'newsletter'])->name('newsletter');
Route::post('/interestedUsers/store', [UserController::class, 'interestedUsers'])->name('interestedUsers');
Route::post('/contactUsers/store', [UserController::class, 'contactUsers'])->name('contactUsers');

Route::get('/{idiom?}/blog', [HomeController::class, 'blog'])->name('blogs');
Route::get('/{idiom?}/blog/{id?}', [HomeController::class, 'detailblog'])->name('detailBlog');
Route::get('/{idiom?}/blog/filtering/{filter?}', [HomeController::class, 'blogfiltering'])->name('blogfiltering');
Route::get('/{idiom?}/relatedCases', [HomeController::class, 'relatedCases'])->name('relatedCases');





Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::view('index', 'panel.dashboard.index')->name('index');
    Route::view('dashboard-02', 'panel.dashboard.dashboard-02')->name('dashboard-02');
    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::resource('/countries', App\Http\Controllers\CountryController::class);
    Route::resource('/cities', App\Http\Controllers\CityController::class);
    Route::resource('/idioms', App\Http\Controllers\IdiomController::class);
    Route::resource('/news', App\Http\Controllers\NewsController::class);
    Route::resource('/service', App\Http\Controllers\ServiceController::class);
    Route::resource('/directions', App\Http\Controllers\DirectionController::class);
    Route::resource('/staffs', App\Http\Controllers\StaffController::class);
    Route::resource('/projectTypes', App\Http\Controllers\ProjectTypeController::class);
    Route::resource('/processes', App\Http\Controllers\ProcessController::class);
    Route::resource('/tools', App\Http\Controllers\ToolController::class);
    Route::resource('/modules', App\Http\Controllers\ModuleController::class);
    Route::resource('/moduleTypes', App\Http\Controllers\ModuleTypeController::class);
    Route::resource('/dataResearchs', App\Http\Controllers\DataResearchController::class);
    Route::resource('/homeContent', App\Http\Controllers\HomepageSelectionController::class);
    Route::resource('/clients', App\Http\Controllers\ClientController::class);
    Route::resource('/header', App\Http\Controllers\HeaderController::class);
    Route::resource('/contacts', App\Http\Controllers\ContactController::class);
    Route::resource('/tags', App\Http\Controllers\TagController::class);
    Route::post('/tags/storeFront', [TagController::class, 'storeFront'])->name('storeFront');


    Route::get('projectTypes-tags-select', [ProjectTypeController::class, 'taskboardView'])->name('taskboardView');
    Route::get('services-tags-select', [ServiceController::class, 'taskboardViewservices'])->name('taskboardViewservices');
    Route::get('news-tags-select', [NewsController::class, 'taskboardViewnews'])->name('taskboardViewnews');

    Route::post('/change-home-id/{kind}/{id}', [HomepageSelectionController::class, 'changeHomeId'])->name('change.home.id');
    Route::get('/export', [UserController::class, 'exportInterestedUsers'])->name('exportInterestedUsers');
    Route::get('/export/newsletters', [UserController::class, 'exportNewsletters'])->name('exportNewsletters');

});

Route::prefix('widgets')->middleware('auth')->group(function () {
    Route::view('general-widget', 'panel.widgets.general-widget')->name('general-widget');
    Route::view('chart-widget', 'panel.widgets.chart-widget')->name('chart-widget');
});

Route::prefix('page-layouts')->middleware('auth')->group(function () {
    Route::view('box-layout', 'panel.page-layout.box-layout')->name('box-layout');
    Route::view('layout-rtl', 'panel.page-layout.layout-rtl')->name('layout-rtl');
    Route::view('layout-dark', 'panel.page-layout.layout-dark')->name('layout-dark');
    Route::view('hide-on-scroll', 'panel.page-layout.hide-on-scroll')->name('hide-on-scroll');
    Route::view('footer-light', 'panel.page-layout.footer-light')->name('footer-light');
    Route::view('footer-dark', 'panel.page-layout.footer-dark')->name('footer-dark');
    Route::view('footer-fixed', 'panel.page-layout.footer-fixed')->name('footer-fixed');
});

Route::prefix('project')->middleware('auth')->group(function () {
    Route::view('projects', 'panel.project.projects')->name('projects');
    Route::view('projectcreate', 'panel.project.projectcreate')->name('projectcreate');
});

Route::view('file-manager', 'file-manager')->name('file-manager');
Route::view('kanban', 'kanban')->name('kanban');

Route::prefix('ecommerce')->middleware('auth')->group(function () {
    Route::view('product', 'panel.apps.product')->name('product');
    Route::view('product-page', 'panel.apps.product-page')->name('product-page');
    Route::view('list-products', 'panel.apps.list-products')->name('list-products');
    Route::view('payment-details', 'panel.apps.payment-details')->name('payment-details');
    Route::view('order-history', 'panel.apps.order-history')->name('order-history');
    Route::view('invoice-template', 'panel.apps.invoice-template')->name('invoice-template');
    Route::view('cart', 'panel.apps.cart')->name('cart');
    Route::view('list-wish', 'panel.apps.list-wish')->name('list-wish');
    Route::view('checkout', 'panel.apps.checkout')->name('checkout');
    Route::view('pricing', 'panel.apps.pricing')->name('pricing');
});

Route::prefix('email')->middleware('auth')->group(function () {
    Route::view('email-application', 'panel.apps.email-application')->name('email-application');
    Route::view('email-compose', 'panel.apps.email-compose')->name('email-compose');
});

Route::prefix('chat')->middleware('auth')->group(function () {
    Route::view('chat', 'panel.apps.chat')->name('chat');
    Route::view('chat-video', 'panel.apps.chat-video')->name('chat-video');
});

Route::prefix('users')->middleware('auth')->group(function () {
    Route::view('user-profile', 'panel.apps.user-profile')->name('user-profile');
    Route::view('edit-profile', 'panel.apps.edit-profile')->name('edit-profile');
    Route::view('user-cards', 'panel.apps.user-cards')->name('user-cards');
});


Route::view('bookmark', 'panel.apps.bookmark')->name('bookmark');
Route::view('contacts', 'panel.apps.contacts')->name('contacts');
Route::view('task', 'panel.apps.task')->name('task');
Route::view('calendar-basic', 'panel.apps.calendar-basic')->name('calendar-basic');
Route::view('social-app', 'panel.apps.social-app')->name('social-app');
Route::view('to-do', 'panel.apps.to-do')->name('to-do');
Route::view('search', 'panel.apps.search')->name('search');

Route::prefix('ui-kits')->middleware('auth')->group(function () {
    Route::view('state-color', 'panel.ui-kits.state-color')->name('state-color');
    Route::view('typography', 'panel.ui-kits.typography')->name('typography');
    Route::view('avatars', 'panel.ui-kits.avatars')->name('avatars');
    Route::view('helper-classes', 'panel.ui-kits.helper-classes')->name('helper-classes');
    Route::view('grid', 'panel.ui-kits.grid')->name('grid');
    Route::view('tag-pills', 'panel.ui-kits.tag-pills')->name('tag-pills');
    Route::view('progress-bar', 'panel.ui-kits.progress-bar')->name('progress-bar');
    Route::view('modal', 'panel.ui-kits.modal')->name('modal');
    Route::view('alert', 'panel.ui-kits.alert')->name('alert');
    Route::view('popover', 'panel.ui-kits.popover')->name('popover');
    Route::view('tooltip', 'panel.ui-kits.tooltip')->name('tooltip');
    Route::view('loader', 'panel.ui-kits.loader')->name('loader');
    Route::view('dropdown', 'panel.ui-kits.dropdown')->name('dropdown');
    Route::view('accordion', 'panel.ui-kits.accordion')->name('accordion');
    Route::view('tab-bootstrap', 'panel.ui-kits.tab-bootstrap')->name('tab-bootstrap');
    Route::view('tab-material', 'panel.ui-kits.tab-material')->name('tab-material');
    Route::view('box-shadow', 'panel.ui-kits.box-shadow')->name('box-shadow');
    Route::view('list', 'panel.ui-kits.list')->name('list');
});

Route::prefix('bonus-ui')->middleware('auth')->group(function () {
    Route::view('scrollable', 'panel.bonus-ui.scrollable')->name('scrollable');
    Route::view('tree', 'panel.bonus-ui.tree')->name('tree');
    Route::view('bootstrap-notify', 'panel.bonus-ui.bootstrap-notify')->name('bootstrap-notify');
    Route::view('rating', 'panel.bonus-ui.rating')->name('rating');
    Route::view('dropzone', 'panel.bonus-ui.dropzone')->name('dropzone');
    Route::view('tour', 'panel.bonus-ui.tour')->name('tour');
    Route::view('sweet-alert2', 'panel.bonus-ui.sweet-alert2')->name('sweet-alert2');
    Route::view('modal-animated', 'panel.bonus-ui.modal-animated')->name('modal-animated');
    Route::view('owl-carousel', 'panel.bonus-ui.owl-carousel')->name('owl-carousel');
    Route::view('ribbons', 'panel.bonus-ui.ribbons')->name('ribbons');
    Route::view('pagination', 'panel.bonus-ui.pagination')->name('pagination');
    Route::view('breadcrumb', 'panel.bonus-ui.breadcrumb')->name('breadcrumb');
    Route::view('range-slider', 'panel.bonus-ui.range-slider')->name('range-slider');
    Route::view('image-cropper', 'panel.bonus-ui.image-cropper')->name('image-cropper');
    Route::view('sticky', 'panel.bonus-ui.sticky')->name('sticky');
    Route::view('basic-card', 'panel.bonus-ui.basic-card')->name('basic-card');
    Route::view('creative-card', 'panel.bonus-ui.creative-card')->name('creative-card');
    Route::view('tabbed-card', 'panel.bonus-ui.tabbed-card')->name('tabbed-card');
    Route::view('dragable-card', 'panel.bonus-ui.dragable-card')->name('dragable-card');
    Route::view('timeline-v-1', 'panel.bonus-ui.timeline-v-1')->name('timeline-v-1');
    Route::view('timeline-v-2', 'panel.bonus-ui.timeline-v-2')->name('timeline-v-2');
    Route::view('timeline-small', 'panel.bonus-ui.timeline-small')->name('timeline-small');
});

Route::prefix('builders')->middleware('auth')->group(function () {
    Route::view('form-builder-1', 'panel.builders.form-builder-1')->name('form-builder-1');
    Route::view('form-builder-2', 'panel.builders.form-builder-2')->name('form-builder-2');
    Route::view('pagebuild', 'panel.builders.pagebuild')->name('pagebuild');
    Route::view('button-builder', 'panel.builders.button-builder')->name('button-builder');
});

Route::prefix('animation')->middleware('auth')->group(function () {
    Route::view('animate', 'panel.animation.animate')->name('animate');
    Route::view('scroll-reval', 'panel.animation.scroll-reval')->name('scroll-reval');
    Route::view('aos', 'panel.animation.aos')->name('aos');
    Route::view('tilt', 'panel.animation.tilt')->name('tilt');
    Route::view('wow', 'panel.animation.wow')->name('wow');
});


Route::prefix('icons')->middleware('auth')->group(function () {
    Route::view('flag-icon', 'panel.icons.flag-icon')->name('flag-icon');
    Route::view('font-awesome', 'panel.icons.font-awesome')->name('font-awesome');
    Route::view('ico-icon', 'panel.icons.ico-icon')->name('ico-icon');
    Route::view('themify-icon', 'panel.icons.themify-icon')->name('themify-icon');
    Route::view('feather-icon', 'panel.icons.feather-icon')->name('feather-icon');
    Route::view('whether-icon', 'panel.icons.whether-icon')->name('whether-icon');
    Route::view('simple-line-icon', 'panel.icons.simple-line-icon')->name('simple-line-icon');
    Route::view('material-design-icon', 'panel.icons.material-design-icon')->name('material-design-icon');
    Route::view('pe7-icon', 'panel.icons.pe7-icon')->name('pe7-icon');
    Route::view('typicons-icon', 'panel.icons.typicons-icon')->name('typicons-icon');
    Route::view('ionic-icon', 'panel.icons.ionic-icon')->name('ionic-icon');
});

Route::prefix('buttons')->middleware('auth')->group(function () {
    Route::view('buttons', 'panel.buttons.buttons')->name('buttons');
    Route::view('buttons-flat', 'panel.buttons.buttons-flat')->name('buttons-flat');
    Route::view('buttons-edge', 'panel.buttons.buttons-edge')->name('buttons-edge');
    Route::view('raised-button', 'panel.buttons.raised-button')->name('raised-button');
    Route::view('button-group', 'panel.buttons.button-group')->name('button-group');
});

Route::prefix('forms')->middleware('auth')->group(function () {
    Route::view('form-validation', 'panel.forms.form-validation')->name('form-validation');
    Route::view('base-input', 'panel.forms.base-input')->name('base-input');
    Route::view('radio-checkbox-control', 'panel.forms.radio-checkbox-control')->name('radio-checkbox-control');
    Route::view('input-group', 'panel.forms.input-group')->name('input-group');
    Route::view('megaoptions', 'panel.forms.megaoptions')->name('megaoptions');
    Route::view('datepicker', 'panel.forms.datepicker')->name('datepicker');
    Route::view('time-picker', 'panel.forms.time-picker')->name('time-picker');
    Route::view('datetimepicker', 'panel.forms.datetimepicker')->name('datetimepicker');
    Route::view('daterangepicker', 'panel.forms.daterangepicker')->name('daterangepicker');
    Route::view('touchspin', 'panel.forms.touchspin')->name('touchspin');
    Route::view('select2', 'panel.forms.select2')->name('select2');
    Route::view('switch', 'panel.forms.switch')->name('switch');
    Route::view('typeahead', 'panel.forms.typeahead')->name('typeahead');
    Route::view('clipboard', 'panel.forms.clipboard')->name('clipboard');
    Route::view('default-form', 'panel.forms.default-form')->name('default-form');
    Route::view('form-wizard', 'panel.forms.form-wizard')->name('form-wizard');
    Route::view('form-wizard-two', 'panel.forms.form-wizard-two')->name('form-wizard-two');
    Route::view('form-wizard-three', 'panel.forms.form-wizard-three')->name('form-wizard-three');
    Route::post('form-wizard-three', function () {
        return redirect()->route('form-wizard-three');
    })->name('form-wizard-three-post');
});

Route::prefix('tables')->middleware('auth')->group(function () {
    Route::view('bootstrap-basic-table', 'panel.tables.bootstrap-basic-table')->name('bootstrap-basic-table');
    Route::view('bootstrap-sizing-table', 'panel.tables.bootstrap-sizing-table')->name('bootstrap-sizing-table');
    Route::view('bootstrap-border-table', 'panel.tables.bootstrap-border-table')->name('bootstrap-border-table');
    Route::view('bootstrap-styling-table', 'panel.tables.bootstrap-styling-table')->name('bootstrap-styling-table');
    Route::view('table-components', 'panel.tables.table-components')->name('table-components');
    Route::view('datatable-basic-init', 'panel.tables.datatable-basic-init')->name('datatable-basic-init');
    Route::view('datatable-advance', 'panel.tables.datatable-advance')->name('datatable-advance');
    Route::view('datatable-styling', 'panel.tables.datatable-styling')->name('datatable-styling');
    Route::view('datatable-ajax', 'panel.tables.datatable-ajax')->name('datatable-ajax');
    Route::view('datatable-server-side', 'panel.tables.datatable-server-side')->name('datatable-server-side');
    Route::view('datatable-plugin', 'panel.tables.datatable-plugin')->name('datatable-plugin');
    Route::view('datatable-api', 'panel.tables.datatable-api')->name('datatable-api');
    Route::view('datatable-data-source', 'panel.tables.datatable-data-source')->name('datatable-data-source');
    Route::view('datatable-ext-autofill', 'panel.tables.datatable-ext-autofill')->name('datatable-ext-autofill');
    Route::view('datatable-ext-basic-button', 'panel.tables.datatable-ext-basic-button')->name('datatable-ext-basic-button');
    Route::view('datatable-ext-col-reorder', 'panel.tables.datatable-ext-col-reorder')->name('datatable-ext-col-reorder');
    Route::view('datatable-ext-fixed-header', 'panel.tables.datatable-ext-fixed-header')->name('datatable-ext-fixed-header');
    Route::view('datatable-ext-html-5-data-export', 'panel.tables.datatable-ext-html-5-data-export')->name('datatable-ext-html-5-data-export');
    Route::view('datatable-ext-key-table', 'panel.tables.datatable-ext-key-table')->name('datatable-ext-key-table');
    Route::view('datatable-ext-responsive', 'panel.tables.datatable-ext-responsive')->name('datatable-ext-responsive');
    Route::view('datatable-ext-row-reorder', 'panel.tables.datatable-ext-row-reorder')->name('datatable-ext-row-reorder');
    Route::view('datatable-ext-scroller', 'panel.tables.datatable-ext-scroller')->name('datatable-ext-scroller');
    Route::view('jsgrid-table', 'panel.tables.jsgrid-table')->name('jsgrid-table');
});

Route::prefix('charts')->middleware('auth')->group(function () {
    Route::view('echarts', 'panel.charts.echarts')->name('echarts');
    Route::view('chart-apex', 'panel.charts.chart-apex')->name('chart-apex');
    Route::view('chart-google', 'panel.charts.chart-google')->name('chart-google');
    Route::view('chart-sparkline', 'panel.charts.chart-sparkline')->name('chart-sparkline');
    Route::view('chart-flot', 'panel.charts.chart-flot')->name('chart-flot');
    Route::view('chart-knob', 'panel.charts.chart-knob')->name('chart-knob');
    Route::view('chart-morris', 'panel.charts.chart-morris')->name('chart-morris');
    Route::view('chartjs', 'panel.charts.chartjs')->name('chartjs');
    Route::view('chartist', 'panel.charts.chartist')->name('chartist');
    Route::view('chart-peity', 'panel.charts.chart-peity')->name('chart-peity');
});

Route::view('sample-page', 'panel.pages.sample-page')->name('sample-page');
Route::view('internationalization', 'panel.pages.internationalization')->name('internationalization');

Route::prefix('starter-kit')->middleware('auth')->group(function () {
});

Route::prefix('others')->middleware('auth')->group(function () {
    Route::view('400', 'panel.errors.400')->name('error-400');
    Route::view('401', 'panel.errors.401')->name('error-401');
    Route::view('403', 'panel.errors.403')->name('error-403');
    Route::view('404', 'panel.errors.404')->name('error-404');
    Route::view('500', 'panel.errors.500')->name('error-500');
    Route::view('503', 'panel.errors.503')->name('error-503');
});



Route::view('comingsoon', 'panel.comingsoon.comingsoon')->name('comingsoon');
Route::view('comingsoon-bg-video', 'panel.comingsoon.comingsoon-bg-video')->name('comingsoon-bg-video');
Route::view('comingsoon-bg-img', 'panel.comingsoon.comingsoon-bg-img')->name('comingsoon-bg-img');

Route::view('basic-template', 'panel.email-templates.basic-template')->name('basic-template');
Route::view('email-header', 'panel.email-templates.email-header')->name('email-header');
Route::view('template-email', 'panel.email-templates.template-email')->name('template-email');
Route::view('template-email-2', 'panel.email-templates.template-email-2')->name('template-email-2');
Route::view('ecommerce-templates', 'panel.email-templates.ecommerce-templates')->name('ecommerce-templates');
Route::view('email-order-success', 'panel.email-templates.email-order-success')->name('email-order-success');


Route::prefix('gallery')->middleware('auth')->group(function () {
    Route::view('/', 'apps.gallery')->name('gallery');
    Route::view('gallery-with-description', 'panel.apps.gallery-with-description')->name('gallery-with-description');
    Route::view('gallery-masonry', 'panel.apps.gallery-masonry')->name('gallery-masonry');
    Route::view('masonry-gallery-with-disc', 'panel.apps.masonry-gallery-with-disc')->name('masonry-gallery-with-disc');
    Route::view('gallery-hover', 'panel.apps.gallery-hover')->name('gallery-hover');
});

Route::prefix('blog')->middleware('auth')->group(function () {
    Route::view('/', 'apps.blog')->name('blog');
    Route::view('blog-single', 'panel.apps.blog-single')->name('blog-single');
    Route::view('add-post', 'panel.apps.add-post')->name('add-post');
});


Route::view('faq', 'apps.faq')->name('faq');

Route::prefix('job-search')->middleware('auth')->group(function () {
    Route::view('job-cards-view', 'panel.apps.job-cards-view')->name('job-cards-view');
    Route::view('job-list-view', 'panel.apps.job-list-view')->name('job-list-view');
    Route::view('job-details', 'panel.apps.job-details')->name('job-details');
    Route::view('job-apply', 'panel.apps.job-apply')->name('job-apply');
});

Route::prefix('learning')->middleware('auth')->group(function () {
    Route::view('learning-list-view', 'panel.apps.learning-list-view')->name('learning-list-view');
    Route::view('learning-detailed', 'panel.apps.learning-detailed')->name('learning-detailed');
});

Route::prefix('maps')->middleware('auth')->group(function () {
    Route::view('map-js', 'panel.apps.map-js')->name('map-js');
    Route::view('vector-map', 'panel.apps.vector-map')->name('vector-map');
});

Route::prefix('editors')->middleware('auth')->group(function () {
    Route::view('summernote', 'panel.apps.summernote')->name('summernote');
    Route::view('ckeditor', 'panel.apps.ckeditor')->name('ckeditor');
    Route::view('simple-mde', 'panel.apps.simple-mde')->name('simple-mde');
    Route::view('ace-code-editor', 'panel.apps.ace-code-editor')->name('ace-code-editor');
});

Route::view('knowledgebase', 'panel.apps.knowledgebase')->name('knowledgebase');
Route::view('support-ticket', 'panel.apps.support-ticket')->name('support-ticket');
Route::view('landing-page', 'panel.pages.landing-page')->name('landing-page');

Route::prefix('layouts')->middleware('auth')->group(function () {
    Route::view('compact-sidebar', 'panel.admin_unique_layouts.compact-sidebar'); //default //Dubai
    Route::view('box-layout', 'panel.admin_unique_layouts.box-layout');    //default //New York //
    Route::view('dark-sidebar', 'panel.admin_unique_layouts.dark-sidebar');

    Route::view('default-body', 'panel.admin_unique_layouts.default-body');
    Route::view('compact-wrap', 'panel.admin_unique_layouts.compact-wrap');
    Route::view('enterprice-type', 'panel.admin_unique_layouts.enterprice-type');

    Route::view('compact-small', 'panel.admin_unique_layouts.compact-small');
    Route::view('advance-type', 'panel.admin_unique_layouts.advance-type');
    Route::view('material-layout', 'panel.admin_unique_layouts.material-layout');

    Route::view('color-sidebar', 'panel.admin_unique_layouts.color-sidebar');
    Route::view('material-icon', 'panel.admin_unique_layouts.material-icon');
    Route::view('modern-layout', 'panel.admin_unique_layouts.modern-layout');
});

Route::get('layout-{light}', function ($light) {
    session()->put('layout', $light);
    session()->get('layout');
    if ($light == 'vertical-layout') {
        return redirect()->route('panel.pages-vertical-layout');
    }
    return redirect()->route('index');
    return 1;
});
Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
