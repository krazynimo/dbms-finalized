<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('search')}}" method="GET">
    <div class="form-group">
        <label for="customers">Customers Fields</label>
        <select name="customers" id="customers" class="form-control">
            <option value="">Select</option>
            @foreach($customers_attributes as $attribute)
                <option value="{{$attribute}}">{{$attribute}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="employees">employee Name Field Name</label>
        <select name="employees" id="employees" class="form-control">
            <option value="">Select</option>
            @foreach($employees_attributes as $attribute)
                <option value="{{$attribute}}">{{$attribute}}</option>
            @endforeach
        </select>
    </div>

        <div class="form-group">
        <label for="offices">offices Name Field Name</label>
        <select name="offices" id="offices" class="form-control">
            <option value="">Select</option>
            @foreach($offices_attributes as $attribute)
                <option value="{{$attribute}}">{{$attribute}}</option>
            @endforeach
        </select>
    </div>

            <div class="form-group">
        <label for="orderdetails">orderdetails Field Name</label>
        <select name="orderdetails" id="offices" class="form-control">
            <option value="">Select</option>
            @foreach($orderdetails_attributes as $attribute)
                <option value="{{$attribute}}">{{$attribute}}</option>
            @endforeach
        </select>
    </div>

            <div class="form-group">
        <label for="orders">orders Field Name</label>
        <select name="orders" id="offices" class="form-control">
            <option value="">Select</option>
            @foreach($customers_attributes as $attribute)
                <option value="{{$attribute}}">{{$attribute}}</option>
            @endforeach
        </select>
    </div>

            <div class="form-group">
        <label for="payments">payments Field Name</label>
        <select name="payments" id="offices" class="form-control">
            <option value="">Select</option>
            @foreach($customers_attributes as $attribute)
                <option value="{{$attribute}}">{{$attribute}}</option>
            @endforeach
        </select>
    </div>

            <div class="form-group">
        <label for="productslines">productslines Field Name</label>
        <select name="productslines" id="offices" class="form-control">
            <option value="">Select</option>
            @foreach($customers_attributes as $attribute)
                <option value="{{$attribute}}">{{$attribute}}</option>
            @endforeach
        </select>
    </div>
            <div class="form-group">
        <label for="products">products Field Name</label>
        <select name="products" id="offices" class="form-control">
            <option value="">Select</option>
            @foreach($customers_attributes as $attribute)
                <option value="{{$attribute}}">{{$attribute}}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="select_option">Additional Select Options</label>
        <select name="select_option" id="select_option" class="form-control">
            <option value="">Select</option>
            <option value="less_than">Less Than</option>
            <option value="greater_than">Greater Than</option>
            <option value="sum">Sum</option>
            <option value="average">Average</option>
        </select>
    </div>
    <div class="form-group">
        <label for="value">Value</label>
        <input type="number" name="value" id="value" class="form-control">
    </div>
    <div class="form-group">
        <label for="date_filter">Date Filter</label>
        <select name="date_filter" id="date_filter" class="form-control">
            <option value="">Select</option>
            <option value="from">From</option>
            <option value="to">To</option>
            <option value="between">Between</option>
        </select>
    </div>
    <div class="form-group">
        <label for="from_date">From Date</label>
        <input type="date" name="from_date" id="from_date" class="form-control">
    </div>
    <div class="form-group">
        <label for="to_date">To Date</label>
        <input type="date" name="to_date" id="to_date" class="form-control">
    </div>
    <div class="form-group">
        <label for="fields">Fields to be shown in output table</label>
        <div class="checkbox">
            @foreach($customers_attributes as $attribute)
                <label><input type="checkbox" name="fields[]" value="{{$attribute}}"> {{$attribute}}</label>
            @endforeach
        </div>
    </div>
    <div class="form-group">
        <label for="group_by">Group By</label>
        <input type="text" name="group_by" id="group_by" class="form-control">
</div>
<div class="form-group">
<label for="having">Having</label>
<input type="text" name="having" id="having" class="form-control">
</div>
<div class="form-group">
<label for="limit">Limit</label>
<input type="number" name="limit" id="limit" class="form-control">
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Search</button>
</div>

</form>
</body>
</html>