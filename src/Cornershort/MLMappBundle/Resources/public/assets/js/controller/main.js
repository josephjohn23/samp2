var myAppModule = angular
	.module("myAppModule", [])
	.controller("myAppController", function($scope, $http, $rootScope) {
		//HOME MENU
		$scope.homeTab_searchMemberInfo = function () {
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

		//REGISTER MEMBER MENU - ADD NEW MEMBER
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

		//REGISTER MEMBER MENU - ADD NEW MEMBER
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

		//REGISTER MEMBER MENU - ADD NEW MEMBER
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

		//REQUEST FOR UPGRADE MENU - MANUAL REQUEST
		$scope.requestUpgradeTab_searchNextLeader = function () {
			var data = {
				member_id: '00000001',
				leader_id: '00000001'
		    }

			$http(
                    {
                        method: 'POST',
                        url: '/api/memberpaymenthistories/searches/nexts/leaders',
                        data: data,
                        headers: {
                            "Content-Type": "application/json; charset=utf-8",
                            "Accept": "application/json"
                        }
                    })
                    .then(
                            function (results) {
								$rootScope.requestUpgradeTabResults = results.data;
                            });
		}

		//REQUEST FOR UPGRADE MENU - MANUAL REQUEST
		$scope.requestUpgradeTab_manual = function () {
		    var data = {
				member_id: '00000001',
				leader_id: '00000001'
		    }

			$http(
                    {
                        method: 'POST',
                        url: '/api/memberpaymenthistories/requests/fors/upgrades',
                        data: data,
                        headers: {
                            "Content-Type": "application/json; charset=utf-8",
                            "Accept": "application/json"
                        }
                    })
                    .then(
                            function (results) {
								console.log('requestUpgradeTab_manual ', results);
								$("html, body").animate({scrollTop: 1}, 1000);
						        if (results.data == "Success"){
									$scope.requestUpgradeTab_searchNextLeader();
						            messageAlert('Successfully requested for an upgrade!', 'success');
						        } else {
						            messageAlert('You already request for an upgrade!', 'danger');
								}
                            });
		};

		//UPGRADE MEMBER MENU - MANUAL UPGRADE (LEVEL)
		$scope.upgradeMemberTab_searchMemberInfo = function () {
			var data = {
				member_id: '00000001',
				leader_id: '00000001'
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
                                $rootScope.upgradeMemberTabResultsMemberInfos = results.data.memberInfos;
                            });
		}

		//UPGRADE MEMBER MENU - MANUAL UPGRADE (LEVEL)
		$scope.upgradeMemberTab_setBtnId = function (id, memberId) {
			localStorage.setItem('mphId', id);
			localStorage.setItem('memberId', memberId);
		}

		//UPGRADE MEMBER MENU - MANUAL UPGRADE (LEVEL)
		$scope.upgradeMemberTab_manual = function () {
			var mph_id = localStorage.getItem('mphId');
			var member_id = localStorage.getItem('memberId');

		    var data = {
				member_id: member_id,
				mph_id: mph_id,
		        type: 'level'
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
								$("html, body").animate({scrollTop: 1}, 1000);
						        if (results.data == "Success"){
									$scope.upgradeMemberTab_searchMemberInfo();
						            messageAlert('Your member was successfullt upgraded!', 'success');
						        } else {
						            messageAlert('Unable to upgrade your member!', 'danger');
						        }
                            });
		}

		//ADMIN TOOLS MENU - UPGRADE MEMBER MANUAL SHOW
        $scope.adminToolsTab_searchMember = function () {
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

		//ADMIN TOOLS MENU - UPGRADE MEMBER MANUAL SHOW
        $scope.adminToolsTab_updateProductMember = function () {
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

		//STATEMENT MENU
        $scope.statementTab_searchMemberPayment = function () {
			var currentTime = new Date();

			var data = {
				month: currentTime.getMonth() + 1,
				year: currentTime.getFullYear()
			}

			$http(
					{
						method: 'POST',
						url: '/api/memberpaymenthistories/searches/members/payments',
						data: data,
						headers: {
							"Content-Type": "application/json; charset=utf-8",
							"Accept": "application/json"
						}
					})
					.then(
							function (results) {
								if (results.data.memberPayment[0] != undefined) {
									$rootScope.statementTabResults = results.data.memberPayment;
									$rootScope.statementTabResultsTotal = results.data.statement;
								}

								return results;
							});
		}

		//STATEMENT MENU
        $scope.statementTab_selectMemberPayment = function () {
            var data = {
                month: document.getElementById("month").value,
				year: document.getElementById("year").value
            }

            $http(
                    {
                        method: 'POST',
                        url: '/api/memberpaymenthistories/searches/members/payments',
                        data: data,
                        headers: {
                            "Content-Type": "application/json; charset=utf-8",
                            "Accept": "application/json"
                        }
                    })
                    .then(
                            function (results) {
									$rootScope.statementTabResults = results.data.memberPayment;
									$rootScope.statementTabResultsTotal = results.data.statement;
                                return results;
                            });
        };

		//STATEMENT MENU
	    $('#month').on("change", function () {
	        $scope.statementTab_selectMemberPayment();
	    });

		$('#year').on("change", function () {
	        $scope.statementTab_selectMemberPayment();
	    });

		//POP UP MESSAGE
        $scope.messageAlert = function (data, type) {
            $("#message_" + type).show();
            $("#message_" + type).html(data);

            setTimeout(function () {
                $("#message_" + type).hide();
                // window.location = window.location;
            }, 5000);
        };

		//LOAD FUNCTIONS
		$scope.homeTab_searchMemberInfo();
		$scope.registerMemberTab_searchMyInfo();
		$scope.requestUpgradeTab_searchNextLeader();
		$scope.upgradeMemberTab_searchMemberInfo();
		$scope.statementTab_searchMemberPayment();
});
