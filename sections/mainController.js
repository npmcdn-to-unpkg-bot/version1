angular
    .module('myApp')
    .controller('mainController', function($scope, $rootScope, $routeParams, $location, $http, Data) {
        //Setup view model object
        console.log('main CONTROLLER');
        $scope.showMenu = true;
        console.log("rootScope");
        console.log($rootScope);
        $scope.doLogin = function (customer) {
            Data.post('login', {
                customer: customer
            }).then(function (results) {
                    console.log("RESULTS", results);
                    Data.toast(results);
                    if (results.status == "success") {
                        if(results.type == 0){
                            $location.path('home');
                        }
                        else {
                            $location.path('admin');
                        }
                    }
                });
        };
    });
