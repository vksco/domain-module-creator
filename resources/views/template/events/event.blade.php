namespace {{ $namespace }}\Events;

use {{ $namespace }}\Models\{{ucfirst($parser->singular())}};
use Illuminate\Queue\SerializesModels;

/**
 * Class {{ucfirst($parser->singular())}}{{ $event_type }}.
 */
class {{ucfirst($parser->singular())}}{{ $event_type }}
{
    use SerializesModels;

    /**
     * @var
     */
    public ${{$parser->singular()}};

    /**
     * @param ${{$parser->singular()}}
     */
    public function __construct({{ucfirst($parser->singular())}} ${{$parser->singular()}})
    {
        $this->{{$parser->singular()}} = ${{$parser->singular()}};
    }
}
