<?php
namespace App\Http\Controllers\API;
use App\Models\Preparat;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Ramsey\Uuid\Rfc4122\Validator;
class PreparatController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Preparat::all();
        return $this->sendResponse($products->toArray(), 'Products retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'content' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $product = Preparat::create($input);
        return $this->sendResponse($product->toArray(), 'Product created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Preparat::find($id);
        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
        return $this->sendResponse($product->toArray(), 'Product retrieved successfully.');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preparat $product)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'content' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $product->name = $input['name'];
        $product->content = $input['content'];
        $product->save();
        return $this->sendResponse($product->toArray(), 'Product updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preparat $product)
    {
        $product->delete();
        return $this->sendResponse($product->toArray(), 'Product deleted successfully.');
    }
}
