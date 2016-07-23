function LoginController($scope, $location, User) {
    $scope.showError = false;

    $scope.login = function() {
        User.login($scope.user)
        .then(function(data){
            location.href = '/';
        }, function(data){
            switch (data.code) {
                case 401:
                    $scope.message = 'El nombre de usuario o contraseña son incorrectos, por favor verifícalos.';
                    break;
                case 400:
                    $scope.message = 'Los datos son incompletos, por favor verifícalos.';
                    break;
                case 500:
                    $scope.message = 'Ha ocurrido un error al procesar tu solicitud, por favor vuelve a intentarlo.';
                    break;
            }
            $scope.showError = true;
            window.setTimeout(function(){
                $scope.showError = false;
            }, 3000);
        });
    }

}