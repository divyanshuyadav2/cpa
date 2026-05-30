<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=cpa', 'root', '');
$tables = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
foreach($tables as $t) {
    echo "\nTABLE: $t\n";
    $cols = $pdo->query("DESCRIBE $t")->fetchAll(PDO::FETCH_ASSOC);
    foreach($cols as $c) {
        echo "{$c['Field']} | {$c['Type']} | {$c['Null']} | {$c['Key']} | {$c['Default']} | {$c['Extra']}\n";
    }
}
