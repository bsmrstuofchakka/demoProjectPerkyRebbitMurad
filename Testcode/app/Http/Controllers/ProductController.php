<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function showProduct(){

        $data['listProdcuts']= ProductModel::all();
        return view('productList',$data);
    }
    public function productAdd(){
        return view('addProduct');
    }
    public function productSave(Request $request){


        //dd($request->all());

        $validator = \Validator::make($request->all(), [
            'product_code' => 'required',
            'product_name' => 'required',
            'product_unit' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = new ProductModel();
        $data->product_code= $request->product_code;
        $data->product_name = $request->product_name;
        $data->product_unit = $request->product_unit;
        $data->save();
        return redirect('/');
    }

    public function particularProduct(Request  $request){
        $proListId= $request->proListId;
        $proList = ProductModel::whereIn('id',$proListId)->get();
        $calculationOfTableForProduct="";

        if(!empty($proList)){
            foreach ($proList as $proL){
                $calculationOfTableForProduct=$calculationOfTableForProduct.'  <tr class="odd gradeX">
                                <td>'.$proL->product_code.'</td>
                                <td>'.$proL->product_name.'</td>
                                <td>'.$proL->product_unit.'</td>
                                <td><input type="number" id="quantity'.$proL->id.'" class="quantity" oninput="productQuantity(this.value,'.$proL->id.');"   name="quantity"></td>
                                <td><input type="number" id="price'.$proL->id.'" class="price" oninput="productPrice(this.value,'.$proL->id.');"   name="price"></td>
                                <td id="totalAmount'.$proL->id.'" ></td>


                            </tr>';

            }
        }
        $calculationOfTableForProduct=$calculationOfTableForProduct.'
            <div>
                <tr style="text-align: center">
                    <td>Sub Total</td>
                    <td id="subTotal"></td>
                </tr>
                 <tr style="text-align: center">
                    <td>Tax(15%)</td>
                    <td id="tax"></td>
                </tr>
                <tr style="text-align: center">
                    <td>Discount</td>
                    <td id="discount"></td>
                </tr>
                 <tr style="text-align: center">
                    <td>Grand Total</td>
                    <td id="grand_total"></td>
                </tr>
                </div>
        ';

        return response()->json(['calculationOfTableForProduct'=>$calculationOfTableForProduct]);
    }

}
