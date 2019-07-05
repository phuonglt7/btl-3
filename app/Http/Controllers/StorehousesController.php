<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storehouse;
use App\Http\Requests\StoreRequest;
use App\Repositories\StorehouseRepository;

class StorehousesController extends Controller
{
    protected $storeRepository;

    public function __construct(StorehouseRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }
    public function index()
    {
        $store = $this->storeRepository->getAll();
        return view('stores.index', compact('store'));
    }

    public function create()
    {
        return view('stores.add');
    }

    public function store(StoreRequest $request)
    {
        $data =$this->storeRepository->create($request->all());
        if ($data) {
            return redirect(route('store.index'))->with('status', 'Thêm kho thành công!');
        } else {
            return redirect()->back()->with('error', 'Thêm kho không thành công!');
        }
    }

    public function edit($id)
    {
        $store = Storehouse::find($id);
        return view('stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $id)
    {
        $data = $request->all();
        $store_data = $this->storeRepository->find($id);
        $store = $store_data->update($data);
        if ($store) {
            return redirect(route('store.index'))->with('status', 'Sửa kho thành công!');
        } else {
            return redirect()->back()->with('error', 'Sửa kho không thành công!');
        }
    }
}
