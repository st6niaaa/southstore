<style>
  .hero {
      position: relative;
      height: 600px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-size: cover;
      background-position: center;
  }

  .hero-overlay {
      position: absolute;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.4); /* Black overlay with 70% opacity */
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
    <div class="hero-content flex w-full justify-between"> 
        <button id="prevButton" class="font-family text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-arrow-left"></i></button>
        <button id="nextButton" class="font-family text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
</section>
<script>
  const heroSection = document.getElementById('heroSection');
  const heroTitle = document.getElementById('heroTitle');
  const heroText = document.getElementById('heroText');
  const prevButton = document.getElementById('prevButton');
  const nextButton = document.getElementById('nextButton');

  // Fetch hero data from Livewire
  const heroData = @json($heroes); 

  let currentIndex = 0;
  let interval;

  function updateHero() {
      const currentHero = heroData[currentIndex];
      heroSection.style.backgroundImage = `url(${currentHero.image_url})`;
      heroTitle.innerText = currentHero.title;
      heroText.innerText = currentHero.description;
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
      interval = setInterval(nextHero, 6000);
  }

  interval = setInterval(nextHero, 6000); // Change every 3 seconds
  updateHero(); // Initial call
</script>

    <section class="bg-gray-50 py-8 antialiased md:py-12">
      
      <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h2 class="font-family mt-3 mb-3 text-xl font-semibold text-gray-900 sm:text-2xl">Produtos Adicionados Recentemente</h2>
          <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
                      <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
                        <a href="{{ Route('PV', $product->id) }}">
                          <div class="h-56 w-full">
                            @if (file_exists(public_path('img/products/' . $product->id . '/5.png')))
                                <img class="mx-auto h-full" src="{{ asset('img/products/' . $product->id . '/5.png') }}" alt="" />
                            @else
                                <img class="mx-auto h-full" src="{{ $product->image_url }}" alt="" />
                            @endif
                          </div>
                  
                          <div class="pt-6">
                            <a class="font-family text-lg font-semibold leading-tight text-gray-900">{{ $product->name }}</a>

                            <div class="mt-2 flex items-center justify-between gap-4">
                              <p class="font-family text-2xl font-extrabold leading-tight text-gray-900">R${{ $product->price }}</p>
                           
                            </div> 
                            <a href="{{ Route('PV', $product->id) }}"><button type="button" class="mt-3 w-full text-center items-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-primary-300">
                              Comprar
                            </button></a>
                          </div>
                        </div>
                      </a>
              @endforeach
          </div>
          
      </div>

      <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h2 class="font-family mt-3 mb-3 text-xl font-semibold text-gray-900 sm:text-2xl">Avaliações</h2>
          <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

          @foreach ($reviews as $review)
              <div class="max-w-sm font-family p-6 bg-white border border-gray-200 rounded-lg shadow">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 ">{{ $review->reviewer_name }}</h5>
                <p class="mb-3 font text-gray-500">{{ $review->reviewer_desc }}</p>
                @if ($review->reviewer_grade == 0)
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <span class="text-md text-gray-500">({{ $review->reviewer_grade }}/10)</span>
                @endif
                @if ($review->reviewer_grade == 1)
                  <i class="fas fa-star-half-stroke text-yellow-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <span class="text-md text-gray-500">({{ $review->reviewer_grade }}/10)</span>
                @endif
                @if ($review->reviewer_grade == 2)
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <span class="text-md text-gray-500">({{ $review->reviewer_grade }}/10)</span>
                @endif
                @if ($review->reviewer_grade == 3)
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star-half-stroke text-yellow-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <span class="text-md text-gray-500">({{ $review->reviewer_grade }}/10)</span>
                @endif
                @if ($review->reviewer_grade == 4)
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <span class="text-md text-gray-500">({{ $review->reviewer_grade }}/10)</span>
                @endif
                @if ($review->reviewer_grade == 5)
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star-half-stroke text-yellow-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <span class="text-md text-gray-500">({{ $review->reviewer_grade }}/10)</span>
                @endif
                @if ($review->reviewer_grade == 6)
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <span class="text-md text-gray-500">({{ $review->reviewer_grade }}/10)</span>
                @endif
                @if ($review->reviewer_grade == 7)
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star-half-stroke text-yellow-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <span class="text-md text-gray-500">({{ $review->reviewer_grade }}/10)</span>
                @endif
                @if ($review->reviewer_grade == 8)
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fa-regular fa-star text-gray-400"></i>
                  <span class="text-md text-gray-500">({{ $review->reviewer_grade }}/10)</span>
                @endif
                @if ($review->reviewer_grade == 9)
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star-half-stroke text-yellow-400"></i>
                  <span class="text-md text-gray-500">({{ $review->reviewer_grade }}/10)</span>
                @endif
                @if ($review->reviewer_grade == 10)
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-yellow-400"></i>
                  <span class="text-md text-gray-500">({{ $review->reviewer_grade }}/10)</span>
                @endif
              </div>
          @endforeach
          </div>
          
        </div>
      </section>
</div>
