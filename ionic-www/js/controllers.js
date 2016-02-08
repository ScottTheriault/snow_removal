angular.module('starter.controllers', [])

.controller('LoginCtrl', function($scope, $localstorage) {
	$scope.user = $localstorage.getObject('user');
})

.controller('RunCtrl', function($scope, Chats) {
	$scope.chats = Chats.all();
	$scope.remove = function(chat) {
		Chats.remove(chat);
	};
})