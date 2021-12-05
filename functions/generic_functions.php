<?php
function fill_template($subject, $pattern, $replacement){
    return preg_replace(
        array(
            "/{{" . $pattern . "}}/",
            '/{{.+}}/'
        ),
        array($replacement),
        $subject);
}