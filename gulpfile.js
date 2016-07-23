var gulp = require('gulp');
var concat = require('gulp-concat');
var rev = require('gulp-rev');
var del = require('del');
var debug = process.env.debug || false;
var manifestOptions = {
	merge: true,
	base: 'public/build'
};

var loginNg = [
	'bower_components/sha1/sha1.js',
	'resources/assets/js/locale/es.js',
	'resources/assets/js/ngservice/user.js',
	'resources/assets/js/ngcontroller/login.js',
	'resources/assets/js/ngapp/loginServices.js',
	'resources/assets/js/ngapp/login.js'
];

var dashboardNg = [
	'resources/assets/js/ngservice/user.js',
	'resources/assets/js/locale/es.js',
	'resources/assets/js/locale/en.js',
	'resources/assets/js/ngservice/lead.js',
	'resources/assets/js/ngservice/task.js',
	'resources/assets/js/ngservice/todoTask.js',
	'resources/assets/js/ngservice/taskList.js',
	'resources/assets/js/ngservice/taskType.js',
	'resources/assets/js/ngservice/company.js',
	'resources/assets/js/ngservice/dashboard.js',
	'resources/assets/js/ngservice/appointment.js',
	'resources/assets/js/ngservice/project.js',
	'resources/assets/js/ngcontroller/index.js',
	'resources/assets/js/ngcontroller/leads.js',
	'resources/assets/js/ngcontroller/calendar.js',
	'resources/assets/js/ngcontroller/tasks.js',
	'resources/assets/js/ngcontroller/companies.js',
	'resources/assets/js/ngcontroller/users.js',
	'resources/assets/js/ngcontroller/profile.js',
	'resources/assets/js/ngcontroller/adminDashboard.js',
	'resources/assets/js/ngcontroller/projects.js',
	'resources/assets/js/ngapp/dashboardServices.js',
	'resources/assets/js/ngapp/dashboard.js'
];

var dashboardVendors = [
	'bower_components/jquery/dist/jquery.min.js',
	'bower_components/jquery-ui/jquery-ui.min.js',
	'bower_components/bootstrap/dist/js/bootstrap.min.js',
	'bower_components/sha1/sha1.js',
	'bower_components/timezone-js/src/date.js',
	'bower_components/angular/angular.min.js',
	'bower_components/angular-translate/angular-translate.min.js',
	'public/assets/js/light-bootstrap-dashboard.js',
	'bower_components/angular-aria/angular-aria.min.js',
	'bower_components/sweetalert2/dist/sweetalert2.min.js',
	'bower_components/moment/moment.js',
	'bower_components/fullcalendar/dist/fullcalendar.min.js',
	'bower_components/fullcalendar/dist/lang/es.js',
	'bower_components/angular-animate/angular-animate.min.js',
	'bower_components/angular-material/angular-material.min.js',
	'bower_components/angular-material-datetimepicker/js/angular-material-datetimepicker.min.js',
	'bower_components/angucomplete-alt/dist/angucomplete-alt.min.js',
];

var dashboardVendorsCss = [
	'bower_components/bootstrap/dist/css/bootstrap.min.css',
	'public/css/dashboard.css',
	'bower_components/font-awesome/css/font-awesome.min.css',
	'bower_components/sweetalert2/dist/sweetalert2.min.css',
	'public/assets/css/pe-icon-7-stroke.css',
	'bower_components/angular-material/angular-material.css',
	'bower_components/angular-material-datetimepicker/css/material-datetimepicker.css',
	'public/css/material-fixes.css',
	'bower_components/angucomplete-alt/angucomplete-alt.css'
];

gulp.task('default', ['loginNg', 'vendors', 'dashboardNg'], function() {});

gulp.task('vendors', ['copyAngular', 'copyBootstrap', 'dashboardVendors'], function(){
	gulp.src('bower_components/font-awesome/fonts/*')
			.pipe(gulp.dest('public/fonts'));
});

gulp.task('loginNg', function() {
	return gulp.src(loginNg)
	.pipe(concat('login.js'))
	.pipe(rev())
	.pipe(gulp.dest('public/src'))
	.pipe(rev.manifest(manifestOptions))
	.pipe(gulp.dest('public/build'));
});

gulp.task('dashboardNg', function() {
	return gulp.src(dashboardNg)
			.pipe(concat('dashboard.js'))
			.pipe(rev())
			.pipe(gulp.dest('public/src'))
			.pipe(rev.manifest(manifestOptions))
			.pipe(gulp.dest('public/build'));
});

gulp.task('dashboardVendors', function() {
	gulp.src(dashboardVendorsCss)
			.pipe(concat('dashboard-vendors.css'))
			.pipe(rev())
			.pipe(gulp.dest('public/build'))
			.pipe(rev.manifest(manifestOptions))
			.pipe(gulp.dest('public/build'));

	return gulp.src(dashboardVendors)
			.pipe(concat('dashboard-vendors.js'))
			.pipe(rev())
			.pipe(gulp.dest('public/build'))
			.pipe(rev.manifest(manifestOptions))
			.pipe(gulp.dest('public/build'));
});

gulp.task('copyAngular', function() {
	return gulp.src('bower_components/angular/angular.min.js')
		.pipe(gulp.dest('public/build'));
});

gulp.task('copyBootstrap', function() {
	gulp.src('bower_components/bootstrap/dist/css/bootstrap.min.css')
		.pipe(gulp.dest('public/build'));

	gulp.src('bower_components/bootstrap/dist/css/bootstrap-theme.min.css')
			.pipe(gulp.dest('public/build'));

	return gulp.src('bower_components/bootstrap/dist/css/bootstrap.min.js')
			.pipe(gulp.dest('public/build'));
});

gulp.task('clean', function(){
	return del([
		'public/build',
		'public/src'
	]);
});