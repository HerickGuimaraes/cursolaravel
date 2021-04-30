<?php
namespace App\Http\Controllers\Painel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\ProductFormRequest;
use App\Models\Painel\Product;
use Illuminate\Http\Request;

class ProdudoController extends Controller
{
    private $product;
    public function __construct(Product $product)//, User $users)
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
        $title = 'Listagem de produtos';
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
        $title = 'Cadastrar novo produto';
        $product = false;
        $categorys = ['eletronicos', 'banho', 'pet', 'mercearia'];
        return view('painel.products.create', compact('title', 'categorys', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {


        $dataForm = $request->except('_token');
//        dd($dataForm['category']);
//
//        "Escolha a categoria"
//

        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;
        $insert = $this->product->create($dataForm);
        if ($insert)
            return redirect(route('index'));
        else
            return redirect()->route('produtos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "visulizar produto {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $categorys = ['eletronicos', 'banho', 'pet', 'mercearia'];
        $title = "Editar Produto (" . $product->name .")";
        return view('painel.products.create', compact('categorys', 'product', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
        $product = $this->product->findOrFail($id);
        $update = $product->update($dataForm);
        if ($update)
            return redirect(route('index'));
        else
            return redirect(route('product.edit', $id))->with(['errors' => 'Falha!!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
