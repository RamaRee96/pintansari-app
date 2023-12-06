<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <div class="flex items-center justify-center">
        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-user mr-3"></i> Pasien Baru
            </p>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl">
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Kode Pasien</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Code ID" aria-label="Name" wire:model='code' readonly>
                    </div>
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Nama</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Enter Nama" aria-label="Name">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">Usia</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Enter Usia" aria-label="Email">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">Jenis Kelamin</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Enter Jenis Kelamin" aria-label="Email">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">Tanggal Lahir</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Enter Tanggal Lahir" aria-label="Email">
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">Alamat</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Enter Alamat" aria-label="Email">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">No Telepon</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Enter No Telepon" aria-label="Email">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">Pekerjaan</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Enter Pekerjaan" aria-label="Email">
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
</div>
