<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepository;
use App\Repositories\ProductStoreRepository;

class ProductController extends Controller
{
    protected $productRepository;
    protected $product_store;

    public function __construct(ProductRepository $productRepository, ProductStoreRepository $product_store)
    {
        $this->productRepository = $productRepository;
        $this->product_store = $product_store;
    }

    public function index()
    {
        $product = $this->productRepository->getAll();
        return view('products.index', compact('product'));
    }

    public function show($id)
    {
        $product_store= $this->product_store->getAllPublished();
        return view('products.show', compact('product_store', 'id'));
    }

    public function create()
    {
        return view('products.add');
    }

    public function store(ProductRequest $request)
    {
        $data =$this->productRepository->create($request->all());
        if ($data) {
            return redirect(route('product.index'))->with('status', 'Thêm san pham thành công!');
        } else {
            return redirect()->back()->with('error', 'Thêm san pham không thành công!');
        }
    }

    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        return view('products.add', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $result = $this->productRepository->find($id);
        if ($result) {
            $data = $result->update($request->all());
            if ($data) {
                return redirect(route('product.index'))->with('status', 'Sửa sản phẩm thành công!');
            } else {
                return redirect()->back()->with('error', 'Sửa sản phẩm không thành công!');
            }
        }
        return redirect()->back()->with('error', 'Không tồn tại sản phẩm này!');
    }
}
