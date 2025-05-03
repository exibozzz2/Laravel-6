<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use function Pest\Laravel\get;

class CurrencyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:currency-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $currencies = ['eur', 'gbp', 'usd', 'chf',
                       'byn', 'czk', 'nok',
                       'bam', 'bgn', 'pln',
                       'dkk', 'rub', 'ron',
                       'sek', 'try', 'huf'];

        foreach ($currencies as $currency) {
            $response = Http::get("https://kurs.resenje.org/api/v1/currencies/$currency/rates/today");
            var_dump($response->json()['code'], $response->json()['exchange_middle']);

        }
    }



}
