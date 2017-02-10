<?php

namespace App\Listeners;

use App\Events\GitEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GitListener implements ShouldQueue
{
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the Pull Git event.
   *
   * @param  GitEvent  $event
   * @return void
   */
  public function handle($event)
  {

  }
}
