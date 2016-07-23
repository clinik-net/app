function Appointment($http, $q) {
    return {
        create: function (event) {
            var defer = $q.defer();

            $http.post('/api/appointment', event)
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        update: function (id, event) {
            var defer = $q.defer();

            $http.put('/api/appointment/' + id, event)
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

            $http.get('/api/appointment/' + id)
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        getList: function () {
            var defer = $q.defer();

            $http.get('/api/appointment?' + $.now())
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

            $http.get('/api/lead/' + id + '/task?startDate=now')
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