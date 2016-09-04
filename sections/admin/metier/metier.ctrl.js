angular
    .module('adminApp')
    .controller('metierController', function($scope, $rootScope, $routeParams, $location, $http, Data, $timeout, FileUploader) {
        var vm = this;
        $scope.header = "Listes des metiers";
        function formatter(row, cell, value, columnDef, dataContext) {
            return value;
        }
        var grid;
        var data = [];
        var columns = [
            {id: "Libelle", name: "Libelle", field: "title", width: 120, formatter: formatter},
            {id: "duration", name: "Duration", field: "duration"},
            {id: "%", name: "% Complete", field: "percentComplete", width: 80, resizable: false, formatter: Slick.Formatters.PercentCompleteBar},
            {id: "start", name: "Start", field: "start", minWidth: 60},
            {id: "finish", name: "Finish", field: "finish", minWidth: 60},
            {id: "effort-driven", name: "Effort Driven", sortable: false, width: 80, minWidth: 20, maxWidth: 80, field: "effortDriven", formatter: Slick.Formatters.Checkmark}
        ];
        var options = {
            editable: false,
            enableAddRow: false,
            enableCellNavigation: true,
            headerRowHeight:100,
            rowHeight:50
        };
        $(function () {
            for (var i = 0; i < 5; i++) {
                var d = (data[i] = {});
                d["title"] = "<a href='#' tabindex='0'>Task</a> " + i;
                d["duration"] = "5 days";
                d["percentComplete"] = Math.min(100, Math.round(Math.random() * 110));
                d["start"] = "01/01/2009";
                d["finish"] = "01/05/2009";
                d["effortDriven"] = (i % 5 == 0);
            }
            grid = new Slick.Grid("#myGrid", data, columns, options);
        })
    });