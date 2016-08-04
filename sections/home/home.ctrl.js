angular
    .module('myApp')
    .controller('HomeController', function($scope, $location, $http, Data) {
        //Setup view model object
        console.log('HOME CONTROLLER');
        var vm = this;
        vm.btnMetier = [];
        Data.get('session').then(function (results) {
            $scope.sessionInfo = results;
            console.log(results, 'results from admin');

            //$location();
        });
       /* vm.btnMetier = [
            {id : 1 , metier: 'Tous les produits', sub_metier:''},
            {id: 2, metier: 'Métier de la fleur', sub_metier:''},
            {id: 3, metier: 'Goût Salé', sub_metier: 'Hotellerie & Gastronomie'},
            {id: 4, metier: 'Goût Sucré', sub_metier: 'Métiers de Bouche'},
            {id: 5, metier: 'Prêt à Porter', sub_metier:''},
            {id: 6, metier: 'Bijoux & Montres', sub_metier:''},
            {id: 7, metier: 'Parfumeur', sub_metier:''},
            {id: 8, metier: 'Funéraire', sub_metier:''},
            {id: 9, metier: 'Commerce & Artisane', sub_metier:''},
            {id: 10, metier: 'Autre', sub_metier:''}
        ];*/
        vm.metier = [
            {id:1,description:'Etiquette Adhesive',         category:1, src:'assets/img/etiquette_adhesive.png'},
            {id:2,description:'Etiquette Prix',             category:1, src:'assets/img/etiquette_prix.png'},
            {id:3,description:'Contenants',                 category:2, src:'assets/img/contenants.png'},
            {id:4,description:'Carte Message',              category:3, src:'assets/img/carte_message.png'},
            {id:5,description:'Flyer et Flyer intelligent', category:4, src:'assets/img/flyer.png'},
            {id:6,description:'Carte',                      category:5, src:'assets/img/CARTE.png'},
            {id:7,description:'Plaquette',                  category:1, src:'assets/img/PLAQUETTE.png'},
            {id:8,description:'Calendrier',                 category:2, src:'assets/img/CALENDRIERS.png'},
            {id:9,description:'Bloc Note',                  category:3, src:'assets/img/bloc_note.png'},
            {id:10,description:'Disque de Stationnement',   category:5, src:'assets/img/disque_stationnement.png'},
            {id:11,description:'Chèque Cadeau',             category:6, src:'assets/img/cheque_cadeau.png'},
            {id:12,description:'Kit Parfumé',               category:7, src:'assets/img/kit_parfume.png'},
            {id:13,description:'Marque Page & Règles',      category:8, src:'assets/img/marque_page_regles.png'},
            {id:14,description:'Sous Main',                 category:9, src:'assets/img/sous_main.png'},
            {id:15,description:'Chemise à rabats',          category:10, src:'assets/img/chemise_rabats.png'},
            {id:16,description:'Sac',                       category:1, src:'assets/img/sac.png'},
            {id:17,description:'Ruban Bolduc',              category:2, src:'assets/img/ruban_bolduc.png'},
            {id:18,description:'Agenda',                    category:3, src:'assets/img/agenda.png'},
            {id:19,description:'Affiche',                   category:4, src:'assets/img/affiche.png'},
            {id:20,description:'Lettre',                    category:5, src:'assets/img/lettre.png'},
            {id:21,description:'Envelope',                  category:6, src:'assets/img/enveloppe.png'},
            {id:22,description:'Accroche Porte',            category:7, src:'assets/img/accroche_porte.png'},
            {id:23,description:'Rond de Serviette',         category:8, src:'assets/img/rond_serviette.png'},
            {id:24,description:'Serviette',                 category:9, src:'assets/img/serviette.png'},
            {id:25,description:'Sous-Bock',                 category:10, src:'assets/img/sous_bock.png'},
            {id:26,description:'Collerette Bouteille',      category:1, src:'assets/img/collerette_bouteille.png'},
            {id:27,description:'Set de Table',              category:2, src:'assets/img/set_table.png'},
            {id:28,description:'Pochette Couvert',          category:3, src:'assets/img/pochette_couvert.png'},
            {id:29,description:'Menu',                      category:4, src:'assets/img/menu.png'},
            {id:30,description:'Ballotin',                  category:5, src:'assets/img/ballotin.png'},
            {id:31,description:'Boîte Cadeau',              category:6, src:'assets/img/boite_cadeau.png'},
            {id:32,description:'Boîte Gastronomique',       category:7, src:'assets/img/boite_gastronomique.png'},
            {id:33,description:'Emballage',                 category:8, src:'assets/img/emballage.png'},
            {id:34,description:'Carte Postale',             category:9, src:'assets/img/carte_postale.png'}
        ];
        console.log(vm.metier);

        vm.instructions = [
            {id:1, description: "Réalisez votre maquette gratuitement et ensuite passer votre commande."},
            {id:1, description: "Choisissez votre profession et votre produit puis allez dans la fiche technique de votre produit."},
            {id:1, description: "Choisissez parmi nos modèles que vous pourrez modifier à votre convenance ou bien schématisez votre maquette. Choisissez vos caractères, vos photos et couleurs dans nos banques d’images. Une fois schématisez, votre maquette sera traitée par nos graphistes et sera mis à votre disposition gratuitement, vous pourrez la faire modifier à tout moment."},
            {id:1, description: "Vous avez vos photos, vos logos ou votre maquette télécharger le."},
            {id:1, description: "Vous avez votre maquette sur papier prenez une photo et téléchargez la."},
            {id:1, description: "Vous avez des idées mais pas le temps ou vous ne trouvez votre choix Vous avez besoin d’aide et vous voulez être rappelé par un conseil."},
            {id:1, description: "Vous avez plusieurs produits créezun modèle de base on pourra s’en servir pour la conception de tous vos produit"},
                        ];

        vm.fnImgClick = function($id){
            console.log("CLICKED IMG: "+$id);
            $location.path('fichetech');
        }

        //WEBSERVICE
        vm.fnRecupMetier = function(){
            $http({
                method: 'GET',
                params: {mode:0},
                url: 'api/v1/info.php'
            }).then(function successCallback(response) {
                    console.log(response.data);
                    vm.btnMetier = response.data;
                }, function errorCallback(error) {
                    console.log(error);
                });
        };

        vm.fnInsertMetier = function(libelle, sub_libelle) {
            $http({
                method: 'GET',
                params: {mode:1, desig:libelle, sub_desig:sub_libelle},
                url: 'api/v1/info.php'
            }).then(function successCallback(response) {
                    // this callback will be called asynchronously
                    // when the response is available
                    console.log('insert mode');
                    console.log(response.data);
                }, function errorCallback(error) {
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                    console.log(error);
                });
        };

        vm.fnRecupMetier();
        /*angular.forEach(vm.btnMetier, function(value){
            vm.fnInsertMetier(value.metier, value.sub_metier);
        })*/


    });
