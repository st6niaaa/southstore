<div class="font-family p-2">
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-2xl font-bold text-blue-700 mb-3">Produtos</h1>
        <a href="{{ route('admin.products.create')}}"><button class="text-sm bg-blue-600 border border-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md">Novo Produto</button></a>
    </div>
    <div class="relative overflow-x-auto rounded-md">
        <input wire:model.lazy="search" type="text" placeholder="Pesquise aqui" name="search" id="search" class="px-3 rounded-md border-0 py-1.5 mb-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome do Produto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Preço
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Valor Pago
                    </th>
                    <th scope="col" class="px-6 py-3">
                        IMEI
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Criado em
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $product->id  }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $product->name  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->category_id  }}
                    </td>
                    <td class="px-6 py-4">
                        R${{ $product->price  }}
                    </td>
                    <td class="px-6 py-4">
                        R${{ $product->bought_value  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->imei  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->created_at->format('d/m/Y')  }}
                    </td>
                    <td class="px-6 py-4">
                      <button wire:click="deleteProduct({{ $product->id }})">
                          <i class="fa fa-trash text-red-500"></i>
                      </button>
                      <a href="{{  route('admin.products.edit', $product->id) }}"><button class="">
                          <i class="fa fa-pen text-blue-500"></i>
                      </button></a>
                      <a href="{{  route('admin.products.threedview', $product->id) }}"><button class="">
                          <i class="fa-brands fa-unity text-green-500"></i>
                      </button></a>
                      <a href="{{  route('admin.products.photos', $product->id) }}"><button class="">
                          <i class="fa-solid fa-file-image text-indigo-500"></i>
                      </button></a>
                      <a href="{{  route('sales.create', $product->id) }}"><button class="">
                          <i class="fa fa-wallet text-yellow-500"></i>
                      </button></a>
                    </td>
                </tr>
             
                @endforeach

          
                @if ($products->hasPages())
                    <tr class="bg-white"> 
                        <td colspan="10" class="py-1 px-3 text-center">
                            {{ $products->links() }} 
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>