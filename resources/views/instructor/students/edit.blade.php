<x-app-layout>

    <x-slot name="header">

        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Student
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Update student account, contact, medical, and training information
            </p>
        </div>

    </x-slot>

    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form
                    method="POST"
                    action="{{ route('instructor.students.update', $student) }}"
                    class="space-y-10"
                >

                    @csrf
                    @method('PATCH')

                    <!-- Account Information -->
                    <section>

                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            Account Information
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />

                                <x-text-input
                                    id="name"
                                    name="name"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('name', $student->name)"
                                    required
                                />

                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />

                                <x-text-input
                                    id="email"
                                    name="email"
                                    type="email"
                                    class="block mt-1 w-full"
                                    :value="old('email', $student->email)"
                                    required
                                />

                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Status -->
                            <div>
                                <x-input-label for="status" :value="__('Status')" />

                                <select
                                    id="status"
                                    name="status"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1"
                                >
                                    <option value="active" {{ old('status', $student->status) === 'active' ? 'selected' : '' }}>
                                        Active
                                    </option>

                                    <option value="inactive" {{ old('status', $student->status) === 'inactive' ? 'selected' : '' }}>
                                        Inactive
                                    </option>

                                    <option value="completed" {{ old('status', $student->status) === 'completed' ? 'selected' : '' }}>
                                        Completed
                                    </option>
                                </select>

                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <!-- Student ID -->
                            <div>
                                <x-input-label for="student_id" :value="__('Student ID')" />

                                <x-text-input
                                    id="student_id"
                                    name="student_id"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('student_id', $student->studentProfile->student_id ?? '')"
                                />

                                <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
                            </div>

                        </div>

                    </section>

                    <!-- Contact Information -->
                    <section>

                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            Contact Information
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <x-input-label for="address" :value="__('Address')" />

                                <x-text-input
                                    id="address"
                                    name="address"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('address', $student->studentProfile->address ?? '')"
                                />

                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="other_address" :value="__('Other Address')" />

                                <x-text-input
                                    id="other_address"
                                    name="other_address"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('other_address', $student->studentProfile->other_address ?? '')"
                                />

                                <x-input-error :messages="$errors->get('other_address')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="city" :value="__('City')" />

                                <x-text-input
                                    id="city"
                                    name="city"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('city', $student->studentProfile->city ?? '')"
                                />

                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="province" :value="__('Province')" />

                                <x-text-input
                                    id="province"
                                    name="province"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('province', $student->studentProfile->province ?? '')"
                                />

                                <x-input-error :messages="$errors->get('province')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="country" :value="__('Country')" />

                                <x-text-input
                                    id="country"
                                    name="country"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('country', $student->studentProfile->country ?? '')"
                                />

                                <x-input-error :messages="$errors->get('country')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="postal_code" :value="__('Postal Code')" />

                                <x-text-input
                                    id="postal_code"
                                    name="postal_code"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('postal_code', $student->studentProfile->postal_code ?? '')"
                                />

                                <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="citizenship" :value="__('Citizenship')" />

                                <x-text-input
                                    id="citizenship"
                                    name="citizenship"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('citizenship', $student->studentProfile->citizenship ?? '')"
                                />

                                <x-input-error :messages="$errors->get('citizenship')" class="mt-2" />
                            </div>

                        </div>

                    </section>

                    <!-- Phone & Emergency Contact -->
                    <section>

                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            Phone & Emergency Contact
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <x-input-label for="phone" :value="__('Phone')" />

                                <x-text-input
                                    id="phone"
                                    name="phone"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('phone', $student->studentProfile->phone ?? '')"
                                />

                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="other_phone" :value="__('Other Phone')" />

                                <x-text-input
                                    id="other_phone"
                                    name="other_phone"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('other_phone', $student->studentProfile->other_phone ?? '')"
                                />

                                <x-input-error :messages="$errors->get('other_phone')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="emergency_contact_name" :value="__('Emergency Contact Name')" />

                                <x-text-input
                                    id="emergency_contact_name"
                                    name="emergency_contact_name"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('emergency_contact_name', $student->studentProfile->emergency_contact_name ?? '')"
                                />

                                <x-input-error :messages="$errors->get('emergency_contact_name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="emergency_contact_phone" :value="__('Emergency Contact Phone')" />

                                <x-text-input
                                    id="emergency_contact_phone"
                                    name="emergency_contact_phone"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('emergency_contact_phone', $student->studentProfile->emergency_contact_phone ?? '')"
                                />

                                <x-input-error :messages="$errors->get('emergency_contact_phone')" class="mt-2" />
                            </div>

                        </div>

                    </section>

                    <!-- Licence & Medical -->
                    <section>

                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            Licence & Medical
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <x-input-label for="licence_number" :value="__('Licence Number')" />

                                <x-text-input
                                    id="licence_number"
                                    name="licence_number"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('licence_number', $student->studentProfile->licence_number ?? '')"
                                />

                                <x-input-error :messages="$errors->get('licence_number')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="date_of_birth" :value="__('Date of Birth')" />

                                <x-text-input
                                    id="date_of_birth"
                                    name="date_of_birth"
                                    type="date"
                                    class="block mt-1 w-full"
                                    :value="old('date_of_birth', $student->studentProfile->date_of_birth ?? '')"
                                />

                                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="medical_date" :value="__('Medical Date')" />

                                <x-text-input
                                    id="medical_date"
                                    name="medical_date"
                                    type="date"
                                    class="block mt-1 w-full"
                                    :value="old('medical_date', $student->studentProfile->medical_date ?? '')"
                                />

                                <x-input-error :messages="$errors->get('medical_date')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="medical_expiry" :value="__('Medical Expiry Date')" />

                                <x-text-input
                                    id="medical_expiry"
                                    name="medical_expiry"
                                    type="date"
                                    class="block mt-1 w-full"
                                    :value="old('medical_expiry', $student->studentProfile->medical_expiry ?? '')"
                                />

                                <x-input-error :messages="$errors->get('medical_expiry')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="medical_category" :value="__('Medical Category')" />

                                <x-text-input
                                    id="medical_category"
                                    name="medical_category"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('medical_category', $student->studentProfile->medical_category ?? '')"
                                />

                                <x-input-error :messages="$errors->get('medical_category')" class="mt-2" />
                            </div>

                        </div>

                    </section>

                    <!-- Training Assignment -->
                    <section>

                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            Training Assignment
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <x-input-label for="cohort" :value="__('Cohort')" />

                                <x-text-input
                                    id="cohort"
                                    name="cohort"
                                    type="text"
                                    class="block mt-1 w-full"
                                    :value="old('cohort', $student->studentProfile->cohort ?? '')"
                                />

                                <x-input-error :messages="$errors->get('cohort')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="primary_instructor_id" :value="__('Primary Instructor')" />

                                <select
                                    id="primary_instructor_id"
                                    name="primary_instructor_id"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1"
                                >
                                    <option value="">None</option>

                                    @foreach($instructors as $instructor)
                                        <option
                                            value="{{ $instructor->id }}"
                                            {{ old('primary_instructor_id', $student->studentProfile->primary_instructor_id ?? '') == $instructor->id ? 'selected' : '' }}
                                        >
                                            {{ $instructor->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <x-input-error :messages="$errors->get('primary_instructor_id')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="secondary_instructor_id" :value="__('Secondary Instructor')" />

                                <select
                                    id="secondary_instructor_id"
                                    name="secondary_instructor_id"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1"
                                >
                                    <option value="">None</option>

                                    @foreach($instructors as $instructor)
                                        <option
                                            value="{{ $instructor->id }}"
                                            {{ old('secondary_instructor_id', $student->studentProfile->secondary_instructor_id ?? '') == $instructor->id ? 'selected' : '' }}
                                        >
                                            {{ $instructor->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <x-input-error :messages="$errors->get('secondary_instructor_id')" class="mt-2" />
                            </div>

                        </div>

                    </section>

                    <!-- Submit -->
                    <div class="pt-4 flex items-center gap-3 justify-end border-t">

                        <a
                            href="{{ route('instructor.students.show', $student) }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 transition"
                        >
                            Cancel
                        </a>

                        <x-primary-button>
                            Update Student
                        </x-primary-button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>