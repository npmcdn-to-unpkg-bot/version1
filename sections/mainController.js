angular
    .module('myApp')
    .controller('mainController', function($scope, $rootScope, $routeParams, $location, $http, Data) {
        //Setup view model object
        console.log('main CONTROLLER');
        $scope.showMenu = true;
        Data.get('session').then(function (results) {
            $scope.sessionInfo = results;

            if (results.uid) {
                console.log('enterede here ');
                if($scope.sessionInfo.admin == 1) {
                    $scope.showMenu = false
                }
            }
            else {
                console.log('entere here not logged in');
                $location.path('home');
            }
            //$location();
        });

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

        $scope.logout = function () {
            console.log("main js logout");
            Data.get('logout').then(function (results) {
                Data.toast(results);
                $location.path('home');
            });
        }
    });
