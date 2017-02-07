<?php

namespace App\Http\Middleware;

use Closure;

class Access
{

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
    if ((!$this->check_dev_ip($request) || !$this->check_headers($request)) && $this->debug_mode() && $this->check_route($request)) {
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
    $ips = explode(',', env('APP_DEBUG_IP'));
    return in_array($request->ip(), $ips);
  }

  /**
   * @return bool
   */
  public function check_headers($request)
  {
    return $request->server('HTTP_APPDEBUGKEY') == env('APP_DEBUG_KEY');
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
