<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <div class="w-full flex justify-around px-5">
        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <div class="leading-loose">
              <p class="text-xl py-5 px-5 mt-6 flex items-center">
                <i class="fas fa-user mr-3"></i> Apoteker Baru
            </p>
                <form class="p-10 bg-white rounded shadow-xl">
                  <div class="text-lg border-b-2 border-slate-500">Data Dokter</div>
                    <div class="mt-2">
                        <label class="file:block text-sm text-gray-600" for="name">ID Apoteker</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="id" name="id" type="text" required="" placeholder="Code ID" aria-label="Name" wire:model='code' readonly>
                    </div>
                    <div class="mt-2">
                        <label class="mt-2 block text-sm text-gray-600" for="name">Username</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="username" name="username" type="text" required="" placeholder="Enter Username" aria-label="username">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">Password</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" required="" placeholder="Enter Password" aria-label="Password">
                    </div>
                    <div class="mt-2">
                          <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="email">Nama</label>
                            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Enter Nama" aria-label="name">
                          </div>
                    </div>
                    <div class="mt-2">
                      <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">Tanggal Lahir</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="tanggalLahir" name="tanggalLahir" type="date" required="" placeholder="Enter Tanggal Lahir" aria-label="name">
                      </div>
                </div>
                      <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="Alamat">Alamat</label>
                        <textarea id="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-700 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                      </div>
                      <div class="flex flex-1 flex-col w-full">
                        <div class="mt-6 flex grow flex-row">
                          <button class="w-full px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded" type="submit">Simpan</button>
                          <i class="fas fa-floppy-disk ml-2 text-white"></i>  
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>
  </div>