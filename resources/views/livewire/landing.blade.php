<style>
  .hero {
      position: relative;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-size: cover;
      background-position: center;
  }

  .hero-overlay {
      position: absolute;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.7); /* Black overlay with 70% opacity */
      z-index: 1;
  }

  .hero-content {
      position: relative;
      z-index: 2; /* Ensure content is above the overlay */
      color: white;
      text-align: center;
  }
</style>

<div>
  <section class="hero" id="heroSection">
    <div class="hero-overlay"></div> <!-- Overlay for the background -->
    <div class="hero-content">
        <h1 class="font-family-bold text-5xl mb-4" id="heroTitle">Hero Title 1</h1>
        <p class="font-family mb-8" id="heroText">This is the description for image 1.</p>
        <div class="flex justify-center space-x-4">
            <button id="prevButton" class="font-family bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Previous</button>
            <button id="nextButton" class="font-family bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Next</button>
        </div>
    </div>
</section>
<script>
  const heroSection = document.getElementById('heroSection');
  const heroTitle = document.getElementById('heroTitle');
  const heroText = document.getElementById('heroText');
  const prevButton = document.getElementById('prevButton');
  const nextButton = document.getElementById('nextButton');

  const heroData = [
      {
          image: '<?php echo asset("img/fundo.png"); ?>',  // PHP function to output the asset URL
          title: 'South Store',
          text: 'A melhor loja de dispositivos Apple de Canguçu e região!'
      },
      {
          image: '<?php echo asset("img/fundo.png"); ?>',  // PHP function to output the asset URL
          title: 'Reposição de seminovos, garanta agora!',
          text: 'This is the description for image 2.'
      },
      {
          image: 'https://via.placeholder.com/800x400/3357FF/FFFFFF?text=Hero+Image+3',
          title: 'Hero Title 3',
          text: 'This is the description for image 3.'
      }
  ];

  let currentIndex = 0;
  let interval;

  function updateHero() {
      const currentHero = heroData[currentIndex];
      heroSection.style.backgroundImage = `url(${currentHero.image})`;
      heroTitle.innerText = currentHero.title;
      heroText.innerText = currentHero.text;
  }

  function nextHero() {
      currentIndex = (currentIndex + 1) % heroData.length;
      updateHero();
  }

  function prevHero() {
      currentIndex = (currentIndex - 1 + heroData.length) % heroData.length;
      updateHero();
  }

  prevButton.addEventListener('click', () => {
      prevHero();
      resetInterval();
  });

  nextButton.addEventListener('click', () => {
      nextHero();
      resetInterval();
  });

  function resetInterval() {
      clearInterval(interval);
      interval = setInterval(nextHero, 5000);
  }

  interval = setInterval(nextHero, 5000); // Change every 3 seconds
  updateHero(); // Initial call
</script>

    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">

        <h2 class="font-family mt-3 mb-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Adicionados Recentemente</h2>
          <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
              <div class="h-56 w-full">
                <a href="#">
                  <img class="mx-auto h-full dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/iphone-light.svg" alt="" />
                  <img class="mx-auto hidden h-full dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/iphone-dark.svg" alt="" />
                </a>
              </div>
      
              <div class="pt-6">
        
      
                <a href="#" class="font-family text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Apple iPhone 15 Pro Max</a>
      
                <div class="mt-2 flex items-center gap-2">
                  <div class="flex items-center">
                    <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                    </svg>
      
                    <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                    </svg>
      
                    <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                    </svg>
      
                    <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                    </svg>
      
                    <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                    </svg>
                  </div>
      
                  <p class="text-sm font-medium text-gray-900 dark:text-white">4.9</p>
                  <p class="text-sm font-medium text-gray-500 dark:text-gray-400">(1,233)</p>
                </div>
      
                <ul class="mt-2 flex items-center gap-4">
                  <li class="flex items-center gap-2">
                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m7.171 12.906-2.153 6.411 2.672-.89 1.568 2.34 1.825-5.183m5.73-2.678 2.154 6.411-2.673-.89-1.568 2.34-1.825-5.183M9.165 4.3c.58.068 1.153-.17 1.515-.628a1.681 1.681 0 0 1 2.64 0 1.68 1.68 0 0 0 1.515.628 1.681 1.681 0 0 1 1.866 1.866c-.068.58.17 1.154.628 1.516a1.681 1.681 0 0 1 0 2.639 1.682 1.682 0 0 0-.628 1.515 1.681 1.681 0 0 1-1.866 1.866 1.681 1.681 0 0 0-1.516.628 1.681 1.681 0 0 1-2.639 0 1.681 1.681 0 0 0-1.515-.628 1.681 1.681 0 0 1-1.867-1.866 1.681 1.681 0 0 0-.627-1.515 1.681 1.681 0 0 1 0-2.64c.458-.361.696-.935.627-1.515A1.681 1.681 0 0 1 9.165 4.3ZM14 9a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"
                      />
                    </svg>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Best Seller</p>
                  </li>
      
                  <li class="flex items-center gap-2">
                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                    </svg>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Best Price</p>
                  </li>
                </ul>
      
                <div class="mt-4 flex items-center justify-between gap-4">
                  <p class="font-family text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">R$5,500</p>
      
                  <button type="button" class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                    </svg>
                    Add to cart
                  </button>
                </div>
              </div>
            </div>
          </div>
          
        </div>
       
      </section>
</div>
