<?php

if ($argc !== 2) {
    echo 'yes or test!' . PHP_EOL;
    exit(1);
}

$root = __DIR__ . '/../';
$user = get_current_user();
$home = '/home/' . $user . '/';
$ssRoot = $home . 'system-stuff/';

if (!is_dir($ssRoot) && !mkdir($ssRoot) && !is_dir($ssRoot)) {
    throw new \RuntimeException(sprintf('Directory "%s" was not created', $ssRoot));
}

if ($argv[1] === 'test') {
    $mapping = [$root . 'test-file-pls-ignore'   => $ssRoot . 'test-file-pls-ignore'];
}

if ($argv[1] === 'yes') {
    $mapping = [
        $root . '.bash_aliases'     => $ssRoot . '.bash_aliases',
        $root . '.bashrc_general'   => $ssRoot . '.bashrc_general',
        $root . '.bashrc_ubuntu'    => $ssRoot . '.bashrc_ubuntu',
        $root . '.ps1'              => $ssRoot . '.ps1',
        $root . '.zshrc'            => $ssRoot . '.zshrc',
        $root . 'dash-to-panel.ini' => $ssRoot . 'dash-to-panel.ini',
    ];
}

if (!isset($mapping)) {
    echo 'yes or test!' . PHP_EOL;
    exit(1);
}

foreach ($mapping as $from => $to) {
    // Install
    echo 'Installing ' . $to . '';
    symlink($from, $to);
    echo "\tdone" . PHP_EOL;
}

echo PHP_EOL . 'You still have to make sure that your ".bashrc" sources "~/system-stuff/.bashrc_general"' . PHP_EOL;
echo PHP_EOL;
