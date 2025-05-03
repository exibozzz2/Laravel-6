<?php

namespace App\Console\Commands;

use App\Models\CurrencyValuesModel;
use Carbon\Carbon;
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

        $this->output->info("Updating currencies...");
        $this->getOutput()->progressStart(count($currencies));

        foreach ($currencies as $currency) {

            $currentDate = CurrencyValuesModel::where(['value' => $currency])
                ->whereDate('created_at', Carbon::now())
                ->first();

            if($currentDate != null) {
                continue;
            }

            $response = Http::get("https://kurs.resenje.org/api/v1/currencies/$currency/rates/today");
            $jsonResponse = $response->json();

            CurrencyValuesModel::create([
                'value' => $jsonResponse['code'],
                'cash_buy' => $jsonResponse['exchange_buy'],
                'exchange_middle' => $jsonResponse['exchange_middle'],
                'cash_sell' => $jsonResponse['exchange_sell'],
            ]);
            $this->getOutput()->progressAdvance(1);

        }
        $this->getOutput()->progressFinish();
        $this->output->info("Succeeded, all currency values are updated!");


    }



}
