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
   */
  public function alterRoutes(RouteCollection $collection) {
    // Load the route, set authentication and add it again.
    $route = $collection->get('contact.site_page');
    $route->setOption('_auth', array('basic_auth'));
    $route->setRequirement('_user_is_logged_in', 'TRUE');
    $collection->add('contact.site_page', $route);

  }

}
