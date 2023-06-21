<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Product\ProductIndexRequest;
use App\Http\Requests\API\V1\Product\ProductStoreRequest;
use App\Http\Requests\API\V1\Product\ProductUpdateRequest;
use App\Http\Resources\API\V1\Product\ProductIndexResource;
use App\Http\Resources\API\V1\Product\ProductShowResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  ProductIndexRequest  $request
     * @return AnonymousResourceCollection
     */
    public function index(ProductIndexRequest $request)
    {
        $products = $request->user()->products();

        $products->search($request->searchFields());

        return ProductIndexResource::collection($products->paginate(perPage: $request->perPage, page: $request->page));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductStoreRequest  $request
     * @return ProductShowResource
     */
    public function store(ProductStoreRequest $request)
    {
        $product = $request->user()->products()->create($request->validated());

        return new ProductShowResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return ProductShowResource
     */
    public function show(Product $product)
    {
        return new ProductShowResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest  $request
     * @param  Product  $product
     * @return ProductShowResource
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->validated());

        return new ProductShowResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     *
     * @throws \Throwable
     */
    public function destroy(Product $product)
    {
        $product->deleteOrFail();

        return \response()->noContent();
    }
}
