<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use App\Models\Product;

class ProductStockRule implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $products = array_filter($value);
        if (count($products) == 0) {
            $fail('Please select at least one product');
        }

        $DBProducts = Product::find(array_keys($products))->keyBy('id');
        $errorText = '';

        foreach($products as $id => $quantity) {
            // check stocks
            $stocks = $DBProducts[$id]['stocks'];

            if ($stocks < $quantity) {
                $errorText .= 'Sorry, we only have ' .$stocks . ' left in stock.';
            }
        }

        if ($errorText != '') {
            $fail($errorText);
        }
    }
}
