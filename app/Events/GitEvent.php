<?php

namespace App\Events;
//use Illuminate\Support\Facades\Mail;
//use Illuminate\Contracts\Mail\Mailer;

class GitEvent extends Event
{
  /**
   * Create a new event instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  public function push()
  {
    $output = shell_exec(
      'cd /home/forge/delta425.atko.me ;git pull origin master;'
    );
    Mail::send($output, function($msg) { $msg->to([env('APP_EMAIL')]); $msg->from(['site@atko.me']); });
    dd($output);
  }
}
