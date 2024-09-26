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
                      @if ($productscount == 1)
                      <p class="font-family text-gray-500">{{ $productscount }} Produto</p>
                      @else
                      <p class="font-family text-gray-500">{{ $productscount }} Produtos</p>
                      @endif
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
                          <a href="{{ Route('PV', $product->id) }}">
                            <div class="h-56 w-full">
                                <img class="mx-auto h-full" src="{{ asset('img/i12/7.png') }}" alt="" />
                            </div>
                    
                            <div class="pt-6">
                              <a class="font-family text-lg font-semibold leading-tight text-gray-900">{{ $product->name }}</a>

                              @if ($this->SevenDaysVerify($product->id)) 
                                  <ul class="mt-2 flex items-center gap-4">
                                    <li class="flex items-center gap-2">
                                      <i class="fa fa-plus text-gray-500"></i>
                                      <p class="text-sm font-medium text-gray-500">Adicionado Recentemente!</p>
                                    </li>
                                  </ul>
                              @endif
                             
                    
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
        </div>
    </section>
</div>
