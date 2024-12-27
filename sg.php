<pre>
<?php

print_r($GLOBALS);
print_r($_SERVER);
print_r($_REQUEST);
print_r($_POST);
print_r($_GET);
print_r($_FILES);
print_r($_ENV);
print_r($_COOKIE);
print("This is the test");
$config_json = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../env.json');
print_r(json_decode($config_json, true));
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/.. env.json')){
  print("Hello");
}
print(file_get_contents("/var/www/env.json"));
?>
</pre>
