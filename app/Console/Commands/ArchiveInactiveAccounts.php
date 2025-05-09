<?php

namespace App\Console\Commands;

use App\Models\JobLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ArchiveInactiveAccounts extends Command
{
    protected $signature = 'yogazen:archive-inactive-accounts';
    protected $description = 'Archive user accounts that have been inactive for 12 months';

    public function handle()
    {
        $this->info('Starting inactive account archiving job...');
        
        $cutoffDate = Carbon::now()->subMonths(12);
        
        $inactiveUsers = User::where('last_login_at', '<', $cutoffDate)
            ->whereHas('student', function($query) {
                $query->where('status', '!=', 'archived');
            })
            ->with('student')
            ->get();
            
        $this->info("Found {$inactiveUsers->count()} inactive accounts to archive");
        
        foreach ($inactiveUsers as $user) {
            $user->student->status = 'archived';
            $user->student->save();
            
            $this->info("Archived account for {$user->email} due to inactivity");
            
            JobLog::create([
                'action' => 'account_archived',
                'description' => "Account for {$user->email} archived due to inactivity since {$user->last_login_at}",
                'model_type' => User::class,
                'model_id' => $user->id
            ]);
        }
        
        $this->info('Account archiving job completed');
        
        return Command::SUCCESS;
    }
}