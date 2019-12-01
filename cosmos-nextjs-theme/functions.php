<?php

// Frontend origin
require_once 'inc/frontend-origin.php';

// Logging functions
require_once 'inc/log.php';

// CORS handling
require_once 'inc/cors.php';

// Admin modifications
require_once 'inc/admin.php';

// Add Menus
require_once 'inc/menus.php';

// Add Headless Settings area
require_once 'inc/acf-options.php';

// Add ACF Fields
require_once 'acf-builder/autoload.php';
require_once 'inc/acf-setting-fields.php';

// Add custom API endpoints
require_once 'inc/api-routes.php';


setcookie(TEST_COOKIE, 'WP Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN);
if ( SITECOOKIEPATH != COOKIEPATH ) setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);
