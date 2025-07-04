<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51OtPBQBLvSVDTKojOA4sYBi0lRajS4n5JDhJsPinMqGrPpSGEjvjEXJdzccxqk5cjQ8grqGgAUUIB6AfxPchh6g500TLFxzRqc";

$secretKey="sk_test_51OtPBQBLvSVDTKoj10lsgnWzSPHxnFX9hsSRzNUpTL83TFuHQxSBOhVGAMyCf6ZcifrOnqtsPmMsrRM6jsa1Ydcd00srTpd8Kr";

\Stripe\Stripe::setApiKey($secretKey);
?>