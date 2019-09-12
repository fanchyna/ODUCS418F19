<?php
if (empty($var1)) {
    $errors .= "$var1 should not be empty";
}
if (!is_numeric($var2)) {
    $errors .= "$var2 should be a number";
} // check all anticipated error conditions ...
if (empty($errors)){
  // do interesting work
} else {
    internal_error_function($errors);
}

function internal_error_function ($errors) {
    // generate pretty HTML response
    // provide link to start over
}
?>
