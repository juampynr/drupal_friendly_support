<?php
/**
 * @file
 * Contains \Drupal\friendly_support\Routing\FriendlySupportRouteSubscriber.
 */

namespace Drupal\friendly_support\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class FriendlySupportRouteSubscriber extends RouteSubscriberBase {

  /**
   * Alters existing routes for a specific collection.
   *
   * @param \Symfony\Component\Routing\RouteCollection $collection
   *   The route collection for adding routes.
   * @param string $provider
   *   The provider these routes belong to. For dynamically added routes, the
   *   provider name will be 'dynamic_routes'.
   */
  public function alterRoutes(RouteCollection $collection, $provider) {
    // Find the route we want to alter
    if ($provider == 'contact') {
      // Load the route, set authentication and add it again.
      $route = $collection->get('contact.site_page');
      $route->setOption('_auth', array('basic_auth'));
      $route->setRequirement('_user_is_logged_in', 'TRUE');
      $collection->add('contact.site_page', $route);
    }
  }

}
