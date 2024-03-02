<?php
// Helper functions

function redirect($url) {
    header("Location: $url");
    exit();
}

function urlHasColon($url) {
    // Check if the URL contains a colon
    return strpos($url, ':') !== false;
}

function extractDynamicValues($realUrl, $patternUrl) {
    // Convert the URL pattern into a regular expression pattern
    $pattern = preg_replace('/:(\w+)/', '([^/]+)', $patternUrl);
    $pattern = str_replace('/', '\/', $pattern);
    $pattern = "/^" . $pattern . "$/";

    // Match the real URL against the regular expression pattern
    preg_match($pattern, $realUrl, $matches);

    // Extract the parameter values
    $values = [];
    foreach ($matches as $match) {
        if (!empty($match)) {
            $values[] = $match;
        }
    }

    return $values;
}

function matchUrlPattern($realUrl, $patternUrl) {
    // Convert the URL pattern into a regular expression pattern
    $pattern = preg_replace('/:(\w+)/', '([^/]+)', $patternUrl);
    $pattern = str_replace('/', '\/', $pattern);
    $pattern = "/^" . $pattern . "$/";

    // Match the real URL against the regular expression pattern
    return preg_match($pattern, $realUrl);
}

