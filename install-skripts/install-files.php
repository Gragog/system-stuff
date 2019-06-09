<?php

if ($argc !== 2) {
    echo 'yes or test!' . PHP_EOL;
    exit(1);
}

$root = __DIR__ . '/../';
$user = get_current_user();
$home = '/home/' . $user . '/';

if ($argv[1] === 'test') {
    $mapping = [$root . 'test-file-pls-ignore'   => $home . 'test-file-pls-ignore'];
}

if ($argv[1] === 'yes') {
    $mapping = [
        $root . '.bash_aliases'   => $home . '.bash_aliases',
        $root . '.bashrc_general' => $home . '.bashrc_general',
        $root . '.bashrc_ubuntu'  => $home . '.bashrc_ubuntu',
        $root . '.ps1'            => $home . '.ps1',
        $root . '.zshrc'          => $home . '.zshrc',
    ];
}

if (!isset($mapping)) {
    echo 'yes or test!' . PHP_EOL;
    exit(1);
}

$backupPath = $home . '.system-stuff-backup-before-install/';

if (!is_dir($backupPath) && !mkdir($backupPath, 0755, true) && !is_dir($backupPath)) {
    throw new RuntimeException(sprintf('Directory "%s" was not created', $backupPath));
}

foreach ($mapping as $from => $to) {
    // Backup
    $fileBackupPath = $backupPath . basename($from);
    if (file_exists($to)) {
        if (!file_exists($fileBackupPath)) {
            echo 'Backing up ' . $to . '';
            copy($to, $fileBackupPath);
            echo "\tdone" . PHP_EOL;
        }
        unlink($to);
    }

    // Install
    echo 'Installing ' . $to . '';
    symlink($from, $to);
    echo "\tdone" . PHP_EOL;
}

echo PHP_EOL . 'You still have to make sure that your ".bashrc" sources ".bashrc_ubuntu"' . PHP_EOL;
echo PHP_EOL;
