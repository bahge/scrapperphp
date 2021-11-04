<?php

use Clue\React\Buzz\Browser;
use React\EventLoop\Factory;
use React\Filesystem\Filesystem;

require_once('vendor/autoload.php');
require_once('ImagesDownloader.php');

$dtaini = new DateTimeImmutable();
echo "Iniciando os download's" . PHP_EOL;
$loop = Factory::create();

$scraper = new ImagesDownloader(
    new Browser($loop), Filesystem::create($loop), __DIR__ . '/images'
);

$scraper->downloader(
    'https://cdn.pixabay.com/photo/2021/10/28/20/20/hut-6750482_960_720.jpg',
    'https://cdn.pixabay.com/photo/2021/10/13/11/31/couple-6706278_960_720.jpg',
    'https://cdn.pixabay.com/photo/2021/10/26/02/41/woman-6742445_960_720.jpg',
    'https://cdn.pixabay.com/photo/2021/10/25/17/16/nature-6741602_960_720.jpg',
    'https://cdn.pixabay.com/photo/2020/08/25/11/32/monstera-5516509_960_720.png',
    'https://cdn.pixabay.com/photo/2021/10/06/17/13/mountains-6686286_960_720.jpg',
    'https://cdn.pixabay.com/photo/2021/10/19/20/20/pine-trees-6724511_960_720.jpg',
    'https://cdn.pixabay.com/photo/2021/10/19/12/30/elephant-6723452_960_720.jpg',
    'https://cdn.pixabay.com/photo/2017/08/01/00/44/laptop-2562361_960_720.jpg',
    'https://cdn.pixabay.com/photo/2021/09/20/16/40/waterfall-6641294_960_720.jpg',
    'https://cdn.pixabay.com/photo/2021/09/22/00/28/kitten-6645241_960_720.jpg',
    'https://cdn.pixabay.com/photo/2019/10/20/20/02/nature-4564618_960_720.jpg',
    'https://cdn.pixabay.com/photo/2021/10/28/10/50/seagull-6749365_960_720.jpg',
    'https://cdn.pixabay.com/photo/2021/10/30/06/39/rua.jpg',
);

$loop->run();

echo "Fim dos download's" . PHP_EOL;
$dtaend = new DateTimeImmutable();
echo PHP_EOL . "\e[0;37;1mTempo decorrido: \e[0m" . date_diff($dtaini, $dtaend)->format('%h hora(s) %i Minuto(s) %s segundo(s)') . PHP_EOL;