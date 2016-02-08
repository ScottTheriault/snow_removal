function isBlank(input) {
	return typeof input === 'undefined' || input === null || input === '';
}
angular.module('starter.controllers', [])

.controller('LoginCtrl', function($scope, $state, $localstorage) {
	$scope.truck = $localstorage.getObject('truck');

	if (isBlank($scope.truck) || isBlank($scope.truck.number)) {
		$scope.truck = {};
	} else {
		$state.go('tab.run');
	}

	$scope.setTruck = function() {
		$localstorage.setObject('truck', $scope.truck);
		$state.go('tab.run');
	}
})

.controller('ChatsCtrl', function($scope, Chats) {
  $scope.chats = Chats.all();
  $scope.remove = function(chat) {
    Chats.remove(chat);
  };
})