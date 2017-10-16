<!doctype html>
<html>
<head>
    <title>Demo</title>
</head>
<body>
    <ol>
        <?php
            require_once '../2FA/autoload.php';
            $tfa = new RobThree\Auth\TwoFactorAuth('Chorale', 8, 45, 'sha512', null, null, null);
        ?>
	</ol>
	<p>Note: Make sure your server-time is <a href="http://en.wikipedia.org/wiki/Network_Time_Protocol">NTP-synced</a>! Depending on the $discrepancy allowed your time cannot drift too much from the users' time!</p>
	<?php
        try {
            $tfa->ensureCorrectTime();
            echo 'Your hosts time seems to be correct / within margin';
        } catch (TwoFactorAuthException $ex) {
            echo '<b>Warning:</b> Your hosts time seems to be off: '.$ex->getMessage();
        }
    ?>
</body>
</html>