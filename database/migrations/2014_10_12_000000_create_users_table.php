<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barangay_id')->references('id')->on('barangays')->onUpdate('cascade')->onDelete('cascade');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('sufix')->nullable();
            $table->string('gender');
            $table->string('religion');
            $table->string('ethnic_group');
            $table->string('email')->unique();
            $table->dateTime('birthdate');
            $table->string('civil_status');
            $table->string('street');
            $table->string('municipality');
            $table->string('province');
            $table->string('region');
            $table->string('contact');
            $table->string('landline')->nullable();
            $table->string('educ_attain');
            $table->string('emp_stat')->nullable();
            $table->string('emp_stat_cat')->nullable();
            $table->string('emp_stat_type')->nullable();
            $table->string('occupation')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('org_affi')->nullable();
            $table->string('cont_person')->nullable();
            $table->string('office_address')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('id_ref')->nullable();
            $table->string('sss_no')->nullable();
            $table->string('gis_no')->nullable();
            $table->string('pagibig')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('f_lname')->nullable();
            $table->string('f_fname')->nullable();
            $table->string('f_mname')->nullable();
            $table->string('m_lname')->nullable();
            $table->string('m_fname')->nullable();
            $table->string('m_mname')->nullable();
            $table->string('g_lname')->nullable();
            $table->string('g_fname')->nullable();
            $table->string('g_mname')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('type')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
