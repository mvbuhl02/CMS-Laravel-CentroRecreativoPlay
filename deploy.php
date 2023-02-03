<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'nano deploy.hp');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts


// Hooks

after('deploy:failed', 'deploy:unlock');
