<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use DB;
use App\Models\Link;

class DeleteRecordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // DB::table('links')->last()->delete();
        // Link::query()->first()->delete();

        $user = "Medha";
        $pass = "p4p9_9uh";
        $phone = "01893646736";
        $msg = urlencode("সরি! আমার জান। আমার কলিজা, সোনা, ময়না।  ");

        $url = "http://mshastra.com/sendurlcomma.aspx?user=".$user."&pwd=".$pass."&senderid=8809617611147&mobileno=".$phone."&msgtext=".$msg."&priority=High&CountryCode=880";

        $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $curl_scraped_page = curl_exec($ch);
            curl_close($ch);
            echo $curl_scraped_page;
    }
}
