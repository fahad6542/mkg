<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMeta extends Model
{
    use HasFactory;
    protected $fillable = 
    [
    'p_id',
    'total_pages', 
    'product_id',
    'ISBN',
    'author',
    'topic_id',
    'edition',
    'class_id',
    'language_id',
    'series_id',
    'binding_id',
    'additional_topics',
    'color',
    'size',
    'school_id',

];
    //`description`, `keywords`, `featured_image`, `gallery_images`, `publish_date`, `weight`, `dimensions`, `total_pages`, `inside_box`, `ISBN`, `l_sale_price`, `l_comission`, `l_purchase_price`, `retail_discount_policy`, `whole_sale_discount_policy`, `p_sale_price`, `p_comission`, `p_purchase_price`, `rental_discount_amt`, `lw_sale_discount`, `supplier_price`, `trade_percentage`, `purchase_price`, `p_retail_discount_amt`, `pw_sales_discount`, `type`, `unit_id`, `location_id`, `category_id`, `sub_category_id`, `supplier_id`, `publisher_id`, `author`, `topic_id`, `class_id`, `language_id`, `series_id`, `binding_id`, `is_avialable_online`, `delete_status`, `is_active`, `company_id`, `created_by`, `created_at`, `updated_at`
    public static $form_types = [
        'books',
        'noteBooks',
        'stationaries',
        'uniforms',
        'giftAndToys',
        'others'
    ];
}
