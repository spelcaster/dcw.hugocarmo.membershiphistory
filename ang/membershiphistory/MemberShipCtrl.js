(function(angular, $, _) {

  angular.module('membershiphistory').config(function($routeProvider) {
      $routeProvider.when('/dcw/membership-history', {
        controller: 'MembershipHistoryCtrl',
        templateUrl: '~/membershiphistory/MemberShipCtrl.html',

        resolve: {
          history: function(crmApi) {
            return crmApi('MembershipHistory', 'getlist', {});
          }
        }
      });
    }
  );

  // The controller uses *injection*. This default injects a few things:
  //   $scope -- This is the set of variables shared between JS and HTML.
  //   crmApi, crmStatus, crmUiHelp -- These are services provided by civicrm-core.
  //   history -- The current extension entries
  angular.module('membershiphistory').controller('MembershipHistoryCtrl', function($scope, crmApi, crmStatus, crmUiHelp, history) {
    // The ts() and hs() functions help load strings for this module.
    var ts = $scope.ts = CRM.ts('membershiphistory');

    $scope.history = history.values;

    $scope.getStatus = getStatus;

    function getStatus (endDate) {
      if (!endDate) {
        return {
          text: 'Lifetime Membership',
          class: 'membership-history-lifetime'
        };
      }

      endDate = new Date(endDate);
      var now = new Date();

      if ((endDate - now) > 0) {
        return {
          text: 'Valid Membership',
          class: 'membership-history-valid'
        }
      }

      return {
        text: 'Expired Membership',
        class: 'membership-history-expired'
      };
      }
  });

})(angular, CRM.$, CRM._);
