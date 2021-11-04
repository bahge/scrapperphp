<?php

use Clue\React\Buzz\Browser;
use Psr\Http\Message\ResponseInterface;
use React\Filesystem\FilesystemInterface;

final class ImagesDownloader
{
    private $client;
    private $filesystem;
    private $directory;

    public function __construct(Browser $client, FilesystemInterface $filesystem, string $directory)
    {
        $this->client = $client;
        $this->filesystem = $filesystem;
        $this->directory = $directory;
    }

    public function downloader(string ...$urls)
    {
        foreach ($urls as $url) {
            $this->client->get($url)->then(
                function (ResponseInterface $response) use ($url) {
                    echo "Arquivo encontrado: {$url} - ";
                    $this->processResponse((string) $url);
                }, function () use ($url) {
                    echo "Erro arquivo não encontrado: {$url}". PHP_EOL;
                });
        }
    }

    private function processResponse(string $urlImage)
    {
        $imageName = explode("/", $urlImage);
        $lenImage = count($imageName);

        $filePath = $this->directory . DIRECTORY_SEPARATOR . $imageName[$lenImage - 1];
        $this->client->get($urlImage)->then(
            function(ResponseInterface $response) use ($filePath, $imageName, $lenImage) {
                $this->filesystem->file($filePath)->putContents((string)$response->getBody());
            });
        echo "Download: {$imageName[$lenImage - 1]}" . PHP_EOL;
    }
}