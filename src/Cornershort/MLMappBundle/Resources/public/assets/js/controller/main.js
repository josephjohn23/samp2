var myAppModule = angular
	.module("myAppModule", [])
	.controller("myAppController", function($scope, $http, $rootScope) {
        $scope.searchMember = function () {
            console.log("Search member");
            var data = {
                member_id: document.getElementById("member_id").value
            }

            $http(
                    {
                        method: 'POST',
                        url: '/api/memberpaymenthistories/searches/members',
                        data: data,
                        headers: {
                            "Content-Type": "application/json; charset=utf-8",
                            "Accept": "application/json"
                        }
                    })
                    .then(
                            function (results) {
                                $rootScope.memberInfo = results.data[0];
                                if ($rootScope.memberInfo == undefined){
                                    $("html, body").animate({scrollTop: 1}, 1000);
                                    messageAlert('Member Id is incorrect!', 'danger');
                                }
                                console.log($rootScope.memberInfo);
                                return results;
                            });
        };

        $scope.updateProductMember = function () {
            console.log("Search member");
            var data = {
                member_id: document.getElementById("member_id").value,
                type: 'product'
            }

            $http(
                    {
                        method: 'POST',
                        url: '/api/memberpaymenthistories/upgrades/members',
                        data: data,
                        headers: {
                            "Content-Type": "application/json; charset=utf-8",
                            "Accept": "application/json"
                        }
                    })
                    .then(
                            function (results) {
                                console.log(results);
                                return results;
                            });
        };

        $scope.messageAlert = function (data, type) {
            $("#message_" + type).show();
            $("#message_" + type).html(data);

            setTimeout(function () {
                $("#message_" + type).hide();
                // window.location = window.location;
            }, 5000);
        };
});
