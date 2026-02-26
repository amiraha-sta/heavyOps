<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = 'applications';

    // Set the primary key to APL_ID
    protected $primaryKey = 'APL_ID';

    // Primary key is not auto-incrementing by default (bigIncrements handles it)
    public $incrementing = true;

    // Fillable fields
    protected $fillable = [
        // Personal Information
        'APL_FName',
        'APL_MName',
        'APL_LName',
        'APL_Address_1',
        'APL_Address_2',
        'APL_Municipality',
        'APL_DOB',
        'APL_Age',
        'APL_Gender',
        'APL_Email',
        'APL_PPhone',
        'APL_APhone',
        'APL_Nationality',
        'APL_BIRTH_PIN',
        'APL_ID_TYP',
        'APL_ID_Number',

        // Education & Training
        'APL_HLOE',
        'APL_HLOE_Other',
        'APL_Currently_Enrolled',

        // Licensing & Employment
        'APL_Drivers_Permit',
        'APL_Employment_Status',

        // Household Information
        'APL_Dependants',
        'APL_Household_Income',
        'APL_Household_Size',

        // Programme Interest & Commitment
        'APL_Repay_Agree',
        'APL_Career_Interest',
        'APL_Career_Details',
        'APL_Experience',
        'APL_Experience_Details',
        'APL_Cohort',
        'APL_Obligations',
        'APL_Obligation_Details',
        'APL_Vision',

        // Programme History
        'APL_MSYA_Beneficiary',
        'APL_MSYA_Beneficiary_Details',

        // Uniform & Equipment Sizes
        'APL_Coverall_Size',
        'APL_Boot_Size',
        'APL_Glove_Size',

        // Youth Group & Communication
        'APL_Youth_Group',
        'APL_Youth_Group_Join',
        'APL_Subscribe',

        // Emergency Contact Information
        'APL_Emergency_Name',
        'APL_Emergency_Number',
        'APL_Emergency_Relation',

        // Document Uploads
        'APL_Birth_Certificate_File',
        'APL_ID_File',
        'APL_Academic_Certificates_File',
        'APL_Drivers_Permit_File',
    ];

    // Casts
    protected $casts = [
        'APL_DOB' => 'date',

        // Cast multi-file JSON fields to arrays
        'APL_Birth_Certificate_File' => 'array',
        'APL_ID_File' => 'array',
        'APL_Academic_Certificates_File' => 'array',
        'APL_Drivers_Permit_File' => 'array',
    ];
}
