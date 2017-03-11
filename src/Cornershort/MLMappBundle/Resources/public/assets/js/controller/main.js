var myAppModule = angular
	.module("myAppModule", [])
	.controller("myAppController", function($scope, $http, $rootScope) {
		$scope.homeTab_searchMemberInfo = function () {
			console.log('home');
			var data = {
				member_id: '00000001',
				leader_id: '00000001'
			}

			$http(
					{
						method: 'POST',
						url: '/api/users/homes',
						data: data,
						headers: {
							"Content-Type": "application/json; charset=utf-8",
							"Accept": "application/json"
						}
					})
					.then(
							function (results) {
								$rootScope.homeTabResults = results.data;
								$rootScope.homeTabResultsMemberInfos = results.data.member_infos[0] == null ? 0 : 1;
							});
		};

		$scope.registerMemberTab_searchLeaderId = function () {
			var data = {
				leader_id: $('#leader_id').val()
			}

			$http(
					{
						method: 'POST',
						url: '/api/users/finds/mies/infos',
						data: data,
						headers: {
							"Content-Type": "application/json; charset=utf-8",
							"Accept": "application/json"
						}
					})
					.then(
							function (results) {
								if (typeof results.data.myInfo === "undefined"){
									$("html, body").animate({scrollTop: 1}, 1000);
									$('#leader_name').val('');
									messageAlert('Member Id do not exist!', 'danger');
								} else {
									$('#leader_name').val(results.data.myInfo[0].first_name + ' ' + results.data.myInfo[0].last_name);
								}
							});
		};

		$scope.registerMemberTab_searchMyInfo = function () {
			var data = {
				leader_id: '00000001'
			}

			$http(
					{
						method: 'POST',
						url: '/api/users/finds/mies/infos',
						data: data,
						headers: {
							"Content-Type": "application/json; charset=utf-8",
							"Accept": "application/json"
						}
					})
					.then(
							function (results) {
								$rootScope.registerMemberTabResults = results.data;
							});
		};

		$scope.registerMemberTab_addNewMember = function () {
		    var data = {
				leader_id: $('#leader_id').val(),
				next_leader_id: $('#leader_id').val(),
		        password: 'abc123',
		        last_name: $('#last_name').val(),
		        first_name: $('#first_name').val(),
		        middle_name: $('#middle_name').val(),
		        date_of_birth: $('#date_of_birth').val(),
		        gender: $('#gender').val(),
		        mobile_number: $('#mobile_number').val(),
		        email: $('#email').val(),
		        home_add_house_no: $('#home_add_house_no').val(),
		        home_addr_street: $('#home_addr_street').val(),
		        home_addr_brgy: $('#home_addr_brgy').val(),
		        home_addr_subd: $('#home_addr_subd').val(),
		        home_addr_city: $('#home_addr_city').val(),
		        home_addr_province: $('#home_addr_province').val(),
		        username: $('#email').val(),
		        username_canonical: $('#email').val(),
		        email_canonical: $('#email').val(),
		        user_id: $('#leaders_id').val(),
		        bank_acct_no: $('#bank_acct_no').val()
		    };

			$http(
                    {
                        method: 'POST',
                        url: '/api/users/adds/registers/members',
                        data: data,
                        headers: {
                            "Content-Type": "application/json; charset=utf-8",
                            "Accept": "application/json"
                        }
                    })
                    .then(
                            function (results) {
								$("html, body").animate({scrollTop: 1}, 1000);
						        if (results.data == "Success"){
									$scope.registerMemberTab_searchMyInfo();
						            messageAlert('Successfully added new members!', 'success');
						        } else {
						            messageAlert('Unable to add new member!', 'danger');
						        }
                            });
		};

        $scope.searchMember = function () {
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
                                return results;
                            });
        };

        $scope.updateProductMember = function () {
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

		//Load Functions
		$scope.homeTab_searchMemberInfo();
		$scope.registerMemberTab_searchMyInfo();
});
