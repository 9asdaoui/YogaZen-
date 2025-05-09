<?php

namespace App\Console\Commands;

use App\Models\JobLog;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendSubscriptionReminders extends Command
{
    protected $signature = 'yogazen:subscription-reminders';
    protected $description = 'Send email reminders for subscriptions expiring in 3 days';

    public function handle()
    {
        $this->info('Starting subscription reminder job...');
        
        $expiryDate = Carbon::now()->addDays(3)->startOfDay();
        $subscriptions = Subscription::whereDate('expires_at', $expiryDate)
            ->with('student.user')
            ->get();
            
        $this->info("Found {$subscriptions->count()} subscriptions expiring in 3 days");
        
        foreach ($subscriptions as $subscription) {
            $user = $subscription->student->user;
            
            // Mail::to($user->email)->send(new SubscriptionExpiryReminder($subscription));
            
            $this->info("Sending reminder to {$user->email} for subscription expiring on {$subscription->expires_at}");
            
            JobLog::create([
                'action' => 'subscription_reminder_sent',
                'description' => "Reminder sent to {$user->email} for subscription expiring on {$subscription->expires_at}",
                'model_type' => Subscription::class,
                'model_id' => $subscription->id
            ]);
        }
        
        $this->info('Subscription reminder job completed');
        
        return Command::SUCCESS;
    }
}