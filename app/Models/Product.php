<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use function PHPUnit\Framework\isEmpty;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $guarded = [];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'product_id', 'id');
    }

    public function images()
    {
        return $this->galleries->where('video','=',null);
    }
    public function videos()
    {
        return $this->galleries->where('image','=',null);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'products_properties', 'product_id', 'property_id');
    }

    public function learnn()
    {
        return $this->belongsToMany(Learn::class, 'learns_products', 'product_id', 'learn_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_products', 'product_id', 'category_id');
    }


    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')
            ->withTimestamps();
    }

    public function sale()
    {
        return $this->hasOne(Sale::class, 'product_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }

    public function getCreatedAtInPersian()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function getCreatedAtInPersianWithTime()
    {
        return verta($this->created_at)->addHour(3)->addMinute(30);
    }

    public function is_liked()
    {
        $users = $this->likes->toArray();
        foreach ($users as $user) {
            if ($user['id'] == auth()->id()) {
                return true;
            }
        }
        return false;
    }


    public function check_amazing()
    {

        $time = Carbon::now();
        $amazing = $this->where('amazing', '1')->get();
        foreach ($amazing as $product) {
            $amazing_time = $product->amazing_time;
            if ($product->updated_at->addHour($amazing_time) < $time) {
                $product->update([
                    'amazing' => false,
                    'amazing_time' => null,
                    'amazing_price' => null,
                    'off_reason' => ($product->offprice) ? 'تخفیف آرسا' : null,
                    'final_price' => ($product->offprice) ? $product->offprice : $product->price,
                ]);
            }
        }
    }


    public function price_percentage()
    {
        $this->check_amazing();
        if ($this->amazing_price) {
            $percentage = (integer)(100 - 100 * $this->amazing_price / $this->price);
        } elseif ($this->amazing_price == null and $this->offprice !== null) {
            $percentage = (integer)(100 - 100 * $this->offprice / $this->price);
        } else {
            $percentage = 0;
        }
        return $percentage;
    }


    public function offPrice()
    {
        $this->check_amazing();
        if ($this->amazing_price) {
            $offprice = $this->amazing_price;
        } elseif ($this->offprice !== null and $this->amazing_price == null) {
            $offprice = $this->offprice;
        } else {
            $offprice = $this->price;
        }
        return $offprice;
    }


    public function amazing_products()
    {

        $this->check_amazing();
        return $this->where('amazing', true)->get();
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class,'product_id','id');
    }

    public function remindeUsers()
    {
        $reminders = $this->reminders;
        foreach ($reminders as $reminder){
            $this->sendReminderSms($reminder->mobile);
            $reminder->delete();
        }
    }

    public function sendReminderSms()
    {
        $reminders = $this->reminders;
        foreach ($reminders as $reminder) {
            $url = 'https://console.melipayamak.com/api/send/shared/e33447ed51e04b5eaafb42632511d492';
            $data = array('bodyId' => 96361, 'to' => $reminder->mobile, 'args' => [$this->title]);
            $data_string = json_encode($data);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER,
                array('Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string))
            );
            $result = curl_exec($ch);
            curl_close($ch);

            $reminder->delete();
        }
    }

    public function sendReminderSms1()
    {

        $url = 'https://console.melipayamak.com/api/send/shared/e33447ed51e04b5eaafb42632511d492';
        $data = array('bodyId' => 96361, 'to' => '09132595622' , 'args' => ['محصول1']);
        $data_string = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array('Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($ch);
        curl_close($ch);

    }



}
