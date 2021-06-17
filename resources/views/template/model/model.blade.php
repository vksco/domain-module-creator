namespace {{ $namespace }}\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class {{ucfirst($parser->singular())}}.
 *
 * @time The Module created at {{date("Y-m-d h:i:sa")}}
 */
class {{ucfirst($parser->singular())}} extends Model
{
	@if($dataSystem->isSoftdeletes())

	use SoftDeletes;

	protected $dates = ['deleted_at'];
    @endif

    public $timestamps = {!! $dataSystem->isTimestamps() ? 'true' : 'false' !!};

    protected $table = '{{$parser->plural()}}';

    protected $casts = [];

}
