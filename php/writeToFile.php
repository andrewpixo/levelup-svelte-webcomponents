<?php
function write($input)
{
    $file = fopen("test.txt", "w");
    fwrite($file, $input);
    fclose($file);
}

write($_GET["input"]);
