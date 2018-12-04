var myApp = angular.module('example_codeenable', ['ui.router', 'ui.bootstrap']);

myApp.config(function ($stateProvider, $locationProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/');
    $stateProvider
            .state('/', {
                url: '/',
                
                controller: 'student_contrloer',
                controllerAs: "std_ctrl",
              

            })
            
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });




});

