$(document).foundation();


window.Vue = require('vue');
require('vue-resource');


Vue.http.interceptors.push((request, next) => {
    request.headers['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
    
    next();
});
