<?php

function my_basic_auth_for_custom_post()
{
  if (is_singular('member') || is_post_type_archive('member')) {

    $user = 'yamato';
    $pass = 'ayase';

    if (
      !isset($_SERVER['PHP_AUTH_USER']) ||
      $_SERVER['PHP_AUTH_USER'] !== $user ||
      $_SERVER['PHP_AUTH_PW'] !== $pass
    ) {
      header('WWW-Authenticate: Basic realm="Restricted Area"');
      header('HTTP/1.0 401 Unauthorized');
      echo '認証が必要です';
      exit;
    }
  }
}
add_action('template_redirect', 'my_basic_auth_for_custom_post');
