<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\categorys;
use App\Models\Products as Product;
use Carbon\Carbon;

class Products extends Component
{
    public string $categoryid;
    public $products;
    public $productscount;

    public function mount($id = null)
    {
        // se for diferente de nulo
        if ($id) {
            $this->categoryid = $id;
            $this->products = Product::orderBy('created_at', 'desc')
            ->where('category_id', $id)
            ->get();
            $this->productscount = Product::where('category_id', $id)->count();
        } else {
            $this->products = Product::orderBy('created_at', 'desc')
            ->get();
            $this->productscount = Product::count();
        }
        
    }

    public function SevenDaysVerify($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return false; // Retorna falso se o produto não for encontrado
        }
    
        $date = Carbon::parse($product->created_at);
        $sevenDaysAgo = Carbon::now()->subDays(7);
    
        // Verifica se a data de criação é maior ou igual à data de 7 dias atrás
        return $date->greaterThanOrEqualTo($sevenDaysAgo);
    }    

    public function render()
    {
        $categories = categorys::all();

        return view('livewire.products', [
            'categories' => $categories,
            'products' => $this->products,
            'productscount' => $this->productscount,
        ]);
    }
}
