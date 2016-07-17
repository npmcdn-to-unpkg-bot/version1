var app = angular.module('adminApp', ['ngRoute', 'ngAnimate', 'toaster']);

app.config(['$routeProvider',
  function ($routeProvider) {
      console.log($routeProvider);
        $routeProvider.
        when('/login', {
            title: 'Login',
            templateUrl: 'sections/admin/login/login.tpl.html',
            controller: 'authCtrl as login'
        })
        .when('/home', {
            title: 'Home Dashboard',
            templateUrl: 'sections/admin/home/home.tpl.html',
            controller: 'homeController as home'
        })
        .when('/', {
            title: 'Login',
            templateUrl: 'sections/admin/login/login.tpl.html',
            controller: 'loginController as login'
        })
        .otherwise({
            redirectTo: '/login'
        });
  }])
    .run(function ($rootScope, $location, Data) {
        console.log('error checkgin');
        $rootScope.$on("$routeChangeStart", function (event, next, current) {
            console.log('edafefe');
            $rootScope.authenticated = false;
            Data.get('session').then(function (results) {
                if (results.uid) {
                    $rootScope.authenticated = true;
                    $rootScope.uid = results.uid;
                    $rootScope.name = results.name;
                    $rootScope.email = results.email;
                } else {
                    $location.path('login');
                    /*var nextUrl = next.$$route.originalPath;
                    if (nextUrl == '/signup' || nextUrl == '/login') {

                    } else {
                        $location.path("/home");
                    }*/
                }
            });
        });
    });