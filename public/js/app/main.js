'use strict';

var eUBS = angular.module('eUBS', []);

eUBS.config(function ($interpolateProvider) {

	$interpolateProvider.startSymbol("[[");
	$interpolateProvider.endSymbol("]]");
});