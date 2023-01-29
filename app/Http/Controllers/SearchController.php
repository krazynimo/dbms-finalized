<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Employees;
use App\Models\Offices;
use App\Models\Orderdetails;
use App\Models\Orders;
use App\Models\Payments;
use App\Models\Productlines;
use App\Models\Products;
use DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $customers_attributes = DB::getSchemaBuilder()->getColumnListing('customers');
        $employees_attributes = DB::getSchemaBuilder()->getColumnListing('employees');
        $offices_attributes = DB::getSchemaBuilder()->getColumnListing('offices');
        $orderdetails_attributes = DB::getSchemaBuilder()->getColumnListing('orderdetails');

        return view('search', [
            'customers_attributes' => $customers_attributes,
            'employees_attributes' => $employees_attributes,
            'offices_attributes' => $offices_attributes,
            'orderdetails_attributes' => $orderdetails_attributes
        ]);
    }
    public function search_result(Request $request)
    {
        $query = Customers::query();

        // Check if the product attribute is selected
        if ($request->has('customers_attribute')) {
            $query->where($request->customers_attribute, $request->customers_value);
        }

        // Check if the customer attribute is selected
        if ($request->has('employees_attribute')) {
            $query->whereHas('employees', function($q) use ($request) {
                $q->where($request->employees_attribute, $request->employees_value);
            });
        }

        // Check if the related model 1 attribute is selected
        if ($request->has('offices_attribute')) {
            $query->whereHas('offices', function($q) use ($request) {
                $q->where($request->offices_attribute, $request->offices_value);
            });
        }

        // Check if the related model 2 attribute is selected
        if ($request->has('orderdetails_attribute')) {
            $query->whereHas('orderdetails', function($q) use ($request) {
                $q->where($request->orderdetails_attribute, $request->orderdetails_value);
            });
        }

              // Check if the related model 2 attribute is selected
        if ($request->has('orders_attribute')) {
            $query->whereHas('orders', function($q) use ($request) {
                $q->where($request->orders_attribute, $request->orders_value);
            });
        }

              // Check if the related model 2 attribute is selected
        if ($request->has('payments_attribute')) {
            $query->whereHas('payments', function($q) use ($request) {
                $q->where($request->payments_attribute, $request->payments_value);
            });
        }

                    // Check if the related model 2 attribute is selected
        if ($request->has('productlines_attribute')) {
            $query->whereHas('productlines', function($q) use ($request) {
                $q->where($request->productlines_attribute, $request->productlines_value);
            });
        }

                    // Check if the related model 2 attribute is selected
        if ($request->has('products_attribute')) {
            $query->whereHas('products', function($q) use ($request) {
                $q->where($request->products_attribute, $request->products_value);
            });
        }


        // Similarly, you can check for the other related models

        // Check if the date filter is selected
        if ($request->has('date_filter')) {
            if ($request->date_filter == 'from') {
                $query->whereDate('created_at', '>=', $request->from_date);
            } else if ($request->date_filter == 'to') {
                $query->whereDate('created_at', '<=', $request->to_date);
            } else if ($request->date_filter == 'between') {
                $query->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }
        }

        // Check if the aggregate function is selected
        if ($request->has('aggregate')) {
            $query->select($request->aggregate, $request->aggregate_attribute);
        }

        // Check if the group by is selected
        if ($request->has('group_by')) {
            $query->groupBy($request->group_by);
        }

        // Check if the having is selected
        if ($request->has('having')) {
            $query->having($request->having);
        }

        // Check if the limit is selected
        if ($request->has('limit')) {
            $query->limit($request->limit);
        }
        // execute the final query
        $results = $query->paginate(10);
        return view('search_result', compact('results'));
    }


}

?>