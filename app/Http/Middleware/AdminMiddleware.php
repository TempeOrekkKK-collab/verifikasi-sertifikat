namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
   public function handle($request, Closure $next)
{
    dd('MIDDLEWARE KEPANGGIL');

    if (!session()->has('admin')) {
        return redirect('/login');
    }
    return $next($request);
}
}