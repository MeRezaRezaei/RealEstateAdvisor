<?php

namespace App\Http\Middleware;

use Closure;

class SearchMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->Property = $this->GetPropertyName($request->Property);

        return $next($request);
    }
    protected function GetPropertyName($Property){
        switch ($Property){
            case '1': {
                return 'Apartment';
            }
            case '2': {
                return 'Shop';
            }
            case '3': {
                return 'CommercialOffice';
            }
            case '4': {
                return 'Garden';
            }
            case '5': {
                return 'House';
            }
            case '6': {
                return 'VilaGarden';
            }
            case '7': {
                return 'Booth';
            }
            case '8': {
                return 'OldAge';
            }
            case '9': {
                return 'OfficeLocation';
            }
            case '10': {
                return 'Land';
            }
        }
        return 'NOT';
    }
}
