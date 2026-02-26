<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('form_questions')->insert([
            // Personal Information
            [
                'id' => 'APL_FName',
                'label' => 'FirstName',
                'placeholder' => 'Enter your first name',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_MName',
                'label' => 'Middle Name',
                'placeholder' => 'Enter your middle name',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_LName',
                'label' => 'Last Name',
                'placeholder' => 'Enter your full name',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Address_1',
                'label' => 'Address Line 1',
                'placeholder' => 'Street Number (E.g #2 Elizabeth Street)',
                'field_type' => 'Textarea',
            ],
            [
                'id' => 'APL_Address_2',
                'label' => 'Address Line 2',
                'placeholder' => 'Area (E.g. St. Clair)',
                'field_type' => 'Textarea',
            ],
            [
                'id' => 'APL_Municipality',
                'label' => 'Municipality',
                'placeholder' => 'Enter your municipality',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_DOB',
                'label' => 'Date of Birth',
                'placeholder' => 'mm/dd/yyyy',
                'field_type' => 'DatePicker',
            ],
            [
                'id' => 'APL_Age',
                'label' => 'Age',
                'placeholder' => 'Enter your age',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Gender',
                'label' => 'Gender',
                'placeholder' => 'Male / Female',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Email',
                'label' => 'Email',
                'placeholder' => 'example@email.com',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_PPhone',
                'label' => 'Primary Contact Number',
                'placeholder' => '868-123-4567',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_APhone',
                'label' => 'Alternate Contact Number',
                'placeholder' => '868-123-4567',
                'field_type' => 'TextInput',
            ],

            [
                'id' => 'APL_Nationality',
                'label' => 'Are you a citizen of Trinidad and Tobago?',
                'placeholder' => 'Yes / No',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_BIRTH_PIN',
                'label' => 'Birth Certificate Pin Number',
                'placeholder' => 'Enter your Birth Certificate PIN',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_ID_TYP',
                'label' => 'Type of Identification',
                'placeholder' => 'National ID / Passport',
                'field_type' => 'Select',
            ],
            [
                'id' => 'APL_ID_Number',
                'label' => 'Identification Number',
                'placeholder' => 'Enter your ID number',
                'field_type' => 'TextInput',
            ],

            // Education & Training
            [
                'id' => 'APL_HLOE',
                'label' => 'Highest Level of Education',
                'placeholder' => 'Select your education level',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_HLOE_Other',
                'label' => 'Highest Level of Education (Other)',
                'placeholder' => 'Please specify',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Currently_Enrolled',
                'label' => 'Are you currently enrolled in school/training?',
                'placeholder' => 'Yes / No',
                'field_type' => 'TextInput',
            ],

            // Licensing & Employment
            [
                'id' => 'APL_Drivers_Permit',
                'label' => "Are you the holder of a Driver's Permit, authorized to drive Manual Transmission Vehicles?",
                'placeholder' => 'Yes / No',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Employment_Status',
                'label' => 'What is your current employment status?',
                'placeholder' => 'Select employment status',
                'field_type' => 'TextInput',
            ],

            // Household Information
            [
                'id' => 'APL_Dependants',
                'label' => 'Do you have children/dependants?',
                'placeholder' => 'Yes / No',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Household_Income',
                'label' => 'Which one of the following best describes your monthly household income?',
                'placeholder' => 'Select income range',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Household_Size',
                'label' => 'What is your current household size?',
                'placeholder' => 'Enter household size',
                'field_type' => 'TextInput',
            ],

            // Programme Interest & Commitment
            [
                'id' => 'APL_Repay_Agree',
                'label' => 'Are you willing to repay the state if you drop out of the programme?',
                'placeholder' => 'Yes / No',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Career_Interest',
                'label' => 'Are you interested in establishing a career in the course selected?',
                'placeholder' => 'Yes / No',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Career_Details',
                'label' => 'Details',
                'placeholder' => 'Provide additional details',
                'field_type' => 'Textarea',
            ],
            [
                'id' => 'APL_Experience',
                'label' => 'Do you have any experience in the course selected?',
                'placeholder' => 'Yes / No',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Experience_Details',
                'label' => 'Details',
                'placeholder' => 'Provide additional details',
                'field_type' => 'Textarea',
            ],
            [
                'id' => 'APL_Cohort',
                'label' => 'Please indicate which training cohort you are interested in',
                'placeholder' => 'Select a cohort',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Obligations',
                'label' => 'Do you have any other Obligations/Commitments that may prevent you from completing this programme?',
                'placeholder' => 'Yes / No',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Obligation_Details',
                'label' => 'Details',
                'placeholder' => 'Provide additional details',
                'field_type' => 'Textarea',
            ],
            [
                'id' => 'APL_Vision',
                'label' => 'Briefly state your vision and what you expect to gain upon completion of the Skills for a Technological and Diversified Economy Programme?',
                'placeholder' => 'Describe your vision and goals',
                'field_type' => 'Textarea',
            ],

            // Programme History
            [
                'id' => 'APL_MSYA_Beneficiary',
                'label' => 'Have you benefited from any MSYA programme over the past two (2) years?',
                'placeholder' => 'Yes / No',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_MSYA_Beneficiary_Details',
                'label' => 'Details',
                'placeholder' => 'Provide additional details',
                'field_type' => 'Textarea',
            ],

            // Uniform & Equipment Sizes
            [
                'id' => 'APL_Coverall_Size',
                'label' => 'Coverall size',
                'placeholder' => 'Enter coverall size',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Boot_Size',
                'label' => 'Safety Boots Size',
                'placeholder' => 'Enter boot size',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Glove_Size',
                'label' => 'Glove Size',
                'placeholder' => 'Enter glove size',
                'field_type' => 'TextInput',
            ],

            // Youth Group & Communication
            [
                'id' => 'APL_Youth_Group',
                'label' => 'Are you a member of a Youth Group?',
                'placeholder' => 'Yes / No',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Youth_Group_Join',
                'label' => 'Are you willing to join/become a member of a youth group?',
                'placeholder' => 'Yes / No',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Subscribe',
                'label' => 'Do you want to subscribe to our mailing list to receive updates on future programmes?',
                'placeholder' => 'Yes / No',
                'field_type' => 'TextInput',
            ],

            // Emergency Contact Information
            [
                'id' => 'APL_Emergency_Name',
                'label' => 'Emergency Contact Name?',
                'placeholder' => 'Enter emergency contact name',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Emergency_Number',
                'label' => 'Emergency Contact Number?',
                'placeholder' => '868-123-4567',
                'field_type' => 'TextInput',
            ],
            [
                'id' => 'APL_Emergency_Relation',
                'label' => 'Emergency Contact Relation?',
                'placeholder' => 'Enter relationship',
                'field_type' => 'TextInput',
            ],

            // Document Uploads
            [
                'id' => 'APL_Birth_Certificate_File',
                'label' => 'Upload a copy of your Birth Certificate',
                'placeholder' => 'Upload Birth Certificate',
                'field_type' => 'FileUpload',
            ],
            [
                'id' => 'APL_ID_File',
                'label' => 'Upload a copy of your Identification Document (National ID or Passport)',
                'placeholder' => 'Upload ID document',
                'field_type' => 'FileUpload',
            ],
            [
                'id' => 'APL_Academic_Certificates_File',
                'label' => 'Upload copies of your Academic Certificates (if applicable)',
                'placeholder' => 'Upload Academic Certificates',
                'field_type' => 'FileUpload',
            ],
            [
                'id' => 'APL_Drivers_Permit_File',
                'label' => 'Upload a copy of your Driver\'s Permit',
                'placeholder' => 'Upload Driver\'s Permit',
                'field_type' => 'FileUpload',
            ],
        ]);
    }
}
