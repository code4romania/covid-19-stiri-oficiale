<?php

return [

    /**
     * The time to store a cached embed for (in seconds).
     */
    'expiry' => 60 * 60 * 24 * 30,

    /**
     * The cache store to use when storing embed data. This must be the name
     * of a valid store defined in config/cache.php
     */
    'store' => '',
];
