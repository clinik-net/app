function User($http, $q) {
    return {
        login: function (user) {
            var defer = $q.defer();

            var postUser = {
                email: user.email,
                password: SHA1(user.password)
            };

            $http.post('/api/login', postUser)
                .success(function (data, status) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        logout: function () {
            var defer = $q.defer();

            $http.get('/api/logout')
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        create: function (user) {
            var defer = $q.defer();

            $http.post('/api/user', user)
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        remove: function (user) {
            var defer = $q.defer();

            $http.delete('/api/user/' + user._id)
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        get: function (user) {
            var defer = $q.defer();

            $http.get('/api/user/' + user._id)
            .success(function (data) {
                defer.resolve(data);
            })
            .error(function (data) {
                defer.reject(data);
            });

            return defer.promise;
        },

        getList: function (user) {
            var defer = $q.defer();

            $http.get('/api/user')
            .success(function (data) {
                defer.resolve(data);
            })
            .error(function (data) {
                defer.reject(data);
            });

            return defer.promise;
        },

        update: function (id, user) {
            var defer = $q.defer();

            $http.put('/api/user/' + id, user)
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },

        me: function () {
            var defer = $q.defer();

            $http.get('/api/me')
                .success(function (data) {
                    defer.resolve(data);
                })
                .error(function (data) {
                    defer.reject(data);
                });

            return defer.promise;
        },
    }
}