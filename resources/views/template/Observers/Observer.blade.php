namespace {{ $namespace }}\Observers;

use {{ $namespace }}\Models\{{ucfirst($parser->singular())}};

/**
 * Class {{ucfirst($parser->singular())}}Observer.
 */
class {{ucfirst($parser->singular())}}Observer
{
    /**
     * @param  {{ucfirst($parser->singular())}}  ${{$parser->singular()}}
     */
    public function created({{ucfirst($parser->singular())}} ${{$parser->singular()}}): void
    {
        //
    }

    /**
     * @param {{ucfirst($parser->singular())}} ${{$parser->singular()}}
     */
    public function updated({{ucfirst($parser->singular())}} ${{$parser->singular()}}): void
    {
        //
    }

    /**
     * @param {{ucfirst($parser->singular())}} ${{$parser->singular()}}
     */
    public function deleted({{ucfirst($parser->singular())}} ${{$parser->singular()}}): void
    {
        //
    }


}
