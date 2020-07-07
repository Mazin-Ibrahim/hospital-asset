require('./bootstrap');

window.Vue = require('vue');

Vue.component('base-nav', require('./components/UI/BaseNav').default);
Vue.component('base-header', require('./components/UI/BaseHeader').default);
Vue.component('base-panel', require('./components/UI/BasePanel').default);
Vue.component('base-input', require('./components/UI/BaseInput').default);
Vue.component('base-sidebar', require('./components/UI/BaseSidebar').default);





// ----------------------asset component-----------------------


Vue.component('Assets', require('./components/asset/Assets').default);

// ---------------------user component--------------------------

Vue.component('Users', require('./components/user/Users').default);



// ----------------------Auth---------------------------------------

Vue.component('Roles',require('./components/auth/role/Roles').default);

Vue.component('Permissions',require('./components/auth/permission/Permissions').default);






const app = new Vue({
    el: '#app',
});
