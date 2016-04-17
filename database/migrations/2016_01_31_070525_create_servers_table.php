 <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'servers', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'name' );
			$table->string( 'ip' );
			$table->unsignedInteger( 'port' );
			$table->unsignedInteger( 'game_id' );
			$table->unsignedSmallInteger( 'status' );
			$table->timestamps();

			$table->unique('name');
			$table->unique(['ip', 'port']);
			$table->foreign('game_id')->references('id')->on('games')->onUpdate('cascade')->onDelete('cascade');
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'servers' );
	}
}
