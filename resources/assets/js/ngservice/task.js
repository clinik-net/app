function Task($http, $q) {
    return {
        create: function (task) {
            var defer = $q.defer();

            $http.post('/api/task', task)
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        get: function (id) {
            var defer = $q.defer();

            $http.get('/api/task/' + id)
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        fromLead: function (id) {
            var defer = $q.defer();

            $http.get('/api/lead/' + id + '/task?endDate=now')
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