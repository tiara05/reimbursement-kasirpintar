<x-app-layout>
        <div class="container-xxl flex-grow-1 container-p-y">
                <center><h3 class="fw-bold py-3" style="font-size: 30px">DATA REIMBURSEMENT</h3></center>
                
                <div class="card mt-4" style="padding: 30px">
                    <form method="POST" action="{{ route('reimbursement.create.process')}}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="tanggal" :value="__('Tanggal')" />
                            <x-text-input id="tanggal" class="block mt-1 w-full" type="date" name="tanggal" :value="old('tanggal')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
                        </div>

                        <!-- NIP -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Nama Reimbursement')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        
                        <div class="mt-4">
                            <x-input-label for="file" :value="__('File Pendukung')" />
                            <x-text-input id="file" class="block mt-1 w-full" type="file" name="file" accept=".pdf, image/*" :value="old('file')" required />
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                        </div>

                        <!-- Level -->
                        <div class="mt-4">
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <textarea id="deskripsi" name="deskripsi" class="block mt-1 w-full" required>{{ old('deskripsi') }}</textarea>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>

                        

                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ms-4">
                                sumbit
                            </x-primary-button>
                        </div>
                    </form>
                </div>
              <!--/ Responsive Table -->
        </div>   
</x-app-layout>