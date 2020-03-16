<?php

namespace Deployer;

desc('Build frontend assets locally');
task('assets:build', function () {
    if (!test('[ -d public/assets ]')) {
        run('{{bin/npm}} install --no-save');
        run('{{bin/npm}} run production');
    }
})->local();

desc('Upload your locally-built assets to your hosts');
task('assets:upload', function () {
    upload('public/assets/', '{{release_path}}/public/assets/');
});
