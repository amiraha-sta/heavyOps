<div class="py-8">
    <div class="bg-gradient-to-r from-teal-50 to-purple-50 border border-teal-200 rounded-lg p-6 mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">HEAVY OPS</h1>
            <h2 class="text-xl font-semibold text-teal-600 mb-4 italic">"HEAVY EQUIPMENT TRAINING "</h2>
        
        <div class="prose prose-gray max-w-none">
            <p class="text-gray-700 leading-relaxed mb-4">
                Launch your career in the heavy machinery industry with Project HEAVY OPS, a specialized initiative by the Ministry of Sport and Youth Affairs designed to equip youth with certified technical skills and safety training. This program bridges the gap between vocational education and market demand, providing a pathway to employment in the construction, logistics, and manufacturing sectors.
            </p>

            <ul class="list-disc pl-6 text-gray-700 mb-4">
                <li>Participants must be between the ages of 21- 35 years old</li>
                <li>Applicants must be nationals of Trinidad and Tobago</li>
                <li>pplicants must possess at least a School Leaving Certificate or equivalent.</li>
                <li>All applicants must possess a valid Trinidad and Tobago Class 3 manual License with a minimum of one (1) year driving experience.</li>
                <li>Participants must be committed to attending all sessions of the training programme, including practical and theoretical components.</li>



            </ul>

            <p class="font-bold italic"><br><strong class="text-red-500 "> DISCLAIMER: </strong>    Completing the registration does not mean you are accepted for the programme. Only shortlisted participants will be contacted.</p>
        </div>

    </div>
    <form wire:submit="create">
        {{ $this->form }}

        <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 mt-4" type="submit">
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>
