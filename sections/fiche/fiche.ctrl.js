
angular
    .module('myApp')
    .controller('ficheController', function($scope, $location, $timeout, messages, $http) {
        console.log('fiche controller');
        $(".modal-backdrop").remove();
        $("body").removeClass("modal-open");
        var vm = this;
        //console.log("FACT VALUE:: ", messages.list);

        vm.imgList = [
            {id:1,title:"Cheque cadeau",src:"assets/img/cheque_cadeau.png"},
            {id:2,title:"Carte Message",src:"assets/img/carte_message.png"},
            {id:3,title:"Carte",src:"assets/img/CARTE.png"},
            {id:4,title:"emballage",src:"assets/img/emballage.png"},
            {id:5,title:"contenants",src:"assets/img/contenants.png"},
            {id:6,title:"Envelope",src:"assets/img/enveloppe.png"},
            {id:7,title:"Etiquette Adhesive",src:"assets/img/etiquette_adhesive.png"},
            {id:8,title:"Flyer",src:"assets/img/flyer.png"},
            {id:9,title:"Lettre",src:"assets/img/lettre.png"},
            {id:10,title:"Pochette Couvert",src:"assets/img/pochette_couvert.png"}
        ];

        vm.productList = [
            {id:1, title:'Etiquette', thumbnail_src:'images/etiquetteprix/maquette_complet1.png', img_src : [
                {id:1 , src:'images/etiquetteprix/etiquette_prix1.png'}
            ]}
        ];


        vm.productsDesign = [
            {id:1, title:'SWIRL', imgsrc:[
                {id:1, src:'images/designs/swirl.png', title:'Swirl'},
                {id:2, src:'images/designs/swirl2.png', title:'Swirl 2'},
                {id:3, src:'images/designs/swirl3.png', title:'Swirl 3'},
                {id:4, src:'images/designs/heart_blur.png', title:'Heart Blur'},
                {id:5, src:'images/designs/converse.png', title:'Converse'},
                {id:6, src:'images/designs/crown.png', title:'Crown'},
                {id:7, src:'images/designs/men_women.png', title:'Men hits Women'}
            ]},
            {id:2, title:'Retro', imgsrc:[
                {id:1, src:'images/designs/retro_1.png', title:'Retro One'},
                {id:2, src:'images/designs/retro_2.png', title:'Retro Two'},
                {id:3, src:'images/designs/retro_3.png', title:'Retro Three'},
                {id:4, src:'images/designs/heart_circle.png', title:'Heart Circle'},
                {id:5, src:'images/designs/swirl.png', title:'Swirl'},
                {id:6, src:'images/designs/swirl2.png', title:'Swirl 2'},
                {id:7, src:'images/designs/swirl3.png', title:'Swirl 3'}
            ]},
            {id:3, title:'Carte', imgsrc:[
                {id:1, src:'images/businesscard/adresse.png', title:'Adresse'},
                {id:2, src:'images/businesscard/down.png', title:'Down'},
                {id:3, src:'images/businesscard/upper.png', title:'Up'},
                {id:4, src:'images/businesscard/logo.png', title:'Logo'}
            ]},
            {id:3, title:'Retro', imgsrc:[
                {id:1, src:'images/carte/1.png', title:'IMG1'},
                {id:1, src:'images/carte/2.png', title:'IMG2'},
                {id:1, src:'images/carte/3.png', title:'IMG3'},
                {id:1, src:'images/carte/4.png', title:'IMG4'},
                {id:1, src:'images/carte/5.png', title:'IMG5'}
            ]},
        ];

        vm.fnInit = function() {
            console.log('initialising protocol info.php');
            console.log(messages.list[0]);
            $http({
                method: 'GET',
                params: {mode:3,metier: messages.list[0].id_metier},
                url: 'api/v1/info.php'
            }).then(function successCallback(response) {
                    console.log("MODEL METIER");
                    console.log(response.data);
                    vm.productList1=response.data;
                    $timeout(function() {
                        $("#imgScroll").endlessScroll({ width: '100%',height: '250px', steps: -2, speed: 40, mousestop: true });

                        var $yourDesigner = $('#model'),
                            pluginOpts = {
                                stageWidth: 1200,
                                editorMode: true,
                                fonts: ['Arial', 'Fearless', 'Helvetica', 'Times New Roman', 'Verdana', 'Geneva', 'Gorditas','Amerika Sans'],
                                customTextParameters: {
                                    colors: true,
                                    removable: true,
                                    resizable: true,
                                    draggable: true,
                                    rotatable: true,
                                    autoCenter: true,
                                    boundingBox: "Base",
                                    curvable:true,
                                    curveReverse:true
                                },
                                customImageParameters: {
                                    draggable: true,
                                    removable: true,
                                    resizable: true,
                                    rotatable: true,
                                    colors: '#000',
                                    autoCenter: true,
                                    boundingBox: "Base"
                                },
                                customAdds:{
                                    uploads:true
                                },
                                customImageAjaxSettings:{
                                    data:{
                                        saveOnServer:1,
                                        uploadsDir:'../test',
                                        uploadsDirURL:"./test"
                                    },
                                    url:'api/imageUpload.php'
                                },
                                imageParameters : {
                                    availableFilters: ['grayscale', 'sepia', 'sepia2'],
                                    filter:true
                                },
                                actions:  {
                                    'top': ['download','print', 'snap', 'preview-lightbox'],
                                    'right': ['magnify-glass', 'zoom', 'reset-product', 'qr-code', 'ruler'],
                                    'bottom': ['undo','redo'],
                                    'left': ['manage-layers','info','save','load']
                                }
                            }
                        //, yourDesigner = new FancyProductDesigner($yourDesigner, pluginOpts);
                        var yourDesigner = new FancyProductDesigner($yourDesigner);
                        /*yourDesigner.addProduct([{title:'TEST', thumbnail:'images/carte/5.png', elements:[{source:'images/gabarits/fond image r-1.png', title:'TEST', type:'image',
                            parameters:{draggable: true,
                            removable: true,
                            resizable: true,
                            rotatable: true,
                            colors: '#000',
                            autoCenter: true}}]}]);*/


                        angular.forEach(vm.productList1, function(value){
                            var arrProducts = [];
                            arrProducts.push({title:value.libelle, thumbnail:value.src, elements:value.front.elements});
                            arrProducts.push({title:value.libelle, thumbnail:value.src, elements:value.back.elements});
                            yourDesigner.addProduct(arrProducts);
                            console.log(arrProducts, "  £££");
                            console.log(value.front.elements, "  £££");
                            console.log(value.back.elements, "  £££");

                        });


                        //print button
                        $('#print-button').click(function(){
                            yourDesigner.print();
                            return false;
                        });

                        //create an image
                        $('#image-button').click(function(){
                            var image = yourDesigner.createImage();
                            return false;
                        });

                        //checkout button with getProduct()
                        $('#checkout-button').click(function(){
                            var product = yourDesigner.getProduct();
                            console.log(product);
                            return false;
                        });

                        //event handler when the price is changing
                        $yourDesigner.on('priceChange', function(evt, price, currentPrice) {
                            $('#thsirt-price').text(currentPrice);
                        });

                        //save image on webserver
                        $('#save-image-php').click(function() {

                            yourDesigner.getProductDataURL(function(dataURL) {
                                $.post( "php/save_image.php", { base64_image: dataURL} );
                            });

                        });

                        //send image via mail
                        $('#send-image-mail-php').click(function() {

                            yourDesigner.getProductDataURL(function(dataURL) {
                                $.post( "php/send_image_via_mail.php", { base64_image: dataURL} );
                            });

                        });
                    }, 0);
                }, function errorCallback(error) {
                    console.log(error);
                });


        }
        vm.fnInit();





    });
