<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\ResponseController as ResponseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Products;
use Validator;

class CategoryController extends ResponseController
{

    //product list
    public function getProducts()
    {
        try{
            $product = Products::get();
            if(!empty($product)) {
                $response = [
                    'code' => 200,
                    'message' => 'Products Fetched Successfully',
                    'data' => $product
                ];
                return $this->sendResponse($response);
            }else{
                $response = [
                    'code' => 201,
                    'message' => 'No Products Avalible',
                ];
                return $this->sendResponse($response);
            }
        } catch (\Exception $exception) {
            $response = [
                'code' => 400,
                'message' => 'SomeThing Went Wrong While Fetch Products',
            ];
            return $this->sendError($response,400);
        }
    }
    //release date product
    function getProduct($release_date)
    {
        try{
            $product = Products::where('products.release_date', $release_date)
            ->get();
            if(!empty($product)) {
                $response = [
                    'code' => 200,
                    'message' => 'Product Fetched Successfully',
                    'data' => $product
                ];
                return $this->sendResponse($response);
            }else{
                $response = [
                    'code' => 201,
                    'message' => 'No Product Avalible',
                ];
                return $this->sendResponse($response);
            }
        } catch (\Exception $exception) {
            $response = [
                'code' => 400,
                'message' => 'SomeThing Went Wrong While Fetch Products',
            ];
            return $this->sendError($response,400);
        }
    }
}
