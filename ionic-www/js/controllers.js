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

.controller('RunCtrl', function($scope, Chats, $timeout, $localstorage) {
	$scope.tracking=false;
	var trackingRunning = false;

	$scope.unSentPositions = $localstorage.getObject('unSentPositions');
	if (isBlank($scope.unSentPositions)) {
		$scope.unSentPositions = [];
	}

	$scope.startTracking = function() {
		$scope.tracking=true;
		if (!trackingRunning) {
			getPosition();
		}
	}
	$scope.stopTracking = function() {
		$scope.tracking=false;
	}

	function getPosition() {
		navigator.geolocation.getCurrentPosition(function(position) {
			alert(position.coords.latitude);
			alert(position.coords.longitude);
		});
		if ($scope.tracking) {
			$timeout(function() {
				getPosition()
			}, 300000);
		}
	}
})