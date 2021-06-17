use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create{{Str::studly(ucfirst($parser->plural()))}}Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('{{$parser->plural()}}',function (Blueprint $table){

        $table->uuid('uuid')->primary();

        // type your addition here

        @if($dataSystem->isTimestamps())

        $table->timestamps();
        @endif

        @if($dataSystem->isSoftdeletes())

        $table->softDeletes();
        @endif


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('{{$parser->plural()}}');
    }
}
