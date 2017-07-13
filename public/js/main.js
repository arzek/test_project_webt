var app =  angular.module('app', []);

app.controller('MainController', ['$scope','$http', function($scope,$http) {


    $scope.date_0 = new Date();
    $scope.data = [];


    $scope.table = $('#dataTables-example').DataTable({
        responsive: true
    });

    $('input[name="date"]').datepicker({
        format: 'mm/dd/yyyy'
    })
        .on('changeDate', function(e) {
            $scope.date_0 = new Date(e.date);
            get_currencies($scope.date_0);
        });


    get_currencies($scope.date_0);


    function get_currencies(date)
    {
        $http.get("/public/get_currencies?date="+getFormatDate()).then(function(response) {
            var data = response.data;
            if(data.length)
            {
                $scope.data = data;
                render();
            }else
            {
                getLoadReq();
            }
        });
    }
    function getFormatDate() {
        var date = new Date($scope.date_0);
        return date.getFullYear() + '/' +(date.getMonth() + 1)  + '/' +  date.getDate();
    }
    function getFormatDateV2() {
        var month = ($scope.date_0.getMonth() + 1);
        var dey = $scope.date_0.getDate();

        if(month < 10 )
            month = '0'+String(month);


        if(dey<10)
            dey = '0'+String(dey);

        return  String($scope.date_0.getFullYear()) + String(month)  + String(dey);
    }
    function render() {
        $scope.table.clear();
        for (var i = 0; i < $scope.data.length; i++)
        {
            $scope.table.row.add(Object.values($scope.data[i])).draw( false );
        }
    }
    function getLoadReq() {
        $http.get("/public/fast_load_currencies?date="+getFormatDateV2()).then(function(response) {
            var data = response.data;


            if(data.length)
            {
                $scope.data = data;
                render();
                getLoadReqV2();
            }else
            {

                getInfo()
            }
        });
    }
    function getInfo() {
        swal(
            'No data for this date!',
            'Please choose another date.',
            'warning'
        )
    }
    function getLoadReqV2() {
        $http.get("/public/load_currencies?date="+getFormatDateV2()).then(function(response) {});
    }

}]);
