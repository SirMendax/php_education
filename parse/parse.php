<?php
$f = file_get_contents("index.html");
preg_match_all( '/\/css\/([a-z-]*).([a-zA-Z0-9-]*).([a-zA-Z0-9-]*).css/', $f, $css);
preg_match_all( '/\/js\/([a-z-]*).([a-zA-Z0-9-]*).([a-zA-Z0-9-]*).js/', $f, $js);
$css = array_unique($css[0]);
$js = array_unique($js[0]);
print_r(array_merge($css, $js));

