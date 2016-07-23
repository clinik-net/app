function LeadsController($scope, $location, Lead, Task, TaskType, Appointment) {
    $scope.hours = [];
    for (i = 0; i <= 23; i++) {
        if (i < 10)
            $scope.hours.push('0' + i.toString());
        else
            $scope.hours.push(i.toString());
    }

    $scope.minutes = [];
    for (i = 0; i <= 50; i+=15) {
        if (i < 10)
            $scope.minutes.push('0' + i.toString());
        else
            $scope.minutes.push(i.toString());
    }

    $scope.durations = [{value: 'allDay', label: '', metric: 'allDay'}];
    for (i = 0; i <= 500 ; i+=30) {
        if (i === 0) continue;
        if (i < 60) {
            $scope.durations.push({value: i, label: i.toString(), metric: 'minutes'});
        } else {
            var hours = Math.ceil(i / 60);
            var minutes = i % 60;
            if (hours < 10) hours = '0' + hours;
            if (minutes < 10) minutes = '0' + minutes;

            $scope.durations.push({value: i, label: hours.toString() + ':' + minutes.toString(), metric: 'hours'});
        }
    }

    $scope.getList = function() {
        Lead.getList()
            .then(function(data){
                $scope.leads = data.data;
            });
    };

    $scope.create = function() {
        Lead.create($scope.lead)
            .then(function(data){
                location.href = '/leads';
            });
    };

    $scope.update = function() {
        delete $scope.lead._id;
        Lead.update($scope.id, $scope.lead)
            .then(function(data){
                location.href = '/leads';
            });
    };

    $scope.load = function(id) {
        $scope.id = id;
        Lead.get(id)
        .then(function(data){
            $scope.lead = data.data;
        });

        Task.fromLead(id)
        .then(function(data){
            $scope.tasks = data.data;
        });

        Appointment.fromLead(id)
        .then(function(data){
            $scope.appointments = data.data;
        });

        TaskType.getPublic()
        .then(function(data){
            $scope.taskTypes = data.data;
        });
    };

    $scope.createTask = function() {
        $scope.task.leadId = $scope.id;
        Task.create($scope.task)
        .then(function(){
            $scope.load($scope.id);
            $("#taskModal").modal('hide');
            $scope.task = {};
        });
    }

    $scope.createAppointment = function() {
        $scope.appointment.leadId = $scope.id;
        $scope.appointment.date.setHours(parseInt($scope.appointment.hour));
        $scope.appointment.date.setMinutes(parseInt($scope.appointment.minute));
        $scope.appointment.duration = 30;
        var unixTime = ($scope.appointment.date.getTime() / 1000) + (parseInt($scope.appointment.duration) * 60);
        var endDate = new Date(unixTime * 1000);
        $scope.appointment.end = endDate;
        
        Appointment.create($scope.appointment)
        .then(function(){
            $scope.load($scope.id);
            $("#appointmentModal").modal('hide');
            $scope.appointment = {};
        });
    }

    $scope.removePrompt = function(lead) {
        $scope.actualLead = lead;
        $("#removePrompt").modal('show');
    };

    $scope.remove = function() {
        Lead.remove($scope.actualLead)
            .then(function(data){
                $("#removePrompt").modal('hide');
                $scope.getList();
            });
    };

    $scope.dateTimezone = function(date) {
        if (typeof date === 'undefined') {
            return false;
        }

        if (typeof date.date === 'undefined') {
            return false;
        }

        var dateString = date.date.replace(/ /, 'T');
        dateString = dateString.replace(/.000000/, '');
        var d = new Date(dateString + 'Z'),
        yyyy = d.getFullYear(),
        mm = ('0' + (d.getMonth() + 1)).slice(-2),  // Months are zero based. Add leading 0.
        dd = ('0' + d.getDate()).slice(-2),         // Add leading 0.
        hh = d.getHours(),
        h = hh,
        min = ('0' + d.getMinutes()).slice(-2),     // Add leading 0.
        ampm = 'AM',
        time;

        if (hh > 12) {
            h = hh - 12;
            ampm = 'PM';
        } else if (hh === 12) {
            h = 12;
            ampm = 'PM';
        } else if (hh == 0) {
            h = 12;
        }

        // ie: 2013-02-18, 8:35 AM
        time = dd + '/' + mm + '/' + yyyy + ', ' + h + ':' + min + ' ' + ampm;

        return time;
    }

    $scope.convertTimestamp = function(timestamp) {
        var d = new Date(timestamp * 1000),	// Convert the passed timestamp to milliseconds
            yyyy = d.getFullYear(),
            mm = ('0' + (d.getMonth() + 1)).slice(-2),	// Months are zero based. Add leading 0.
            dd = ('0' + d.getDate()).slice(-2),			// Add leading 0.
            hh = d.getHours(),
            h = hh,
            min = ('0' + d.getMinutes()).slice(-2),		// Add leading 0.
            ampm = 'AM',
            time;

        if (hh > 12) {
            h = hh - 12;
            ampm = 'PM';
        } else if (hh === 12) {
            h = 12;
            ampm = 'PM';
        } else if (hh == 0) {
            h = 12;
        }

        // ie: 2013-02-18, 8:35 AM
        time = dd + '/' + mm + '/' + yyyy + ', ' + h + ':' + min + ' ' + ampm;

        return time;
    }

    $scope.toggleSearch = function() {
        if (!$scope.search) {
            $scope.search = true;
        } else {
            $scope.search = false;
        }
    }
}