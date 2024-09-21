
<div>
    <style>
        .divup {
            overflow: hidden;
        }
        .imgrfd {
        }
        #viewer {
            cursor: grab;
        }
        #viewer:active {
            cursor: grabbing;
        }
    </style>

    <section class="py-8 bg-white md:py-16 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
          <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
            <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">

                <div class="imgrfd">
                    <div id="viewer" class="w-[350px]"></div>
                </div>
            </div>
    
            <div class="mt-6 sm:mt-8 lg:mt-0">
              <h1
                class="font-family text-xl font-semibold text-gray-900 sm:text-2xl"
              >
                Apple iPhone 12
              </h1>
              <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                <p
                  class="font-family-bold text-2xl font-extrabold text-gray-900 sm:text-3xl"
                >
                 R$14,999
                </p>
    
              </div>
              <div class="font-family sm:mt-4">
                    <select id="colorSelect" class="border border-gray-300 rounded-md p-2">
                        <option selected>Selecione a cor</option>
                        <option value="black">Preto</option>
                        <option value="white">Branco</option>
                        <option value="blue">Azul</option>
                        <option value="red">Vermelho</option>
                    </select>
                    <select id="memorySelect" class="border border-gray-300 rounded-md p-2">
                        <option selected>Selecione a memória</option>
                        <option value="64gb">64 GB</option>
                        <option value="128gb">128 GB</option>
                        <option value="256gb">256 GB</option>
                    </select>
              </div>

              <div class="mt-2 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                
                <a
                  href="#"
                  title=""
                  class="text-white mt-4 sm:mt-0 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center"
                  role="button"
                >
                  <svg
                    class="w-5 h-5 -ms-2 me-2"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="none"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"
                    />
                  </svg>
                  Fazer Reserva
                </a>
              </div>
    
              <hr class="my-6 md:my-8 border-gray-200" />
    
              <p class="mb-6 text-gray-500">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
            </div>
          </div>
        </div>
      </section>

      <script>
   const images = [
    '<?php echo asset("img/i12/1.png"); ?>',
    '<?php echo asset("img/i12/2.png"); ?>',
    '<?php echo asset("img/i12/3.png"); ?>',
    '<?php echo asset("img/i12/4.png"); ?>',
    '<?php echo asset("img/i12/7.png"); ?>',
    '<?php echo asset("img/i12/8.png"); ?>',
    '<?php echo asset("img/i12/6.png"); ?>',
    '<?php echo asset("img/i12/5.png"); ?>',
];

const viewer = document.getElementById('viewer');
let currentIndex = 0;
let isDragging = false;
let startX;

// Load images into the viewer
images.forEach((src, index) => {
    const img = document.createElement('img');
    img.src = src;
    img.style.width = '150%'; // Scale the images larger
    img.style.height = 'auto'; // Maintain aspect ratio
    img.style.objectFit = 'cover'; // Cover the space without distorting
    img.style.display = index === 0 ? 'block' : 'none'; // Only show the first image
    viewer.appendChild(img);
});

// Change image based on index
function changeImage(index) {
    const imgs = viewer.getElementsByTagName('img');
    Array.from(imgs).forEach((img, i) => {
        img.style.display = i === index ? 'block' : 'none'; // Use display instead of opacity
    });
}

// Mouse down event
function onMouseDown(event) {
    isDragging = true;
    startX = event.type === 'mousedown' ? event.clientX : event.touches[0].clientX; // Handle touch
    viewer.style.cursor = 'grabbing';
}

// Mouse move event
function onMouseMove(event) {
    if (!isDragging) return;

    const moveX = startX - (event.type === 'mousemove' ? event.clientX : event.touches[0].clientX); // Handle touch
    if (Math.abs(moveX) > 30) { // Sensitivity
        currentIndex = (currentIndex + (moveX > 0 ? 1 : -1) + images.length) % images.length;
        changeImage(currentIndex);
        startX = event.type === 'mousemove' ? event.clientX : event.touches[0].clientX; // Reset start position
    }
}

// Mouse up event
function onMouseUp() {
    isDragging = false;
    viewer.style.cursor = 'grab';
}

// Event listeners for mouse
viewer.addEventListener('mousedown', onMouseDown);
viewer.addEventListener('mousemove', onMouseMove);
viewer.addEventListener('mouseup', onMouseUp);

// Event listeners for touch
viewer.addEventListener('touchstart', onMouseDown);
viewer.addEventListener('touchmove', onMouseMove);
viewer.addEventListener('touchend', onMouseUp);

    </script>
</div>
