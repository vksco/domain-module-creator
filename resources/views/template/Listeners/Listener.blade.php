namespace {{ $namespace }}\Listeners;

@foreach (config('domain-module-creator.event_types') as $event)
use {{ $namespace }}\Events\{{ucfirst($parser->singular())}}{{ ucfirst($event) }};
@endforeach

/**
 * Class {{ucfirst($parser->singular())}}EventListener.
 */
class {{ucfirst($parser->singular())}}EventListener
{
    @foreach (config('domain-module-creator.event_types') as $event)
    /**
     * @param $event
     */
    public function on{{ ucfirst($event) }}($event)
    {
        //
    }

    @endforeach

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        @foreach (config('domain-module-creator.event_types') as $event)
        $events->listen(
            {{ucfirst($parser->singular())}}{{ ucfirst($event) }}::class,
            '{{ $namespace }}\Listeners\{{ucfirst($parser->singular())}}EventListener@on{{ ucfirst($event) }}'
        );
        @endforeach
    }
}
