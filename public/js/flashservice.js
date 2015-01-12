/**
 * Created by Admin on 11/01/2015.
 */

app.factory("FlashService", function($rootScope) {
	return {
		show: function(message) {
			$rootScope.flash = message;
		},
		clear: function() {
			$rootScope.flash = "";
		}
	}
});
