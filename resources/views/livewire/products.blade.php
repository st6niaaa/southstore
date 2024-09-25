<div>
    <section class="bg-white ">
        <div class="container px-6 py-8 mx-auto">
            <div class="lg:flex lg:-mx-2">
                <div class="space-y-3 lg:w-1/5 lg:px-2 lg:space-y-4">
                  @foreach ($categories as $category)
                    <a href="#" class="font-family block font-medium text-gray-500 hover:text-blue-600">{{ $category->name }}</a>
                  @endforeach
                </div>

                <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5 ">
                    <div class="flex items-center justify-between text-sm tracking-widest uppercase ">
                        <p class="font-family text-gray-500">6 Items</p>
                        <div class="flex items-center">
                            <p class="font-family text-gray-500">Sort</p>
                            <select class="font-family font-medium text-gray-700 bg-transparent focus:outline-none">
                                <option value="#">Recommended</option>
                                <option value="#">Size</option>
                                <option value="#">Price</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4 mt-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

                  @foreach ($products as $product)
                        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
                            <div class="h-56 w-full">
                              <a href="#">
                                <img class="mx-auto h-full" src="{{ asset('img/i12/7.png') }}" alt="" />
                              </a>
                            </div>
                    
                            <div class="pt-6">
                              <a href="#" class="font-family text-lg font-semibold leading-tight text-gray-900">{{ $product->name }}</a>
                    
                              
                              <ul class="mt-2 flex items-center gap-4">
                                <li class="flex items-center gap-2">
                                  <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path
                                      stroke="currentColor"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="m7.171 12.906-2.153 6.411 2.672-.89 1.568 2.34 1.825-5.183m5.73-2.678 2.154 6.411-2.673-.89-1.568 2.34-1.825-5.183M9.165 4.3c.58.068 1.153-.17 1.515-.628a1.681 1.681 0 0 1 2.64 0 1.68 1.68 0 0 0 1.515.628 1.681 1.681 0 0 1 1.866 1.866c-.068.58.17 1.154.628 1.516a1.681 1.681 0 0 1 0 2.639 1.682 1.682 0 0 0-.628 1.515 1.681 1.681 0 0 1-1.866 1.866 1.681 1.681 0 0 0-1.516.628 1.681 1.681 0 0 1-2.639 0 1.681 1.681 0 0 0-1.515-.628 1.681 1.681 0 0 1-1.867-1.866 1.681 1.681 0 0 0-.627-1.515 1.681 1.681 0 0 1 0-2.64c.458-.361.696-.935.627-1.515A1.681 1.681 0 0 1 9.165 4.3ZM14 9a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"
                                    />
                                  </svg>
                                  <p class="text-sm font-medium text-gray-500">Best Seller</p>
                                </li>
                    
                                <li class="flex items-center gap-2">
                                  <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                  </svg>
                                  <p class="text-sm font-medium text-gray-500">Best Price</p>
                                </li>
                              </ul>
                    
                              <div class="mt-2 flex items-center justify-between gap-4">
                                <p class="font-family text-2xl font-extrabold leading-tight text-gray-900">R${{ $product->price }}</p>
                    
                                <button type="button" class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 ">
                                  <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                  </svg>
                                  Add to cart
                                </button>
                              </div>
                            </div>
                          </div>
                @endforeach
                        </div>
            </div>
        </div>
    </section>
</div>
