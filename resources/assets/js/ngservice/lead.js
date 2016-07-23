function Lead($http, $q) {
    return {
        getList: function () {
            var defer = $q.defer();

            $http.get('/api/lead')
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        create: function (lead) {
            var defer = $q.defer();

            $http.post('/api/lead', lead)
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        update: function (id, lead) {
            var defer = $q.defer();

            $http.put('/api/lead/' + id, lead)
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

            $http.get('/api/lead/' + id)
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        remove: function (lead) {
            var defer = $q.defer();

            $http.delete('/api/lead/' + lead._id)
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