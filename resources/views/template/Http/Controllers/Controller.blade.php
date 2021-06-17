namespace {{ $namespace }}\Http\Controllers;

use {{ $namespace }}\Http\Requests\DeleteUserRequest;
use {{ $namespace }}\Http\Requests\EditUserRequest;
use {{ $namespace }}\Http\Requests\StoreUserRequest;
use {{ $namespace }}\Http\Requests\UpdateUserRequest;
use {{ $namespace }}\Models\{{ucfirst($parser->singular())}};
use {{ $namespace }}\Services\{{ucfirst($parser->singular())}}Service;

/**
 * Class {{ucfirst($parser->singular())}}Controller.
 */
class {{ucfirst($parser->singular())}}Controller
{
    /**
     * @var {{ucfirst($parser->singular())}}Service
     */
    protected ${{$parser->singular()}}Service;

    /**
     * {{ucfirst($parser->singular())}}Controller constructor.
     *
     * @param  {{ucfirst($parser->singular())}}Service  ${{$parser->singular()}}Service
     */
    public function __construct({{ucfirst($parser->singular())}}Service ${{$parser->singular()}}Service)
    {
        $this->{{$parser->singular()}}Service = ${{$parser->singular()}}Service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('{{$parser->singular()}}.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('{{$parser->singular()}}.create');
    }

    /**
     * @param  Store{{ucfirst($parser->singular())}}Request  $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(Store{{ucfirst($parser->singular())}}Request $request)
    {
        ${{$parser->singular()}} = $this->{{$parser->singular()}}Service->store($request->validated());

        return response('Hello World', 200)->header('Content-Type', 'application/json');
        return redirect()->route('{{$parser->singular()}}.show', ${{$parser->singular()}})->withFlashSuccess(__('The {{$parser->singular()}} was successfully created.'));
    }

    /**
     * @param  {{ucfirst($parser->singular())}}  ${{$parser->singular()}}
     *
     * @return mixed
     */
    public function show({{ucfirst($parser->singular())}} ${{$parser->singular()}})
    {
        return view('{{$parser->singular()}}.show')
            ->with{{ucfirst($parser->singular())}}(${{$parser->singular()}});
    }

    /**
     * @param  Edit{{ucfirst($parser->singular())}}Request  $request
     * @param  {{ucfirst($parser->singular())}}  ${{$parser->singular()}}
     *
     * @return mixed
     */
    public function edit(Edit{{ucfirst($parser->singular())}}Request $request, {{ucfirst($parser->singular())}} ${{$parser->singular()}})
    {
        return view('{{$parser->singular()}}.edit');
    }

    /**
     * @param  Update{{ucfirst($parser->singular())}}Request  $request
     * @param  {{ucfirst($parser->singular())}}  ${{$parser->singular()}}
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(Update{{ucfirst($parser->singular())}}Request $request, {{ucfirst($parser->singular())}} ${{$parser->singular()}})
    {
        $this->{{$parser->singular()}}Service->update(${{$parser->singular()}}, $request->validated());

        return redirect()->route('{{$parser->singular()}}.show', ${{$parser->singular()}})->withFlashSuccess(__('The {{$parser->singular()}} was successfully updated.'));
    }

    /**
     * @param  Delete{{ucfirst($parser->singular())}}Request  $request
     * @param  {{ucfirst($parser->singular())}}  ${{$parser->singular()}}
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Delete{{ucfirst($parser->singular())}}Request $request, {{ucfirst($parser->singular())}} ${{$parser->singular()}})
    {
        $this->{{ucfirst($parser->singular())}}Service->delete(${{$parser->singular()}});

        return redirect()->route('{{$parser->singular()}}.deleted')->withFlashSuccess(__('The {{$parser->singular()}} was successfully deleted.'));
    }
}
