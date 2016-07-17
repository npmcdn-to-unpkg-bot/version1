angular
    .module('adminApp')
    .controller('mainController', function($scope, $location) {
        //Setup view model object
        console.log('main CONTROLLER');
        $scope.showMenu = true;
    });
