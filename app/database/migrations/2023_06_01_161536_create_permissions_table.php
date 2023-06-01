<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title')->unique();
        });

        Schema::create('role_permission', function (Blueprint $table) {
            $table->foreignIdFor(Role::class)->constrained()->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreignIdFor(Permission::class)->constrained()->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('role_permission');
    }
};
