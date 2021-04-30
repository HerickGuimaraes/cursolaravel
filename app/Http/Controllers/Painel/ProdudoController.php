<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\ProductFormRequest;
use Illuminate\Http\Request;
use App\Models\Painel\Product;

class ProdudoController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Lista de produtos';

        $products = $this->product::all();

        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Cadastrar novo produto';

        $categorys = ['eletronicos', 'banho', 'pet', 'mercearia'];
        return view('painel.products.create', compact('title', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        //dados dos formularios
        $dataForm = $request->except('_token');

        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        //valida dados
        //$this->validate($request, $this->product->rules);
        /*$messages=[
            'name.required'=>'O campo nome é de preenchimento obrigatório',
            'number.numeric'=>'precisar ser apenas numeros',
            'number.required'=>'O campo número é de preenchimento obrigatório'
        ];
        $this->validate($request, $this->product->rules, $messages);*/
        //FAzer cadastro
        $insert = $this->product->create($dataForm);
        if ($insert)
        return redirect(route('index'));
        else
        return redirect()->route('produtos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "visulizar produto {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::where('id', $id)->first();

        $categorys = ['eletronicos', 'banho', 'pet', 'mercearia'];
        return view('painel.products.create', compact('categorys', 'product'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        $dataForm = $request->all();

        $product = $this->product->find($id);

        $dataForm['active'] = (isset ($dataForm['active']) ? 0 : 1);

        $update = $product->update($dataForm);

        if($update)
            return redirect(route('index'));
        else
            return redirect(route('product.edit', $id))->with(['errors'=>'Falha!!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function teste()
    {
      /* $insert = $this->product->create([
            'name' => 'nome do produto 2',
            'number' => 987654,
            'active' => false,
            'category' =>'eletronicos',
            'descrition' => 'Descrição do produto',
            ]);
        if($insert)
            return 'Inserido com sucesso';
        else
            return 'Falha!!!';
    }*/

    /*$prod = $this->product::where('name','nome do produto 2')->first();
    $prod->products_table='produto2';
    $prod->save();*/
    /*
    $prod = $this->product->find(2);
    $prod->name = 'update';
    $prod->number = 789654;
    $prod->active = true;
    $prod->category ='eletronicos';
    $prod->descrition = 'Dedc do produto';
    $update = $prod->save();

    if($update)
        return 'Valor alterado';
    else
        return 'Não alterado';*/

    /*$prod = $this->product->find(2);
    $update = $prod->update([
        'name' => 'nome do produto 2',
        'number' => 987654,
        'category' =>'eletronicos',
        'descrition' => 'Descrição do produto',
        ]);
    if($update)
        return 'Valor alterado';
    else
        return 'Não alterado';*/

    $update = $this->product
                    ->where('number',123321123)
                    ->update([
                                'name' => 'nome do produto 4',
                                'number' => 98799999,
                                'category' =>'eletronicos',
                                'descrition' => 'Descrição do produto',
        ]);
    if($update)
        return 'Valor alterado 2';
    else
        return 'Não alterado 2';
    }
}
