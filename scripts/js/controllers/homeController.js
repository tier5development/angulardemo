/** Register a Controller */
demoApp.controller('HomeController', function($scope, $rootScope, HomeService, $timeout){
    $rootScope.showPop = false;
    $rootScope.showViewNavigation = false;
    $rootScope.showHomeNavigation = true;
    // hide popup method
    $rootScope.hidePop = function(){
        $rootScope.showPop = false;
    };

    // Show popup
    $rootScope.showPopUp = function(status, msg){
        $rootScope.showPop = true;
        $rootScope.msg = msg;
        $rootScope.status = status;
    };

    /** Initial Method */   
    $scope.init = function (){
        $scope.getUsers();
    }

    /** Function to get list of all Team Names from HomeService */
    $scope.getUsers = function(){
        HomeService.getData()
        .then(function(response){
        //    console.log(response);
            $scope.users = HomeService.list;
        }, function(error){
            //
        });
    }

    /** Function to sign up new user */
    $scope.signUpUser = function(request){ 
    //    console.log($scope.request);       
        HomeService.addData($scope.request)
        .then(function(response){
            delete $scope.request;
        //    $scope.request();
            $rootScope.showPopUp(response.statusIs, response.message);     
            $timeout(function(){
                $rootScope.hidePop();
            }, 5000);
        }, function(error){
            delete $scope.request;
            $rootScope.showPopUp(false, "Enter Proper Data!");     
            $timeout(function(){
                $rootScope.hidePop();
            }, 5000);
        });
    }

    /** Function to sign in existing users */
    $scope.signInUser = function(request){ 
    //    console.log($scope.request);       
        HomeService.checkData($scope.request)
        .then(function(response){
            delete $scope.request;
        //    $scope.request();
            $rootScope.showPopUp(response.statusIs, response.message);     
            $timeout(function(){
                $rootScope.hidePop();
            }, 5000);
        }, function(error){
            delete $scope.request;
            $rootScope.showPopUp(false, "Enter Proper Data!");     
            $timeout(function(){
                $rootScope.hidePop();
            }, 5000);
        });
    }

    // Calling initial function
    $scope.init();

});
