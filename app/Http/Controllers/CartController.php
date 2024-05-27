<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('portal.doacao.carrinho', compact('cart'));
        //return view('portal.cart.index', compact('cart'));
    }

    public function store(Request $request)
    {

      
        $product = $request->only('product_id', 'name', 'price', 'image');
        $product['quantity'] = 1;

        
        $cart = session()->get('cart', []);
        if (isset($cart[$product['product_id']])) {
            $cart[$product['product_id']]['quantity']++;
        } else {
            $cart[$product['product_id']] = $product;
        }

        session()->put('cart', $cart);
        //session()->flash('mensagem', 'Produto adicionado ao carrinho!');
        if(isset($request->via)){
            return response()->json( 'Produto adicionado ao carrinho!'); ;
        }
        return redirect()->route('cart.index')->with('success', 'Produto adicionado ao carrinho!');
    }

    public function destroy($product_id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produto removido do carrinho!');
    }
}
