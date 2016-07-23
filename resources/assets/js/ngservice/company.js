function Company($http, $q) {
    return {
        getList: function () {
            var defer = $q.defer();

            $http.get('/api/company')
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

            $http.get('/api/company/' + id)
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        users: function (id) {
            var defer = $q.defer();

            $http.get('/api/company/' + id + '/users')
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        create: function (data) {
            var defer = $q.defer();

            $http.post('/api/company', data)
            .success(function (data) {
                defer.resolve(data);
            })
            .error(function (data) {
                defer.reject(data);
            });

            return defer.promise;
        },

        update: function (id, data) {
            var defer = $q.defer();

            $http.put('/api/company/' + id, data)
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

            $http.delete('/api/company/' + lead._id)
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