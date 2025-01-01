<!DOCTYPE html>
<?php
$cookie_name = "user";
 // 86400 = 1 day
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
    $cookie_value = substr(md5(mt_rand()), 0, 10);
    setcookie($cookie_name, $cookie_value, time() +60*60*24*30);
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html>