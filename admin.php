<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Exacom</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <!-- build:css assets/css/styles.css -->
    <!-- The CSS for the plugin itself - required -->
    <link rel="stylesheet" type="text/css" href="css/FancyProductDesigner-all.min.css" />
    <!-- Optional - only when you would like to use custom fonts - optional -->
    <link rel="stylesheet" type="text/css" href="css/jquery.fancyProductDesigner-fonts.css" />
    <!-- endbuild -->
</head>
<body data-ng-app="adminApp" ng-controller="mainController">
<section id="main">
    <div class="container">
        <ng-view></ng-view>
    </div>
</section>

<!-- build:assets assets.min.js -->
<!-- ASSETS -->
<script src="assets/js/jquery.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.ui.core.min.js"></script>
<script src="js/jquery.ui.widget.min.js"></script>
<script src="js/jquery.ui.mouse.min.js"></script>
<script src="js/jquery.ui.draggable.min.js"></script>
<script src="js/jquery.ui.sortable.min.js"></script>
<script src="assets/js/endless_scroll_min.js"></script>
<script src="js/fabric.min.js"></script>
<script src="js/FancyProductDesigner-all.min.js"></script>
<script src="assets/js/angular-1.5.7/angular.js"></script>
<script src="assets/js/angular-1.5.7/angular-animate.js"></script>
<script src="assets/js/angular-1.5.7/angular-route.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ui-bootstrap-tpls-1.1.2.min.js"></script>
<script src="js/toaster.js"></script>
<script src="app/admin/app.js"></script>
<script src="app/admin/data.js"></script>
<script src="app/admin/directives.js"></script>
<script src="app/admin/authCtrl.js"></script>
<!-- / -->
<!-- endbuild -->
<!-- build:js app.min.js -->
<!-- MODULES -->

<!-- / -->
<!-- CONTROLLERS -->
<script src="sections/admin/mainController.js"></script>
<script src="sections/admin/login/login.ctrl.js"></script>
<script src="sections/admin/home/home.ctrl.js"></script>
<!--script src="sections/premieres/premieres.ctrl.js"></script>
<script src="sections/search/search.ctrl.js"></script>
<script src="sections/view/view.ctrl.js"></script>
<script src="components/bar/bar.ctrl.js"></script>
<script src="sections/popular/popular.ctrl.js"></script>
<!-- / -->
<!-- SERVICES -->
<!--script src="services/show.fct.js"></script>
<script src="services/page.val.js"></script>
<!-- / -->
<!-- DIRECTIVES -->
<!--script src="components/show/show.drct.js"></script>
<script src="directives/ngEnter.drct.js"></script-->
<!-- / -->
<!-- inject:js -->
<!-- endinject -->
<!-- endbuild -->
</body>
</html>