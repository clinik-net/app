function CalendarController($scope, $location, Appointment) {

    $(document).ready(function() {});

    $scope.hours = [];
    for (i = 0; i <= 23; i++) {
        if (i < 10)
            $scope.hours.push('0' + i.toString());
        else
            $scope.hours.push(i.toString());
    }

    var dateString = function(date) {
        var yyyy = date.getFullYear(),
        mm = date.getMonth() + 1,
        dd = date.getDate() + 1,
        hh = date.getHours(),
        ii = date.getMinutes();

        if (mm < 10) mm = '0' + mm;
        if (dd < 10) dd = '0' + dd;
        if (hh < 10) hh = '0' + hh;
        if (ii < 10) ii = '0' + ii;
        return yyyy + '-' + mm + '-' + dd + 'T' + hh + ':' + ii + ':00.000';
    }

    var hourString = function(date) {
        hh = date.getHours(),
        ii = date.getMinutes();

        if (hh < 10) hh = '0' + hh;
        if (ii < 10) ii = '0' + ii;
        return hh + ':' + ii;
    }

    $scope.getList = function() {
        Appointment.getList()
        .then(function(data){
            var events = [];
            angular.forEach(data.data, function(item) {
                var dateStringStart = item.date.date.replace(/ /, 'T');
                dateStringStart = dateStringStart.replace(/.000000/, 'Z');
                var startDate = new Date(dateStringStart);

                var dateStringEnd = item.end.date.replace(/ /, 'T');
                dateStringEnd = dateStringEnd.replace(/.000000/, 'Z');
                var endDate = new Date(dateStringEnd);
                var tmp = {
                    id: item._id,
                    title: item.lead.contacts[0].name,
                    start: startDate,
                    end: endDate,
                    allDay: false,
                    className: 'event-red'
                };
                events.push(tmp);
            });

            $calendar = $('#fullCalendar');

            today = new Date();
            y = today.getFullYear();
            m = today.getMonth();
            d = today.getDate();
            $calendar.fullCalendar({
                header: {
                    left: 'title',
                    center: 'month,agendaWeek,agendaDay',
                    right: 'prev,next today'
                },
                defaultDate: today,
                selectable: true,
                selectHelper: true,
                titleFormat: {
                    month: 'MMMM YYYY', // September 2015
                    week: "MMMM YYYY", // September 2015
                    day: 'D MMM, YYYY'  // Tuesday, Sep 8, 2015
                },
                //defaultView: 'agendaDay',
                select: function(start, end, resource) {
                    view = $calendar.fullCalendar( 'getView' );
                    if (view.intervalUnit === 'month') {
                        start._d.setDate(start._d.getDate() + 1);
                        $calendar.fullCalendar('gotoDate', start._d );
                        $calendar.fullCalendar('changeView', 'agendaDay');
                    }
                },
                eventDrop: function(event, delta, revertFunc) {
                    console.log(event.start, event.end);
                    Appointment.update(event.id, {
                        date: dateString(event.start._d),
                        end: dateString(event.end._d)
                    });
                },
                eventResize: function(event, delta, revertFunc) {
                    Appointment.update(event.id, {
                        date: dateString(event.start._d),
                        end: dateString(event.end._d)
                    });
                    $scope.getList();
                },
                eventClick: function(calEvent, jsEvent, view) {


                    $("#actualLead").html(calEvent.title);
                    $("#actualStart").html(hourString(calEvent.start._i));
                    $("#actualEnd").html(hourString(calEvent.end._i));
                    $("#modalDetail").modal('show');
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events

                // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
                events: events
            });

        });
    }


}