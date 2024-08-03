<?php

namespace App\Livewire\Admin;

use App\Models\AddProduct;
use Livewire\Component;

class UploadProduct extends Component
{
    public $add_products;
    public $user;

    public function inStock($id)
    {
        $productData = AddProduct::where("id", "$id")->get()->first();
        $user = $this->user;

        if ($productData->soldInStock == 1) {
            session()->flash('error', 'Product declared inStock already');

            return redirect()->route('admin_editUser', [$user->id]);
        }

        if ($productData) {
            AddProduct::where("id", "$id")->update([
                "soldInStock" => 1,
            ]);
            session()->flash('success', 'Product declared inStock');

            return redirect()->route('admin_editUser', [$user->id]);
        }
        session()->flash('error', 'An error occurred try again later');

        return redirect()->route('admin_editUser', [$user->id]);
    }

    public function soldOut($id)
    {
        $productData = AddProduct::where("id", "$id")->get()->first();
        $user = $this->user;

        if ($productData->soldInStock == 2) {
            session()->flash('error', 'Product declared sold out already');

            return redirect()->route('admin_editUser', [$user->id]);
        }

        if ($productData) {
            AddProduct::where("id", "$id")->update([
                "soldInStock" => 2,
            ]);
            session()->flash('success', 'Product declared Sold Out');

            return redirect()->route('admin_editUser', [$user->id]);
        }
        session()->flash('error', 'An error occurred try again later');

        return redirect()->route('admin_editUser', [$user->id]);
    }

    public function delete($id)
    {
        $user = $this->user;
        // Retrieve the product by its ID
        $productData = AddProduct::findOrFail($id);

        // Delete the product
        $productData->delete();

        session()->flash('success', 'Product Deleted');

        return redirect()->route('admin_editUser', [$user->id]);
    }
    public function render()
    {
        return view('livewire.admin.upload-product');
    }
}
