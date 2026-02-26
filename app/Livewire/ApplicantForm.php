<?php

namespace App\Livewire;

use App\Models\Applicant;
use M21\Formkit\Support\FormQuestionBuilder;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('vendor.formkit.components.layouts.portal')]
class ApplicantForm extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    // Step 1: Personal Information
                    Step::make('Personal Information')
                        ->description('Your details, contact, and emergency information')
                        ->schema([
                            Group::make([
                                FormQuestionBuilder::make(TextInput::class, 'APL_FName'),
                                FormQuestionBuilder::make(TextInput::class, 'APL_MName', false),
                                FormQuestionBuilder::make(TextInput::class, 'APL_LName')
                            ])->columns(3)->columnSpanFull(),

                            Group::make([
                                FormQuestionBuilder::make(TextInput::class, 'APL_Address_1'),
                                FormQuestionBuilder::make(TextInput::class, 'APL_Address_2'),
                                FormQuestionBuilder::make(TextInput::class, 'APL_Municipality')
                            ])->columns(3)->columnSpanFull(),

                            FormQuestionBuilder::make(DatePicker::class, 'APL_DOB')
                                ->live()
                                ->afterStateUpdated(function ($state, $set) {
                                    if (blank($state)) {
                                        $set('APL_Age', null);
                                        return;
                                    }
                                    try {
                                        $date = \Carbon\Carbon::parse($state);
                                        if ($date->year > 1900 && $date->isPast()) {
                                            $set('APL_Age', $date->age);
                                        } else {
                                            $set('APL_Age', null);
                                        }
                                    } catch (\Exception $e) {
                                        $set('APL_Age', null);
                                    }
                                }),

                            FormQuestionBuilder::make(TextInput::class, 'APL_Age')->disabled()->dehydrated(),
                            FormQuestionBuilder::make(Radio::class, 'APL_Gender')
                                ->inline()
                                ->required()
                                ->options(['Male' => 'Male', 'Female' => 'Female']),

                            Group::make([
                                FormQuestionBuilder::make(TextInput::class, 'APL_Email')->email(),
                                FormQuestionBuilder::make(TextInput::class, 'APL_PPhone')->tel(),
                                FormQuestionBuilder::make(TextInput::class, 'APL_APhone', false)->tel()
                            ])->columnSpanFull(),

                            FormQuestionBuilder::make(TextInput::class, 'APL_Nationality'),

                            Group::make([
                                FormQuestionBuilder::make(TextInput::class, 'APL_Emergency_Name'),
                                FormQuestionBuilder::make(TextInput::class, 'APL_Emergency_Number'),
                                FormQuestionBuilder::make(TextInput::class, 'APL_Emergency_Relation'),
                            ])->columns(3)->columnSpanFull(),

                            Fieldset::make('Birth Certificate')
                                ->schema([
                                    FormQuestionBuilder::make(TextInput::class, 'APL_BIRTH_PIN'),
                                ])->columnSpanFull(),

                            Fieldset::make('Identification Document')
                                ->schema([
                                    FormQuestionBuilder::make(Select::class, 'APL_ID_TYP')->options([
                                        'National ID' => 'National ID',
                                        'Trinidad and Tobago Passport' => 'Trinidad and Tobago Passport',
                                    ]),
                                    FormQuestionBuilder::make(TextInput::class, 'APL_ID_Number'),
                                ])->columnSpanFull(),
                        ])->columns(2),

                    // Step 2: Background & Experience
                    Step::make('Background & Experience')
                        ->description('Your professional background and experience')
                        ->schema([
                            FormQuestionBuilder::make(Radio::class, 'APL_Repay_Agree')
                                ->options(['Yes' => 'Yes', 'No' => 'No'])
                                ->inline(),

                            Group::make([
                                FormQuestionBuilder::make(Select::class, 'APL_HLOE')->options([
                                    'Primary' => 'Primary',
                                    'Secondary' => 'Secondary',
                                    'Tertiary' => 'Tertiary',
                                    'Technical/Vocational' => 'Technical/Vocational',
                                    'Other' => 'Other',
                                ])->placeholder('Select Highest Level of Education')->live(),

                                FormQuestionBuilder::make(TextInput::class, 'APL_HLOE_Other', false)
                                    ->label('If Other, please specify')
                                    ->visible(fn(Get $get) => $get('APL_HLOE') === 'Other'),
                            ])->columns(2)->columnSpanFull(),

                            FormQuestionBuilder::make(Radio::class, 'APL_Currently_Enrolled')
                                ->options(['Yes' => 'Yes', 'No' => 'No'])
                                ->inline(),

                            FormQuestionBuilder::make(Radio::class, 'APL_Drivers_Permit')
                                ->options(['Yes' => 'Yes', 'No' => 'No'])
                                ->inline(),

                            FormQuestionBuilder::make(Select::class, 'APL_Employment_Status')->options([
                                'Employed' => 'Employed',
                                'Unemployed' => 'Unemployed',
                                'Self-Employed' => 'Self-Employed',
                                'Student' => 'Student',
                            ])->placeholder('Select Employment Status'),

                            FormQuestionBuilder::make(Radio::class, 'APL_Dependants')
                                ->options(['Yes' => 'Yes', 'No' => 'No'])
                                ->inline(),

                            Group::make([
                                FormQuestionBuilder::make(TextInput::class, 'APL_Household_Income'),
                                FormQuestionBuilder::make(TextInput::class, 'APL_Household_Size'),
                            ])->columns(2)->columnSpanFull(),

                            FormQuestionBuilder::make(Radio::class, 'APL_Career_Interest')
                                ->options(['Yes' => 'Yes', 'No' => 'No'])
                                ->inline(),
                            FormQuestionBuilder::make(Textarea::class, 'APL_Career_Details')->nullable(),
                            FormQuestionBuilder::make(Radio::class, 'APL_Experience')
                                ->options(['Yes' => 'Yes', 'No' => 'No'])
                                ->inline(),
                            FormQuestionBuilder::make(Textarea::class, 'APL_Experience_Details')->nullable(),
                        ]),

                    // Step 3: Programme Interest
                    Step::make('Programme Interest')
                        ->description('Programme selection, history, and uniform sizes')
                        ->schema([
                            FormQuestionBuilder::make(TextInput::class, 'APL_Cohort'),
                            FormQuestionBuilder::make(Radio::class, 'APL_Obligations')
                                ->options(['Yes' => 'Yes', 'No' => 'No'])
                                ->inline(),
                            FormQuestionBuilder::make(Textarea::class, 'APL_Obligation_Details')->nullable(),
                            FormQuestionBuilder::make(Textarea::class, 'APL_Vision'),

                            FormQuestionBuilder::make(Radio::class, 'APL_MSYA_Beneficiary')
                                ->options(['Yes' => 'Yes', 'No' => 'No'])
                                ->inline(),
                            FormQuestionBuilder::make(Textarea::class, 'APL_MSYA_Beneficiary_Details')->nullable(),

                            Group::make([
                                FormQuestionBuilder::make(TextInput::class, 'APL_Coverall_Size'),
                                FormQuestionBuilder::make(TextInput::class, 'APL_Boot_Size'),
                                FormQuestionBuilder::make(TextInput::class, 'APL_Glove_Size'),
                            ])->columns(3)->columnSpanFull(),
                        ]),

                    // Step 4: Additional Information
                    Step::make('Additional Information')
                        ->description('Youth group membership and mailing list subscription')
                        ->schema([
                            FormQuestionBuilder::make(Radio::class, 'APL_Youth_Group')
                                ->options(['Yes' => 'Yes', 'No' => 'No'])
                                ->inline(),
                            FormQuestionBuilder::make(Radio::class, 'APL_Youth_Group_Join')
                                ->options(['Yes' => 'Yes', 'No' => 'No'])
                                ->inline(),
                            FormQuestionBuilder::make(Radio::class, 'APL_Subscribe')
                                ->options(['Yes' => 'Yes', 'No' => 'No'])
                                ->inline(),
                        ]),

                    // Step 5: Document Uploads
                    Step::make('Document Uploads')
                        ->description('Upload your required documents')
                        ->schema([
                            FormQuestionBuilder::make(FileUpload::class, 'APL_Birth_Certificate_File')
                                ->multiple()
                                ->maxSize(10240)
                                ->enableDownload()
                                ->enableOpen()
                                ->dehydrated(),

                            FormQuestionBuilder::make(FileUpload::class, 'APL_ID_File')
                                ->multiple()
                                ->maxSize(10240)
                                ->enableDownload()
                                ->enableOpen()
                                ->dehydrated(),

                            FormQuestionBuilder::make(FileUpload::class, 'APL_Academic_Certificates_File')
                                ->multiple()
                                ->maxSize(10240)
                                ->enableDownload()
                                ->enableOpen()
                                ->dehydrated(),

                            FormQuestionBuilder::make(FileUpload::class, 'APL_Drivers_Permit_File')
                                ->multiple()
                                ->maxSize(10240)
                                ->enableDownload()
                                ->enableOpen()
                                ->dehydrated(),
                        ]),
                ])->skippable(),
            ])
            ->statePath('data')
            ->model(Applicant::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        // Handle multi-file uploads
        $fileFields = [
            'APL_Birth_Certificate_File',
            'APL_ID_File',
            'APL_Academic_Certificates_File',
            'APL_Drivers_Permit_File',
        ];

        foreach ($fileFields as $field) {
            if (!empty($data[$field])) {
                $files = is_array($data[$field]) ? $data[$field] : [$data[$field]];
                $storedPaths = [];
                foreach ($files as $file) {
                    $storedPaths[] = $file->store("uploads/{$field}", 'public');
                }
                $data[$field] = json_encode($storedPaths);
            } else {
                $data[$field] = json_encode([]);
            }
        }

        Applicant::create($data);

        redirect()->route('application')->with('success', 'Application submitted successfully');
    }

    public function render(): View
    {
        return view('livewire.applicant-form');
    }
}
