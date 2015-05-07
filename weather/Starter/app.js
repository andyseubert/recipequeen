var weatherApp = angular.module('weatherApp',['ngRoute','ngResource']);


//routes
weatherApp.config(function($routeProvider){
    
    $routeProvider
    .when ('/',{
        templateUrl:'/weather/Starter/pages/home.html',
        controller:'homePageController'
    })
           .when('/forecast',{
        templateUrl:'/weather/Starter/pages/forecast.html',
        controller:'forecastController'
    })
});

//controllers
weatherApp.controller('homePageController',['$scope', function($scope){
    
    
}]);


weatherApp.controller('forecastController',['$scope', function($scope){
    
    
}]);

