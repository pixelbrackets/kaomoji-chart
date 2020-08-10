<?php

require __DIR__ . '/../vendor/autoload.php';

$kaomojiChart = new \Pixelbrackets\KaomojiChart\KaomojiChart();

echo PHP_EOL . '*List*' . PHP_EOL;
$kaomojis = $kaomojiChart->getKaomojis();
foreach ($kaomojis as $kaomoji) {
    echo 'Kamoji: ' . $kaomoji['character'] . ' Category: ' . $kaomoji['category'] . ' Name: ' . $kaomoji['name'] . PHP_EOL;
}

echo PHP_EOL . '*List grouped by category*' . PHP_EOL;
$kaomojiGroups = $kaomojiChart->getKaomojisGroupedByCategory();
$categories = $kaomojiChart->getCategories();
foreach ($kaomojiGroups as $kaomojiIndex => $kaomojiGroup) {
    echo 'Category ' . $kaomojiIndex . ': ' . $categories[$kaomojiIndex]['name'] . PHP_EOL;
    foreach ($kaomojiGroup as $kaomoji) {
        echo '  Kamoji: ' . $kaomoji['character'] . ' Category: ' . $kaomoji['category'] . ' Name: ' . $kaomoji['name'] . PHP_EOL;
    }
}

echo PHP_EOL . '*Single kaomoji, as JSON data*' . PHP_EOL;
$kaomoji = \Pixelbrackets\KaomojiChart\KaomojiChart::getKaomoji('banzai');
echo json_encode($kaomoji, JSON_PRETTY_PRINT);
