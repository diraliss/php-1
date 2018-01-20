<?php

function displayHello() {
    echo 'Hello, world';
}

function render($templateName, $params = []) {
    extract($params);
    include TEMPLATES_DIR . $templateName . '.phtml';
}
