angular.module('dashboard', ['dashboardServices', 'ngMaterial', 'ngMaterialDatePicker', 'pascalprecht.translate', 'angucomplete-alt'], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    })
    .config(['$translateProvider', function ($translateProvider) {
        $translateProvider.translations('es', locale_es);
        $translateProvider.translations('en', locale_en);
        $translateProvider.preferredLanguage('es');
    }])
    .controller('IndexController', ['$scope', '$location', IndexController])
    .controller('CompaniesController', ['$scope', 'Company', 'User', CompaniesController])
    .controller('LeadsController', ['$scope', '$location', 'Lead', 'Task', 'TaskType', 'Appointment', LeadsController])
    .controller('CalendarController', ['$scope', '$location', 'Appointment', CalendarController])
    .controller('ProfileController', ['$scope', 'User', ProfileController])
    //.controller('TasksController', ['$scope', '$location', 'TodoTask', 'TaskList', TasksController])
    //.controller('UsersController', ['$scope', 'User', UsersController])
    //.controller('ProjectsController', ['$scope', 'Project', 'User', ProjectsController])
    //.controller('AdminDashboardController', ['$scope', 'Dashboard', AdminDashboardController])
;