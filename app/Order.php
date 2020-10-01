<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id', 'fulfillments', 'shipping_address', 'financial_status'];

    public function getFulFillmentStatAttribute() {

        $fulfillment = $this->fulfillment_status;

        if($fulfillment == null) {
            return 'unfulfilled';
        }
	else{
	    return $fulfillment;
	}
     }

    public function getTrackingAttribute() {
        $fulfillment = json_decode($this->fulfillments);


        return $fulfillment[0]->tracking_number ;
    }

    public function getAddressAttribute() {
        $address = json_decode($this->shipping_address);

        return $address->address1;

    }

    public function getCityAttribute() {
        $address = json_decode($this->shipping_address);

        return $address->city;

    }

    public function getEmailAttribute() {
        $address = json_decode($this->customer);

        return $address->email;

    }


    public function getProvinceAttribute() {
        $address = json_decode($this->shipping_address);

        return $address->province;

    }

    public function getZipAttribute() {
        $address = json_decode($this->shipping_address);

        return $address->zip;

    }

    public function getCountryAttribute() {
        $address = json_decode($this->shipping_address);

        return $address->country;
    }

    public function getPhoneAttribute() {
        $address = json_decode($this->shipping_address);

        return $address->phone;
    }

    public function getNameAttribute() {
        $address = json_decode($this->shipping_address);

        return $address->first_name.' '.$address->last_name;
    }

    public function getFIdAttribute() {
	
	$First = "(";
	$Second = ")";

	$Firstpos=strpos($this->frugo_id, $First);
	$Secondpos=strpos($this->frugo_id, $Second);

	$id = substr($this->frugo_id , $Firstpos, $Secondpos);
	return $id;
    }

public function getlineItemsCountAttribute() {
        $line_item_obj = json_decode($this->line_items);

        $line_items_count = count($line_item_obj);

        return $line_items_count;
    }

    public function getLineItemDetailsAttribute() {
        $line_item_obj = json_decode($this->line_items);


        foreach ($line_item_obj as $item) {

           
            echo "
             <tr>
                <td class='d-flex align-items-center'>
                    <div class='ml-2'>
                        <span class=\"d-block\">$item->title</span>
                        <span class=\"d-block\">$item->variant_title</span>
                        <span class=\"d-block\">$item->sku</span>
                    </div>
                </td>

                <td>
                    <span class=\"d-block\">$$item->price x $item->quantity</span>
                </td>

                <td>
                    <span class=\"d-block\">$".number_format($item->price * $item->quantity, 2)."</span>
                </td>
            </tr>
            ";
        }

    }

    public function getDateAttribute() {
        $str = $this->order_date;
        $date = strtotime($str);
        return date('d/M/Y h:i:s', $date);
    }

    public function getShippingFeeAttribute() {
	$fee = json_decode($this->shipping_price);
	return $fee->shop_money->amount;
    }

}
