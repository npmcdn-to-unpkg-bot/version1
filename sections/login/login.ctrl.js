angular
    .module('adminApp')
    .controller('loginController', function($scope, $rootScope, $routeParams, $location, $http, Data) {
        //Setup view model object
        console.log('login CONTROLLER');
        var vm = this;

        vm.login = function(){
            console.log("login function");
            console.log(vm.username , "  ::  ", vm.password);
            var customer = {};
            customer.email=vm.username;
            customer.password=vm.password;
            Data.post('login', {
                customer: customer
            }).then(function (results) {
                    console.log("RESULTS", results);
                    Data.toast(results);
                    if (results.status == "success") {
                        if(results.uid > 0) {
                            $location.path('home');
                        }
                        console.log("LOGGING IN:: ", results);
                    }
                });
        }
    });