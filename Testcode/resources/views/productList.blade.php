
@extends('layouts.user')
<script>
    var proList=[];
    var price= 0;
    var quantity= 0;
    var Amount=0;
</script>

@section('content')


    <div class="grid_10">
        <div class="box round first grid">
            <h2>Product List</h2>
            <div class="block">
                <table class="data display datatable" id="example">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($listProdcuts))
                        @foreach($listProdcuts as $listP)
                    <tr class="odd gradeX">
                        <td>{{$listP->product_name}}</td>
                            <td>
                            <span class="checkbox">
                            <input type="checkbox" name="productId" id="productId" onchange='productSelection(this);' value="{{$listP->id}}">
                            <span class="checkbox-value" aria-hidden="true"></span>
                            </span>
                            </td>
                    </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="grid_10" >
        <div class="box round first grid">
            <h2>Product Details List</h2>
            <div class="block">
                <table class="data display datatable" id="example">
                    <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>price</th>
                        <th>Item Total</th>
                    </tr>
                    </thead>
                    <tbody id="calculationOfTableForProduct" >
{{--                    @if(!empty($listProdcuts))--}}
{{--                        @foreach($listProdcuts as $listP)--}}
{{--                            <tr class="odd gradeX">--}}
{{--                                <td>{{$listP->product_code}}</td>--}}
{{--                                <td>{{$listP->product_name}}</td>--}}
{{--                                <td>{{$listP->unit}}</td>--}}
{{--                                <td><input type="number" name="quantity"></td>--}}
{{--                                <td><input type="number" name="price"></td>--}}
{{--                                <td></td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script>




    function productQuantity(quanV,quantId){

        var quanV=quanV;
        var quantId=quantId;

        console.log(quanV);
        console.log(quantId);
        price= $('#price').val();


        Amount= quanV*price;
        console.log(Amount);
        document.getElementById('totalAmount').innerHTML =Amount;


    }
    function productPrice(quanP,quantId){

        var quanP=quanP;
        var quantId=quantId;
        quantity= $('#quantity').val();
        console.log(quanP);
        console.log(quantId);

        Amount= quanP*price;
        console.log(Amount);
        document.getElementById('totalAmount').innerHTML =Amount;


    }
    function  productSelection(checkbox){

        if(checkbox.checked==true){
            proList.push(checkbox.value);
        }else {
            const index = proList.indexOf(checkbox.value);
            if (index > -1) {
                proList.splice(index, 1);
            }
        }
       // console.log(proList);


        $.ajax({
            type: "GET",
            async: false,
            url: "particularProduct",
            dataType: "json",
            data: {proListId:proList},
            success: function (data) {
                $('#calculationOfTableForProduct').html(data.calculationOfTableForProduct);
                 //console.log("output", data.calculationOfTableForProduct);
                return false;
            },
            error: function (data) {
                console.log("error", data);

            }
        });


    }


</script>

@endsection




















