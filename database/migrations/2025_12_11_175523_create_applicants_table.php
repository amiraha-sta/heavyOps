<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('APL_ID'); // Primary key

            // Personal Information
            $table->string('APL_FName', 255);
            $table->string('APL_MName', 255);
            $table->string('APL_LName', 255);
            $table->text('APL_Address_1');
            $table->text('APL_Address_2');
            $table->string('APL_Municipality', 255);
            $table->date('APL_DOB');
            $table->integer('APL_Age');
            $table->string('APL_Gender', 50);
            $table->string('APL_Email', 255);
            $table->string('APL_PPhone', 20);
            $table->string('APL_APhone', 20);
            $table->string('APL_Nationality', 10);
            $table->string('APL_BIRTH_PIN', 50);
            $table->string('APL_ID_TYP', 50);
            $table->string('APL_ID_Number', 50);

            // Education & Training
            $table->string('APL_HLOE', 100);
            $table->string('APL_HLOE_Other', 255);
            $table->string('APL_Currently_Enrolled', 5);

            // Licensing & Employment
            $table->string('APL_Drivers_Permit', 5);
            $table->string('APL_Employment_Status', 100);

            // Household Information
            $table->string('APL_Dependants', 5);
            $table->string('APL_Household_Income', 100);
            $table->integer('APL_Household_Size');

            // Programme Interest & Commitment
            $table->string('APL_Repay_Agree', 5);
            $table->string('APL_Career_Interest', 5);
            $table->text('APL_Career_Details');
            $table->string('APL_Experience', 5);
            $table->text('APL_Experience_Details');
            $table->string('APL_Cohort', 100);
            $table->string('APL_Obligations', 5);
            $table->text('APL_Obligation_Details');
            $table->text('APL_Vision');

            // Programme History
            $table->string('APL_MSYA_Beneficiary', 5);
            $table->text('APL_MSYA_Beneficiary_Details');

            // Uniform & Equipment Sizes
            $table->string('APL_Coverall_Size', 20);
            $table->string('APL_Boot_Size', 20);
            $table->string('APL_Glove_Size', 20);

            // Youth Group & Communication
            $table->string('APL_Youth_Group', 5);
            $table->string('APL_Youth_Group_Join', 5);
            $table->string('APL_Subscribe', 5);

            // Emergency Contact Information
            $table->string('APL_Emergency_Name', 255);
            $table->string('APL_Emergency_Number', 20);
            $table->string('APL_Emergency_Relation', 100);

            // Document Uploads (JSON for multi-file uploads)
            $table->json('APL_Birth_Certificate_File');
            $table->json('APL_ID_File');
            $table->json('APL_Academic_Certificates_File');
            $table->json('APL_Drivers_Permit_File');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
