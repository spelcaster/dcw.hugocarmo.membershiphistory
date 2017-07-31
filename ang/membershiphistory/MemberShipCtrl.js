(function(angular, $, _) {

  angular.module('membershiphistory').config(function($routeProvider) {
      $routeProvider.when('/dcw/membership-history', {
        controller: 'MembershipHistoryCtrl',
        templateUrl: '~/membershiphistory/MemberShipCtrl.html',

        // If you need to look up data when opening the page, list it out
        // under "resolve".
        resolve: {
          history: function(crmApi) {
            return crmApi('MembershipHistory', 'getlist');
          }
        }
      });
    }
  );

  // The controller uses *injection*. This default injects a few things:
  //   $scope -- This is the set of variables shared between JS and HTML.
  //   crmApi, crmStatus, crmUiHelp -- These are services provided by civicrm-core.
  //   history -- The current contact, defined above in config().
  angular.module('membershiphistory').controller('MembershipHistoryCtrl', function($scope, crmApi, crmStatus, crmUiHelp, history) {
    // The ts() and hs() functions help load strings for this module.
    var ts = $scope.ts = CRM.ts('membershiphistory');
    var hs = $scope.hs = crmUiHelp({file: 'CRM/membershiphistory/MemberShipCtrl'}); // See: templates/CRM/membershiphistory/MemberShipCtrl.hlp

    // We have history available in JS. We also want to reference it in HTML.
    $scope.history = history.values;
  });

})(angular, CRM.$, CRM._);
