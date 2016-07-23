angular.module('dashboardServices', [])
    .factory('User', ["$http", "$q", User])
    .factory('Company', ["$http", "$q", Company])
    .factory('Lead', ["$http", "$q", Lead])
    .factory('Task', ["$http", "$q", Task])
    .factory('Appointment', ["$http", "$q", Appointment])
    .factory('TaskType', ["$http", "$q", TaskType])
    /*.factory('TodoTask', ["$http", "$q", TodoTask])
    .factory('TaskList', ["$http", "$q", TaskList])
    
    
    
    .factory('Project', ["$http", "$q", Project])
    .factory('Dashboard', ['$http', '$q', Dashboard])*/
;