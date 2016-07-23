function CompaniesController($scope, Company, User) {
    $scope.initUser = function(user) {
        $scope.user = user;
    };

    $scope.getList = function (id, list) {
        Company.getList()
        .then(function (data) {
            $scope.companies = data.data;
        });
    };

    $scope.load = function(id) {
        Company.get(id)
        .then(function(data){
            $scope.company = data.data;
            $scope.id = id;
        });
    };

    $scope.getUsers = function(id) {
        $scope.load(id);
        Company.users(id)
        .then(function(data){
            $scope.users = data.data;
        });
    };

    $scope.update = function() {
        Company.update($scope.id, $scope.company)
        .then(function(data){
            location.href = '/companies';
        });
    };

    $scope.create = function() {
        Company.create($scope.company)
        .then(function(data){
            $scope.company = data;
            location.href = '/companies';
        }, function(data) {
            $scope.error = data.data;
        });
    };

    $scope.removePrompt = function(company) {
        $scope.actualCompany = company;
        $("#removePrompt").modal('show');
    };

    $scope.removeUserPrompt = function(user) {
        $scope.actualUser = user;
        $("#removePrompt").modal('show');
    };

    $scope.remove = function() {
        Company.remove($scope.actualCompany)
        .then(function(data){
            $("#removePrompt").modal('hide');
            $scope.getList();
        });
    };

    $scope.removeUser = function() {
        User.remove($scope.actualUser)
        .then(function(data){
            $("#removePrompt").modal('hide');
            $scope.getUsers($scope.id);
        });
    };

    $scope.hasRol = function(user, rol) {
        if (typeof user.roles === 'undefined') {
            return false;
        }
        return user.roles.indexOf(rol) !== -1;
    };

    $scope.toggleRol = function(user, rol) {
        if (typeof user.roles === 'undefined') {
            user.roles = [];
        }

        var index = user.roles.indexOf(rol);
        if (index === -1) {
            user.roles.push(rol);
        } else {
            user.roles.splice(index, 1);
        }
    };

    $scope.createUser = function() {
        User.create($scope.user)
        .then(function(){
            location.href = '/companies/' + $scope.user.companyId + '/users';
        }, function(data){
            $scope.error = data.data;
        });
    }
}