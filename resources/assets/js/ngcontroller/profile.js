function ProfileController($scope, User) {
    $scope.loading = false;
    $scope.showSucess = false;
    $scope.passwordPattern = /((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[.@#$%]).{8,20})/;

    $scope.load = function() {
        User.me()
        .then(function(data){
            $scope.user = data.data;
        });
    };

    $scope.update = function() {
        $scope.loading = true;
        User.update('me', $scope.user)
        .then(function(data){
            $scope.loading = false;
            $scope.user = data.data;
        });
    };

    $scope.changePassword = function() {
        $scope.loading = true;
        var tmp = {
            current: SHA1($scope.password.current),
            password: SHA1($scope.password.new)
        };
        User.update('me', tmp)
        .then(function(data){
            $scope.loading = false;
            $scope.showSucess = true;
            $scope.error = false;
            $scope.password = {};
            location.reload();
        }, function(data){
            $scope.loading = false;
            $scope.error = data.data;
        });
    };
}