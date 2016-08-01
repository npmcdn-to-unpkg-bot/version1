angular
    .module('myApp')
    .controller('adminController', function($scope,$rootScope, $location, $timeout, Data) {
        console.log("admin controller");
        $scope.showMenu = true;
        Data.get('session').then(function (results) {
            $scope.sessionInfo = results;
            console.log(results, 'results from admin');

            if (results.uid) {
                if($scope.sessionInfo.admin == 1) {
                    $scope.showMenu = false
                }
                else{
                    $location.path('home');
                }
            }
            else {
                console.log('entere here not logged in');
                $location.path('home');
            }

            //$location();
        });
    });