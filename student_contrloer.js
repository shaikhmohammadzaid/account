//Reference File app.js
myApp.controller('student_contrloer', function ($scope, $state, $http, $location) {
    var vm = this;
  
  alert('now you are here');

   

    this.delete_student_info = function (id) {
        $http.post('updatep.php?id=' + d).then(function (response) {
            vm.msg = response.data.message;
            vm.alert_class = 'custom-alert';
            vm.loadData($scope.currentPage);
        });
    };


});

