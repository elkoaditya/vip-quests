<?php

namespace App\Console\Commands;

use App\Models\Servers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use spatie\ssh;
use Illuminate\Console\Command;


class ServerStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'serverstatus:refresh';

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
        $servers = Servers::with('credential')->get();
        foreach ($servers as $server) {
            $password = Crypt::decryptString($server->credential->password);
            $SSH = new \App\Helper\SSH($server->host, 22, $server->credential->username, $password);
            $SSH->Connect();
            $con = $SSH->Authorize();
            if ($con) {
                $result = 'online';
            } else {
                $result = 'offline';
            }
            if (\App\Models\ServerStatus::where('server_id', $server->id)->get()->count() == 0) {
                \App\Models\ServerStatus::create([
                    'server_id' => $server->id,
                    'status' => $result,
                ]);
            } else {
                \App\Models\ServerStatus::where('server_id', $server->id)->update([
                    'status' => $result,
                ]);
            }
            // Update in updated_at
            \App\Models\ServerStatus::where('server_id', $server->id)->update([
                'updated_at' => now(),
            ]);
        }
        $SSH->Disconnect();
    }
}
