<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("articles", function (Blueprint $table) {
            $table->string("author")->nullable()->after("content");
            $table->integer("read_time")->nullable()->after("author");
            $table->timestamp("published_at")->nullable()->after("read_time");
            $table
                ->boolean("is_published")
                ->default(false)
                ->after("published_at");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("articles", function (Blueprint $table) {
            $table->dropColumn([
                "author",
                "read_time",
                "published_at",
                "is_published",
            ]);
        });
    }
};
