<?php
   // Change Title Tag
    function ch_title($title) {

    $output = ob_get_contents();
    if ( ob_get_length() > 0) { ob_end_clean(); }
    
    $patterns = array("/<title>(.*?)<\/title>/");
    $replacements = array("<title>$title</title>");
    $output = preg_replace($patterns, $replacements,$output);

    echo $output;
}
?>