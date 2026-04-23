protected $routeMiddleware = [
    // ...
    'auth.custom' => \App\Http\Middleware\AuthCustom::class,
];