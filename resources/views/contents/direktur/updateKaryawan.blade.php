<x-app-layout>
        <div class="container-xxl flex-grow-1 container-p-y">
                <center><h3 class="fw-bold py-3" style="font-size: 30px">DATA KARYAWAN</h3></center>
                
                <div class="card mt-4" style="padding: 30px">
                    <form method="POST" action="{{ route('datakaryawan.update.process',$user->id) }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- NIP -->
                        <div class="mt-4">
                            <x-input-label for="nip" :value="__('NIP')" />
                            <x-text-input id="nip" class="block mt-1 w-full" type="text" name="nip" value="{{$user->nip}}" required />
                            <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                        </div>

                        <!-- Level -->
                        <div class="mt-4">
                            <x-input-label for="role" :value="__('Role')" />
                            <select id="role" name="role" class="block mt-1 w-full" required>
                                <option value="" disabled>Select Role</option>
                                <option value="finance" {{ $user->role === 'finance' ? 'selected' : '' }}>Finance</option>
                                <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>Staff</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ms-4">
                                Update
                            </x-primary-button>
                        </div>
                    </form>
                </div>
              <!--/ Responsive Table -->
        </div>   
</x-app-layout>