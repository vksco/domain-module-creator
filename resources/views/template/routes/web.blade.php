use {{ $namespace }}\Http\Controllers\{{ucfirst($parser->singular())}}Controller;

// All route names are prefixed with '{{$parser->singular()}}.'
Route::get('/', [{{ucfirst($parser->singular())}}Controller::class, 'index'])
    ->name('index');
