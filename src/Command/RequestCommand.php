<?php
declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\NativeHttpClient;

#[AsCommand("app:request")]
class RequestCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $client = new CurlHttpClient();
        $response = $client->request('POST', 'http://localhost:8000/', [
            'headers' => [
                'Content-Type: application/x-www-form-urlencoded',
            ],
            'body' => [
                'foo' => 'bar',
            ],
        ]);

        $output->writeln("Status code: " . $response->getStatusCode()); // 200 with HttpClient 5.4.3, 400 with HttpClient 5.4.5

        return 0;
    }
}
