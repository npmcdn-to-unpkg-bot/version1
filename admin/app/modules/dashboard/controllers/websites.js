/*==========================================================
    Author      : arvind K
    Date Created: 13 Jan 2016
    Description : Controller to handle Websites page
    Change Log
    s.no      date    author     description     


 ===========================================================*/

dashboard.controller("WebsitesController", ['$rootScope', '$scope', '$state', '$location', 'dashboardService', 'Flash',
function ($rootScope, $scope, $state, $location, dashboardService, Flash) {
    var vm = this;

    vm.websites = [
        {
            title: "KMIT Solutions",
            image: "kmit",
            link:"http://kmitsoltions.com"
        },
        {
            title: "Parallax Site",
            image: "whatsnew",
            link: "http://kmitsoltions.com/whatsnew"
        },
        {
            title: "Palamalai Temple Site",
            image: "palamalai",
            link: "http://palamalairanganathar.org"
        },
        {
            title: "Pastor Jabez Christie",
            image: "jabez",
            link: "http://pastorjabezchristie.org"
        },
        {
            title: "My Personal Site",
            image: "ranjith",
            link: "http://arvind.in"
        },
        {
            title: "Jayam Real Estates",
            image: "jayam",
            link: "http://jayamrealestates.com"
        },
        {
            title: "Rescue Mission",
            image: "rescue",
            link: "http://rescue.arvind.in"
        },
        {
            title: "The Chennai Opticals",
            image: "chennaiopticals",
            link: "http://thechennaiopticals.com"
        },
        {
            title: "KMIT Solutions",
            image: "mytour",
            link: "http://mytour.arvind.in"
        },
        {
            title: "ME - CSE",
            image: "mecse",
            link: "http://mecse.arvind.in"
        },
        {
            title: "LogicSoft Software Solutions",
            image: "logicsoft",
            link: "http://logicsoft.net.in"
        },
        {
            title: "Lord Jesus Ministries",
            image: "ljm",
            link: "http://ljm.arvind.in"
        },
        {
            title: "Karpagam University Symposium",
            image: "kite",
            link: "http://kite.arvind.in"
        },
        {
            title: "Curriculam Vitae",
            image: "cv",
            link: "http://cv.arvind.in"
        },
        {
            title: "Kode Work",
            image: "kodework",
            link: "http://mockup.arvind.in"
        },
        {
            title: "Garments Today",
            image: "garment",
            link: "http://garmenttoday.in"
        }
    ];
    console.log("coming to Websites controller");

}]);

