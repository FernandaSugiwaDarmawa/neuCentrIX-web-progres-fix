<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperUserMiddleware
{
  // app/Http/Middleware/SuperUserMiddleware.php

public function handle($request, Closure $next)
{
    if (auth()->user()->role !== 'super_user') {
        return redirect('/'); // Redirect ke halaman utama jika bukan super user
    }

    return $next($request);
}

}

