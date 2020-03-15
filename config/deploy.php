<?php

$hosts = [];

if (env('DEPLOY_PRODUCTION_HOSTNAME')) {
    $hosts[env('DEPLOY_PRODUCTION_HOSTNAME')] = [
        'stage'            => 'production',
        'hostname'         => env('DEPLOY_PRODUCTION_HOSTNAME'),
        'deploy_path'      => env('DEPLOY_PRODUCTION_PATH', '/var/www/production'),
        'writable_mode'    => env('DEPLOY_PRODUCTION_WRITABLE_MODE', 'chmod'),
        'http_user'        => env('DEPLOY_PRODUCTION_HTTP_USER', 'www-data'),
        'user'             => env('DEPLOY_PRODUCTION_USER', 'ubuntu'),
        'ssh_multiplexing' => env('DEPLOY_PRODUCTION_SSH_MULTIPLEXING', true),
        'port'             => env('DEPLOY_PRODUCTION_SSH_PORT', 22),
    ];
}

if (env('DEPLOY_STAGING_HOSTNAME')) {
    $hosts[env('DEPLOY_STAGING_HOSTNAME')] = [
        'stage'            => 'staging',
        'hostname'         => env('DEPLOY_STAGING_HOSTNAME'),
        'deploy_path'      => env('DEPLOY_STAGING_PATH', '/var/www/staging'),
        'writable_mode'    => env('DEPLOY_STAGING_WRITABLE_MODE', 'chmod'),
        'http_user'        => env('DEPLOY_STAGING_HTTP_USER', 'www-data'),
        'user'             => env('DEPLOY_STAGING_USER', 'ubuntu'),
        'ssh_multiplexing' => env('DEPLOY_STAGING_SSH_MULTIPLEXING', true),
        'port'             => env('DEPLOY_STAGING_SSH_PORT', 22),
    ];
}


return [

    /*
    |--------------------------------------------------------------------------
    | Default deployment strategy
    |--------------------------------------------------------------------------
    |
    | This option defines which deployment strategy to use by default on all
    | of your hosts. Laravel Deployer provides some strategies out-of-box
    | for you to choose from explained in detail in the documentation.
    |
    | Supported: 'basic', 'firstdeploy', 'local', 'pull'.
    |
    */

    'default' => 'mixed',

    /*
    |--------------------------------------------------------------------------
    | Custom deployment strategies
    |--------------------------------------------------------------------------
    |
    | Here, you can easily set up new custom strategies as a list of tasks.
    | Any key of this array are supported in the `default` option above.
    | Any key matching Laravel Deployer's strategies overrides them.
    |
    */

    'strategies' => [
        'mixed' => [
            'hook:start',
            'deploy:prepare',
            'deploy:lock',
            'deploy:release',
            'deploy:update_code',
            'deploy:shared',
            'deploy:vendors',
            'hook:build',
            'deploy:writable',
            'hook:ready',
            'deploy:symlink',
            'deploy:unlock',
            'cleanup',
            'hook:done',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Hooks
    |--------------------------------------------------------------------------
    |
    | Hooks let you customize your deployments conveniently by pushing tasks
    | into strategic places of your deployment flow. Each of the official
    | strategies invoke hooks in different ways to implement their logic.
    |
    */

    'hooks' => [
        // Right before we start deploying.
        'start' => [
            //
        ],

        // Code and composer vendors are ready but nothing is built.
        'build' => [
            'assets:build',
            'assets:upload',
        ],

        // Deployment is done but not live yet (before symlink)
        'ready' => [
            'artisan:storage:link',
            'artisan:view:clear',
            'artisan:cache:clear',
            'artisan:config:cache',
            'artisan:migrate',
        ],

        // Deployment is done and live
        'done' => [
            'fpm:reload',
        ],

        // Deployment succeeded.
        'success' => [
            //
        ],

        // Deployment failed.
        'fail' => [
            //
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Deployment options
    |--------------------------------------------------------------------------
    |
    | Options follow a simple key/value structure and are used within tasks
    | to make them more configurable and reusable. You can use options to
    | configure existing tasks or to use within your own custom tasks.
    |
    */

    'options' => [
        'application'         => env('APP_NAME', 'Laravel'),
        'repository'          => env('DEPLOY_REPOSITORY'),
        'php_fpm_service'     => 'php7.4-fpm',
        'writable_use_sudo'   => true,
        'writable_chmod_mode' => '0775',
    ],

    /*
    |--------------------------------------------------------------------------
    | Hosts
    |--------------------------------------------------------------------------
    |
    | Here, you can define any domain or subdomain you want to deploy to.
    | You can provide them with roles and stages to filter them during
    | deployment. Read more about how to configure them in the docs.
    |
    */

    'hosts' => $hosts,

    /*
    |--------------------------------------------------------------------------
    | Localhost
    |--------------------------------------------------------------------------
    |
    | This localhost option give you the ability to deploy directly on your
    | local machine, without needing any SSH connection. You can use the
    | same configurations used by hosts to configure your localhost.
    |
    */

    'localhost' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Include additional Deployer recipes
    |--------------------------------------------------------------------------
    |
    | Here, you can add any third party recipes to provide additional tasks,
    | options and strategies. Therefore, it also allows you to create and
    | include your own recipes to define more complex deployment flows.
    |
    */

    'include' => [
        'recipes/assets.php',
    ],

    /*
    |--------------------------------------------------------------------------
    | Use a custom Deployer file
    |--------------------------------------------------------------------------
    |
    | If you know what you are doing and want to take complete control over
    | Deployer's file, you can provide its path here. Note that, without
    | this configuration file, the root's deployer file will be used.
    |
    */

    'custom_deployer_file' => false,

];
