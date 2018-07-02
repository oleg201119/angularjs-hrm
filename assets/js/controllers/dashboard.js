app.controller('dashboardController', ['$scope', '$rootScope', 'cookie', function ($scope, $rootScope, cookie) {

    var userData = cookie.checkLoggedIn();
    cookie.getPermissions();

    $scope.GoBack = function() {
        $location.path('/');
    }
}]);
