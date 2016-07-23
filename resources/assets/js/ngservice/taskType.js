function TaskType($http, $q) {
    return {
        getPublic: function () {
            var defer = $q.defer();

            $http.get('/api/task-type?public=true')
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        }
    }
}