<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HistoryRequest;
use App\Repositories\HistoryStoreRepository;
use App\Repositories\ProductStoreRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\StorehouseRepository;

class HistoryStoreController extends Controller
{
    protected $historyRepository;

    protected $product_store;

    protected $product;

    protected $storeRepository;

    public function __construct(
        HistoryStoreRepository $historyRepository,
        ProductStoreRepository $product_store,
        ProductRepository $product,
        StorehouseRepository $storeRepository
    ) {
        $this->historyRepository = $historyRepository;
        $this->product_store = $product_store;
        $this->product = $product;
        $this->storeRepository = $storeRepository;
    }

    public function index()
    {
        $store = $this->storeRepository->get('user_id', Auth::id());
        return view('history.index', compact('store'));
    }

    public function show($id)
    {
        $history = $this->historyRepository->get('store_id', $id);
        return view('history.show', compact('history', 'id'));
    }

    public function create()
    {
        return view('history.add');
    }

    public function nhapProduct($type, $amount, $store, $product)
    {
        foreach ($amount as $keyAmount => $valueAmount) {
            $data_his = [
                'amount' => $valueAmount,
                'store_id' => $store,
                'product_id' => $product[$keyAmount],
                'type' => $type,
            ];
            $data_history = $this->historyRepository->create($data_his);
            $data_product_store = $this->product_store->find(
                [
                    'product_id' => $product[$keyAmount],
                    'store_id' => $store
                ]
            );
            if (!$data_product_store->isEmpty()) {
                foreach ($data_product_store as $item) {
                    $amount_old = $item->amount;
                    $id = $item->id;
                }
                $sum_amount = $amount_old + $valueAmount;

                $data = [
                    'amount' => $sum_amount,
                    'store_id' => $store,
                    'product_id' => $product[$keyAmount],
                ];
                $update_product_store = $this->product_store->find($id);
                $data_pro_sto = $update_product_store->update($data);
            } else {
                $data = [
                    'amount' => $valueAmount,
                    'store_id' => $store,
                    'product_id' => $product[$keyAmount]
                ];
                $data_pro_sto = $this->product_store->create($data);
            }
            return response()->json(['subscribe success']);
        }
    }

    public function xuatProduct($type, $amount, $store, $product)
    {
        foreach ($amount as $keyAmount => $valueAmount) {
            $data_his = [
                'amount' => $valueAmount,
                'store_id' => $store,
                'product_id' => $product[$keyAmount],
                'type' => $type,
            ];
            $data_product_store = $this->product_store->find(
                [
                    'product_id' => $product[$keyAmount],
                    'store_id' => $store
                ]
            );
            if ($data_product_store->isEmpty()) {
                return redirect()->back()->with(
                    'error',
                    "Không có $product[$keyAmount] trong kho $valueStore!"
                );
            } else {
                foreach ($data_product_store as $item) {
                    $amount_old = $item->amount;
                    $id = $item->id;
                }
                if ($amount_old >= $valueAmount) {
                    $data_history = $this->historyRepository->create($data_his);
                    $sum_amount = $amount_old - $valueAmount;
                    $data = [
                        'amount' => $sum_amount,
                        'store_id' =>$store,
                        'product_id' => $product[$keyAmount]
                    ];
                    $update_product_store = $this->product_store->find($id);
                    $data_pro_sto = $update_product_store->update($data);
                    $errors = "thanh cong";
                } else {
                    $errors =  "Sản phẩm $valueProduct trong $valueStore lớn hơn số lượng hiện có !";
                }
                return $errors;
            }
        }
    }

    public function store(HistoryRequest $request)
    {
        if ($request->type == 1) {
            $data = $this->nhapProduct($request->type, $request->amount, $request->store_id, $request->product_id);
        } else {
            $data = $this->xuatProduct($request->type, $request->amount, $request->store_id, $request->product_id);
        }
        if ($data) {
            return redirect(route('history.index'));
        } else {
            return redirect(route('history.index'))->with('error', 'không thực hiện được');
        }
    }
}
