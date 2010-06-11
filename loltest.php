<?php
require_once 'code.php';

$lol = '
HAI
BTW this is a comment
VISIBLE "Hello World!"
KTHXBAI
';

$code = new \Lol\Code($lol, false);
$code->exec();
