<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id(); // cria a coluna id auto-increment
        $table->string('title'); // coluna título da tarefa
        $table->boolean('completed')->default(false); // tarefa concluída (sim/não)
        $table->timestamps(); // cria colunas created_at e updated_at
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
