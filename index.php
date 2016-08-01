<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Exacom</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <!-- build:css assets/css/styles.css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="sections/home/home.css"/>
    
    <link rel="stylesheet" href="sections/fiche/fiche.css"/>
    <!-- The CSS for the plugin itself - required -->
    <link rel="stylesheet" type="text/css" href="css/FancyProductDesigner-all.min.css" />
    <!-- Optional - only when you would like to use custom fonts - optional -->
    <link rel="stylesheet" type="text/css" href="css/jquery.fancyProductDesigner-fonts.css" />
    <!--link rel="stylesheet" href="assets/css/font-icons.css" type='text/css'>
    <link rel="stylesheet" href="assets/css/animations.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="sections/home/home.css"/>
    <link rel="stylesheet" href="components/show/show.css"/>
    <link rel="stylesheet" href="sections/view/view.css"/>
    <link rel="stylesheet" href="sections/search/search.css"/>
    <link rel="stylesheet" href="sections/premieres/premieres.css"/-->
    <!-- endbuild -->
</head>
<body data-ng-app="myApp" ng-controller="mainController">

<div class="container" ng-show="showMenu">
    <div class="row" style="margin-right: 0px">
        <div class="col-md-6 col-sm-6">
            <div class='block-image'><img src="assets/img/logo%20exakom.png"></div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class='block-tel'>
                <div class="col-md-12">Nous contacter par email</div>
                <div class="col-md-12">Tél : 00 00 00 00 00</div>
                <div class="col-md-12"><img  src="assets/img/numero_verte.png"></div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form name="loginForm" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="email"> Email / Phone </label>
                        <div class="col-sm-7">
                           <span class="block input-icon input-icon-right">
                                <input type="text" class="form-control" placeholder="Email / Phone" name="email" ng-model="login.email" required focus/>
                                <i class="ace-icon fa fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="password"> Password </label>
                        <div class="col-sm-7">
                           <span class="block input-icon input-icon-right">
                                <input type="password" class="form-control" placeholder="Password" ng-model="login.password" required/>
                                <i class="ace-icon fa fa-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="space"></div>
                    <div class="clearfix">
                        <div class="row">
                            <label class="col-sm-3 control-label no-padding-right"> </label>
                            <div class="col-sm-7">

                            </div>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <span class="lbl col-sm-3"> </span><div class="col-sm-7">Don't have an account? <a href="#/signup">Signup</a></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="width-35 pull-right btn btn-md btn-primary" data-dismiss="modal" ng-click="doLogin(login)" data-ng-disabled="loginForm.$invalid">
                    <i class="ace-icon fa fa-key"></i>
                    Login
                </button>
                <button type="button" class="btn btn-danger pull-left" ng-click="logout()">LOGOUT</button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <nav class="navbar navbar-default" ng-show="showMenu">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a style="color: white" href="#/home">ACCEUIL <span class="sr-only">(current)</span></a></li>
                    <li><a href="#" style="color: white">CONTACT</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" style="color: white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ESPACE CLIENT <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" style="color: white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ESPACE REVENDEUR <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right  ">
                    <li><a href="#myModal" data-toggle="modal" style="color: white">

    <span class="glyphicon glyphicon-user"></span>
                        <!-- /.navbar-collapse <button class="btn-primary btn-sm">Identifiez-vous</button>--></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" style="color: white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">FR <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
    <form class="navbar-form navbar-right visible-lg" role="search">
                    <div class="form-group ">
                        <input type="text" class="form-control" placeholder="Recherche">
                    </div>
                    <span class="glyphicon glyphicon-search"  aria-hidden="true"></span>
                </form>

                <form class="navbar-form navbar-center text-center visible-sm visible-md" role="search">
                    <div class="form-group ">
                        <input type="text" class="form-control" placeholder="Recherche">
                    </div>
                    <span class="glyphicon glyphicon-search"  aria-hidden="true"></span>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <nav class="navbar navbar-inverse" ng-show="!showMenu">
        <div class="control-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a style="color: white" href="#/home">ACCEUIL <span class="sr-only">(current)</span></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right  ">
                    <li><a href="#myModal" data-toggle="modal" style="color: white">
                            <span class="glyphicon glyphicon-user"></span>
                            <!-- /.navbar-collapse <button class="btn-primary btn-sm">Identifiez-vous</button>--></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<section id="main">
    <div class="container">
        <ng-view></ng-view>
    </div>
</section>
<footer ng-show="showMenu">
    <div class="container">
        <div class="process">
        </div>
    </div>
    <div class="container">
        <div class="signature">
        </div>
    </div>
</footer>

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
<script src="app/app.js"></script>
<script src="app/data.js"></script>
<script src="app/directives.js"></script>
<script src="app/authCtrl.js"></script>
<!-- / -->
<!-- endbuild -->
<!-- build:js app.min.js -->
<!-- MODULES -->

<!-- / -->
<!-- CONTROLLERS -->
<script src="sections/mainController.js"></script>
<script src="sections/home/home.ctrl.js"></script>
<script src="sections/fiche/fiche.ctrl.js"></script>
<script src="sections/admin/admin.ctrl.js"></script>
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