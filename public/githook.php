<?php
// Use in the "Post-Receive URLs" section of your GitHub repo.

// && find . -type f -exec chmod 0644 {} && find . -type d -exec chmod 0755 {}

// switch task and run ssh

if(isset($_GET['task'])){
    switch ($_GET['task']){
        case 'composer-update':
            $out = shell_exec('cd ..;composer update --no-scripts;');
            break;
        case 'migrate':
            $out = shell_exec('cd ..; php artisan migrate;');
            break;
        case 'seed':
            $out = shell_exec('cd ..; php artisan db:seed;');
            break;
        case 'dumpautoload':
            $out = shell_exec('cd ..;composer dump-autoload;');
            break;
        default:
            $out = shell_exec( 'cd ..;git reset --hard;git pull 2>&1' );
            break;
    }
    echo '<pre>'.$out.'</pre>';
}else{
    // when don't have a task. only Hook.
    $out = shell_exec( 'cd ..;git reset --hard;git pull 2>&1' );
    echo '<pre>'.$out.'</pre>';
}
?>
