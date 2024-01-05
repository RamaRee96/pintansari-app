<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
  <p class="text-xl px-5 mt-6 flex items-center">
      <i class="fas fa-user mr-3"></i> Pasien Baru
  </p>
  <div class="w-full flex justify-around px-5">
      <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
          <div class="leading-loose">
              <form class="p-10 bg-white rounded shadow-xl">
                <div class="text-lg border-b-2 border-slate-500">Data Pasien</div>
                  <div class="mt-2">
                      <label class="file:block text-sm text-gray-600" for="name">Kode Pasien</label>
                      <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Code ID" aria-label="Name" wire:model='code' readonly>
                  </div>
                  <div class="mt-2">
                      <label class="mt-2 block text-sm text-gray-600" for="name">Nama</label>
                      <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Enter Nama" aria-label="Name">
                  </div>
                  <div class="mt-2">
                      <label class="block text-sm text-gray-600" for="email">Usia</label>
                      <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="usia" name="usia" type="number" required="" placeholder="Enter Usia" aria-label="Usia">
                  </div>
                  <div class="flex">
                        <div class="mt-2">
                          <label class="block text-sm text-gray-600" for="email">Tanggal Lahir</label>
                          <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="tanggalLahir" name="tanggalLahir" type="date" required="" placeholder="Enter Tanggal Lahir" aria-label="Tanggal Lahir">
                        </div>
                        <div class="flex flex-col ml-2">
                          <label class="block text-sm text-gray-600 mt-2" for="email">Jenis Kelamin</label>
                         <div class="flex items-center justify-center h-full w-full">
                          <input type="radio" name="jenis-kelamin" id="jenis-kelamin">
                          <label class="ml-2 block text-sm text-gray-600" for="email">Pria</label>
                          <input class="ml-4" type="radio" name="jenis-kelamin" id="jenis-kelamin">
                          <label class="ml-2 block text-sm text-gray-600" for="email">Wanita</label>
                         </div>
                        </div>
                  </div>
                  <div class="mt-2">
                      <label class="block text-sm text-gray-600" for="Pekerjaan">Pekerjaan</label>
                      <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="pekerjaan" name="pekerjaan" type="text" required="" placeholder="Enter Pekerjaan" aria-label="Pekerjaan">
                  </div>
                  <div class="flex w-full flex-row gap-2">
                      <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">No Telepon</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="noTelp" name="noTelp" type="number" required="" placeholder="Enter No Telepon" aria-label="No Telepon">
                      </div>
                      <div class="mt-2 w-full">                      
                          <label for="pilih-dokter" class="block text-sm text-gray-900 dark:text-white">-Pilih Dokter-</label>
                          <select id="pilih-dokter" class="w-[300px] bg-gray-200 border text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>-Pilih dokter-</option>
                            <option value="dokter-1">Dokter 1</option>
                            <option value="dokter-2">Dokter 2</option>
                            <option value="dokter-3">Dokter 3</option>
                            <option value="dokter-4">Dokter 4</option>
                          </select>
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
                      <div class="mt-2 flex grow flex-row">
                        <button class="w-full px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded" type="submit">Reset Antrian</button>
                        <i class="fas fa-rotate ml-2 text-white"></i>
                    </div>
                    </div>
              </form>
          </div>
      </div>
</div>