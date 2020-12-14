
@extends('layouts.user')


@section('content')


    <div class="grid_10">

        <div class="box round first grid">
            <h2>Add New Product</h2>
            <div class="block copyblock">
                <form action="{{url('productSave')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <table class="form" >
                        <tr>
                            <td>
                                <label>Product Code</label>
                            </td>
                            <td>
                                <input type="text" name="product_code" placeholder="Product Code" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Name</label>
                            </td>
                            <td>
                                <input type="text" name="product_name" placeholder="Product  Name" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Unit</label>
                            </td>
                            <td>
                                <input name="product_unit" type="text" placeholder="Unit" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit"  Value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>

            </div>
        </div>
    </div>



@endsection




















