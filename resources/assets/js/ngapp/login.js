angular.module('login', ['loginServices'], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    })
    .controller('LoginController', ['$scope', '$location', 'User', LoginController])
;