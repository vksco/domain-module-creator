namespace {{ $namespace }}\Services;

use {{ $namespace }}\Models\{{ucfirst($parser->singular())}};
use App\Exceptions\GeneralException;
use App\Services\BaseService;

/**
 * Class {{ucfirst($parser->singular())}}Service.
 */
class {{ucfirst($parser->singular())}}Service extends BaseService
{
    /**
     * {{ucfirst($parser->singular())}}Service constructor.
     *
     * @param  {{ucfirst($parser->singular())}}  ${{$parser->singular()}}
     */
    public function __construct({{ucfirst($parser->singular())}} ${{$parser->singular()}})
    {
        $this->model = ${{$parser->singular()}};
    }

    /**
     * @param  array  $data
     *
     * @return mixed
     * @throws GeneralException
     */
    public function register{{ucfirst($parser->singular())}}(array $data = []): {{ucfirst($parser->singular())}}
    {
        DB::beginTransaction();

        try {
            ${{$parser->singular()}} = $this->create{{ucfirst($parser->singular())}}($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your account.'));
        }

        DB::commit();

        return ${{$parser->singular()}};
    }

    /**
     * @param  array  $data
     *
     * @return {{ucfirst($parser->singular())}}
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): {{ucfirst($parser->singular())}}
    {
        DB::beginTransaction();

        try {

            ${{$parser->singular()}} = $this->create{{ucfirst($parser->singular())}}($data);

        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this {{ucfirst($parser->singular())}}. Please try again.'));
        }

        event(new {{ucfirst($parser->singular())}}Created(${{$parser->singular()}}));

        DB::commit();

        return ${{$parser->singular()}};
    }

    /**
     * @param  {{ucfirst($parser->singular())}}  ${{$parser->singular()}}
     * @param  array  $data
     *
     * @return {{ucfirst($parser->singular())}}
     * @throws \Throwable
     */
    public function update({{ucfirst($parser->singular())}} ${{$parser->singular()}}, array $data = []): {{ucfirst($parser->singular())}}
    {
        DB::beginTransaction();

        try {

            ${{$parser->singular()}}->update($data);

        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this {{ucfirst($parser->singular())}}. Please try again.'));
        }

        event(new {{ucfirst($parser->singular())}}Updated(${{$parser->singular()}}));

        DB::commit();

        return ${{$parser->singular()}};
    }

    /**
     * @param  {{ucfirst($parser->singular())}}  ${{$parser->singular()}}
     *
     * @return {{ucfirst($parser->singular())}}
     * @throws GeneralException
     */
    public function delete({{ucfirst($parser->singular())}} ${{$parser->singular()}}): {{ucfirst($parser->singular())}}
    {
        if ($this->deleteById(${{$parser->singular()}}->id)) {
            event(new {{ucfirst($parser->singular())}}Deleted(${{$parser->singular()}}));

            return ${{$parser->singular()}};
        }

        throw new GeneralException('There was a problem deleting this {{ucfirst($parser->singular())}}. Please try again.');
    }

    @if ($dataSystem->isSoftdeletes())
    /**
     * @param {{ucfirst($parser->singular())}} ${{$parser->singular()}}
     *
     * @throws GeneralException
     * @return {{ucfirst($parser->singular())}}
     */
    public function restore({{ucfirst($parser->singular())}} ${{$parser->singular()}}): {{ucfirst($parser->singular())}}
    {
        if (${{$parser->singular()}}->restore()) {
            event(new {{ucfirst($parser->singular())}}Restored(${{$parser->singular()}}));

            return ${{$parser->singular()}};
        }

        throw new GeneralException(__('There was a problem restoring this {{ucfirst($parser->singular())}}. Please try again.'));
    }

    /**
     * @param  {{ucfirst($parser->singular())}}  ${{$parser->singular()}}
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy({{ucfirst($parser->singular())}} ${{$parser->singular()}}): bool
    {
        if (${{$parser->singular()}}->forceDelete()) {
            event(new {{ucfirst($parser->singular())}}Destroyed(${{$parser->singular()}}));

            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this {{ucfirst($parser->singular())}}. Please try again.'));
    }
    @endif

    /**
     * @param  array  $data
     *
     * @return {{ucfirst($parser->singular())}}
     */
    protected function create{{ucfirst($parser->singular())}}(array $data = []): {{ucfirst($parser->singular())}}
    {
        return $this->model::create($data);
    }
}
