<div class="modal-{{ $name }} opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div onclick="window.activeModal.toggle();" class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

        <div onclick="window.activeModal.toggle();" class="absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <span class="material-icons">
            close
            </span>
        </div>

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">{{ $title }}</p>
            </div>
            @yield('body')
        </div>
    </div>
</div>
