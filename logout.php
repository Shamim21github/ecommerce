<?php
require_once("configs/app_config.php");


unset($_SESSION["s_id"]);
unset($_SESSION["s_name"]);
unset($_SESSION["s_first_name"]);
unset($_SESSION["s_last_name"]);

unset($_SESSION["s_mobile"]);
unset($_SESSION["s_street_address"]);
unset($_SESSION["s_apartment"]);

unset($_SESSION["s_email"]);
unset($_SESSION["s_city"]);
unset($_SESSION["s_postcode"]);
unset($_SESSION["s_country_id"]);

session_destroy();

header("location:$base_url");

?>