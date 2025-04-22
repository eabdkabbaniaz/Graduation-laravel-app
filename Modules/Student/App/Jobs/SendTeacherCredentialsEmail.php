<?php

namespace Modules\Student\App\Jobs;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\User;
class SendTeacherCredentialsEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $plainPassword;

    public function __construct(User $user, $plainPassword)
    {
        $this->user = $user;
        $this->plainPassword = $plainPassword;
    }

    public function handle()
    {
       $data =$this->user ;
        Mail::raw("your email information is: email:{{$this->user->email }}your password {{ $this->plainPassword}}", function ($message) use ($data) {
            $message->from('walaaalrehawi@gmail.com', 'walaa')
                ->to($data['email'])
                ->subject(' Verification Code ');    
        });
    }
}
