<?php

namespace App\Jobs;

use App\Models\Tenant;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class SeedTenantJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    protected $tenant;
    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->tenant->run(function() {
            DB::table('users')->insert([
                'name' => $this->tenant->name,
                'email' => $this->tenant->email,
                'password' => $this->tenant->password
            ]);
        });
    }
}
