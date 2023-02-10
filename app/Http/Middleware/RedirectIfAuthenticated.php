<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Aacotroneo\Saml2\Saml2Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class RedirectIfAuthenticated
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @param  string|null  ...$guards
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next, ...$guards)
  {
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
      if (Auth::guard($guard)->check()) {
        return redirect(RouteServiceProvider::HOME);
      }
    }

    // return $next($request);

    // if (Auth::guest()) {
    //   Log::info('SAML USER Error ' . Auth::guest());
    //   if ($request->ajax()) {
    //     return response('Unauthorized.', 401); // Or, return a response that causes client side js to redirect to '/routesPrefix/myIdp1/login'
    //   } else {
    //     $saml2Auth = new Saml2Auth(Saml2Auth::loadOneLoginAuthFromIpdConfig('mytestidp1'));
    //     Log::info('SAML USER Error ' . $saml2Auth);
    //     return $saml2Auth->login(URL::full());
    //   }
    // }

    return $next($request);
  }
}
