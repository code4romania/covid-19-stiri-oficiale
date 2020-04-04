<?php

return [

    /**
     * The time to store a cached embed for (in minutes).
     *
     * 43200 = 30 days.
     */
    'expiry' => 43200,

    /**
     * The cache store to use when storing embed data. This must be the name
     * of a valid store defined in config/cache.php
     */
    'store' => '',
];
