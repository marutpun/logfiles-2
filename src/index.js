import angular from 'angular';

const app = angular.module('root', []);

// Fetch Controller
app.controller('FetchController', function ($scope, $http) {
	let totalItem;
	// GET request
	$http({
		method: `GET`,
		url: `http://localhost/logfiles/api.php`,
	}).then(
		function success(res) {
			$scope.logFilesData = res.data;
			totalItem = res.data.length;
		},
		function error(err) {
			console.log(err);
		}
	);

	// default total row
	$scope.totalDisplayed = 10;

	// download 50
	$scope.reload50 = function () {
		$scope.totalDisplayed += 50;
	};

	// download all
	$scope.reloadAll = function () {
		$scope.totalDisplayed = totalItem;
	};
});

// Print Controller
app.controller('ToolController', function ($scope) {
	$scope.printPage = function () {
		window.print();
	};
});
