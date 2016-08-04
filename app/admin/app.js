var app = angular.module('adminApp', ['ngRoute', 'ngAnimate', 'toaster']);

app.config(['$routeProvider',
  function ($routeProvider) {
      console.log($routeProvider);
        $routeProvider.
        when('/login', {
            title: 'Login',
            templateUrl: 'sections/login/login.tpl.html',
            controller: 'authCtrl as login'
        })
        .when('/home', {
            title: 'Admin Dashboard',
            templateUrl: 'sections/admin/home/home.tpl.html',
            controller: 'homeController as home'
        })
        .when('/param', {
            title: 'Parametrage',
            templateUrl: 'sections/admin/param/param.tpl.html',
            controller: 'paramController as param'
        })
        .when('/maquette', {
            title: 'Maquette',
            templateUrl: 'sections/admin/maquette/maquette.tpl.html',
            controller: 'maquetteController as maquette'
        })
        .when('/commande', {
            title: 'Commande',
            templateUrl: 'sections/admin/commande/commande.tpl.html',
            controller: 'commandeController as comm'
        })
        .when('/client', {
            title: 'Clients',
            templateUrl: 'sections/admin/client/client.tpl.html',
            controller: 'clientController as client'
        })
        .when('/revendeurs', {
            title: 'Revendeur',
            templateUrl: 'sections/admin/revendeur/revendeur.tpl.html',
            controller: 'revendeurController as revendeur'
        })
        .when('/', {
            title: 'Login',
            templateUrl: 'sections/login/login.tpl.html',
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
               console.log("SESSION CHECKED: ", results);
            });
        });
    });