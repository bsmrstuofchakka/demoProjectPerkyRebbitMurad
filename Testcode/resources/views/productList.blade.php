
@extends('layouts.user')
<script>
    var proList=[];
    // var price= 1;
    // var quantity= 1;
    var Amount=1;
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
    var sumAmountTotalEle =[];


    function productQuantity(quan,pId){

        var quan=quan;
        // var pId=pId;
        var sumAmountTotal =0;

        //price= $('.price').val();
        var price= $('#price'+pId).val();
        // console.log(price);
        if(!quan){
            quan=1;
        }
        if(!price){
            price=1;
        }

        console.log("pId "+pId);
        console.log("quantity "+quan);
        console.log("price "+price);

        Amount= quan*price;
        console.log("Amount "+Amount);
        // document.getElementsByClassName('.totalAmount') =Amount;
        $('#totalAmount'+pId).html(Amount);
        sumAmountTotalEle[pId]=Amount;
        console.log('totalA: '+sumAmountTotalEle.length);
        for(var n=1;n<sumAmountTotalEle.length;n++){
            if(!sumAmountTotalEle[n]){
                sumAmountTotalEle[n]=0
            }else{
                sumAmountTotal=sumAmountTotal+sumAmountTotalEle[n];
            }

        }
        var tax = sumAmountTotal*(15/100);
        var discount = 100;
        var grand_total = sumAmountTotal+tax+discount;
        console.log('sumAmountTotal '+sumAmountTotal);
        $('#subTotal').html(sumAmountTotal);
        $('#tax').html(tax);
        $('#discount').html(discount);
        $('#grand_total').html(grand_total);


    }
    function productPrice(pri,pId){
        var sumAmountTotal =0;
        var pri=pri;
        // var pId=pId;
        //quantity= $('.quantity').val();
        var quantity=$('#quantity'+pId).val();
        if(!pri){
            pri=1;
        }
        if (!quantity){
            quantity=1;
        }

        console.log("pId "+pId);
        console.log("quantity "+quantity);
        console.log("price "+pri);


        Amount= pri*quantity;
        console.log("Amount "+Amount);
        // document.getElementsByName('totalAmount').innerHTML =Amount;
        $('#totalAmount'+pId).html(Amount);
        sumAmountTotalEle[pId]=Amount;
        console.log('totalA: '+sumAmountTotalEle.length);
        for(var n=1;n<sumAmountTotalEle.length;n++){
            sumAmountTotal=sumAmountTotal+sumAmountTotalEle[n];
        }
        var tax = sumAmountTotal*(15/100);
        var discount = 100;
        var grand_total = sumAmountTotal+tax+discount;
        console.log('sumAmountTotal '+sumAmountTotal);
        $('#subTotal').html(sumAmountTotal);
        $('#tax').html(tax);
        $('#discount').html(discount);
        $('#grand_total').html(grand_total);

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
