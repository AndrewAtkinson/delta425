<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Access
{
  /**
   * The authentication guard factory instance.
   *
   * @var \Illuminate\Contracts\Auth\Factory
   */
  protected $auth;

  /**
   * Create a new middleware instance.
   *
   * @param  \Illuminate\Contracts\Auth\Factory $auth
   * @return void
   */
  public function __construct(Auth $auth)
  {
    $this->auth = $auth;
  }

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure                 $next
   * @param  string|null              $guard
   * @return mixed
   */
  public function handle($request, Closure $next, $guard = null)
  {
    if (!$this->check_dev_ip($request) && !$this->check_headers() && $this->debug_mode() && $this->check_route($request)) {
      return redirect('coming-soon');
    }
    return $next($request);
  }

  /**
   * @param $request
   * @return bool
   */
  public function check_dev_ip($request)
  {
    return $request->ip() == env('APP_DEBUG_IP') ? true : false;
  }

  /**
   * @return bool
   */
  public function check_headers()
  {
    return true;
  }

  /**
   * @return mixed
   */
  public function debug_mode()
  {
    return env('APP_DEBUG');
  }

  /**
   * @param $request
   * @return bool
   */
  public function check_route($request)
  {
    return $request->path() != 'coming-soon';
  }
}
