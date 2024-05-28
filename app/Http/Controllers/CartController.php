<?php

namespace App\Http\Controllers;

use App\Services\UtilitarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Session;

class CartController extends Controller
{
    private $proxy = [
        /* 'http'  => 'http://proxy.jupiter.co.ao:3128',
        'https' => 'http://proxy.jupiter.co.ao:3128', */
        'no'    => ['localhost', '127.0.0.1'], // Hosts que não devem usar o proxy
    ];
    private $api = 'https://fnx.ao/wp-json/wc/v3/';
    private $consumer_key = 'ck_bbcc18e176c8ac191e3b3a17580e3b712104f8a1';
    private $consumer_secret = 'cs_f92f47e3020fda9e7fed62da9a1c6b860824f96d';

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
            if(isset($request->via)){
                if(isset($request->action) && $request->action == '+'){
                    $cart[$product['product_id']]['quantity']++;
                }else{
                    $cart[$product['product_id']]['quantity']--;
                }
            }else{
                $cart[$product['product_id']]['quantity']++;
            }
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

    public function processCheckout(Request $request)
    {
        $this->authorize('REGISTAR DOAÇÃO');

        $cart = session()->get('cart', []);
        $line_items = [];
        foreach ($cart as $item) {
            if (!empty($item)) {
                $line_items[] = [
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity']
                ];
            }
        }
        $order_data = array(
            'customer_id' => 0, // ID do cliente
            'payment_method' => 'bacs',
            'payment_method_title' => 'Transferência Bancária',
            'set_paid' => false, // Define como pago automaticamente
            'billing' => array(
                'first_name' => UtilitarioService::getPrimeiroNome(Auth::user()->name),
                'last_name' => UtilitarioService::getSobreNome(Auth::user()->name),
                'email' => Auth::user()->email,
                'phone' => Auth::user()->telefone
            ), 
            'shipping' => array(
                'first_name' => $request->first_name, 
                'last_name' =>  $request->last_name, 
                'address_1' => $request->address_1, 
                'city' => $request->city, 
                'state' => $request->address_1, 
                'postcode' => $request->address_1, 
                'country' => $request->country ,
                'phone' => $request->phone 
            ),
            'line_items' =>  $line_items
        ); 
        try {
            $response = Http::withOptions([
                'proxy' => $this->proxy
            ])->withHeaders([
                'Authorization' => 'Basic ' . base64_encode($this->consumer_key . ':' . $this->consumer_secret),
                'Content-Type' => 'application/json'
            ])->post($this->api . 'orders', $order_data);
            //])->delete($this->api . 'orders/15739');

            if ($response->successful()) {
                $order = $response->json();
                session()->forget('cart');
                session()->flash('mensagem', ' Encomenda realizada com sucesso!');
                return redirect()->route('shop');
            } else {
                $statusCode = $response->status();
                $errorBody = $response->body();
                return  response()->json("Erro ao criar o pedido. Código de Status: $statusCode. Mensagem: $errorBody");
            }
        } catch (\Exception $e) {
            return "Erro ao criar o pedido: " . $e->getMessage();
        } 

        return "PEDIDO EFECTUADO COM SUCESSO";
    }
}
