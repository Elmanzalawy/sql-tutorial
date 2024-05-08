<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // DB::raw('
        //     CREATE TABLE employees (
        //         id INT PRIMARY KEY AUTO_INCREMENT,
        //         manager_id INT,
        //         department_id INT,
        //         name VARCHAR(255),
        //         created_at TIMESTAMP DEFAULT NOW(),
        //         FOREIGN KEY (manager_id) REFERENCES employees(id),
        //         FOREIGN KEY (deparment_id) REFERENCES departments(id)
        //     )
        // ');
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manager_id')->nullable()->references('id')->on('employees');
            $table->foreignId('department_id')->references('id')->on('departments');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
