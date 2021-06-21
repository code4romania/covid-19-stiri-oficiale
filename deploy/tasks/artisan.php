<?php

declare(strict_types=1);

namespace Deployer;

desc('Seed the database with records');
task('artisan:db:seed', artisan('db:seed --force', ['showOutput']))->once();

desc('Run the database migrations');
task('artisan:migrate', artisan('migrate --force', ['skipIfNoEnv']))->once();

desc('Drop all tables and re-run all migrations');
task('artisan:migrate:fresh', artisan('migrate:fresh --force'))->once();

desc('Rollback the last database migration');
task('artisan:migrate:rollback', artisan('migrate:rollback --force', ['showOutput']))->once();

desc('Show the status of each migration');
task('artisan:migrate:status', artisan('migrate:status', ['showOutput']));

desc('Execute artisan horizon:publish');
task('artisan:horizon:publish', artisan('horizon:publish'));

desc('Execute artisan telescope:publish');
task('artisan:telescope:publish', artisan('telescope:publish'));

desc('Execute artisan nova:publish');
task('artisan:nova:publish', artisan('nova:publish'));

desc('Discover icon sets and generate a manifest file');
task('artisan:icons:cache', artisan('icons:cache'));

desc('Remove the blade icons manifest file');
task('artisan:icons:clear', artisan('icons:clear'));
