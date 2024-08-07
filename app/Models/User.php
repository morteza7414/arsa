<?php

namespace App\Models;

use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\HasApiTokens;
use Mockery\Exception;
use Psy\Util\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;


    const TYPE_ADMIN = 'admin';
    const TYPE_MANAGER = 'manager';
    const TYPE_BRANCH = 'branch';
    const TYPE_REPRESENTATION = 'representation';
    const TYPE_SALESAGENT = 'salesagent';
    const TYPE_MARKETER = 'marketer';
    const TYPE_USER = 'user';
    const TYPE_STOREKEEPER = 'storekeeper';


    const TYPES = [
        self::TYPE_ADMIN,
        self::TYPE_MANAGER,
        self::TYPE_BRANCH,
        self::TYPE_REPRESENTATION,
        self::TYPE_SALESAGENT,
        self::TYPE_MARKETER,
        self::TYPE_USER,
        self::TYPE_STOREKEEPER,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = "";


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'statuscode',
        'email_verified_at',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function children()
    {
        return $this->hasMany(User::class, 'identifier_code', 'refralcode');
//        $children = User::where('identifier_code',$this->refralcode);
//        return $children;
    }

    public function parent()
    {
        if ($this->identifier_code) {
            $parent = User::where('refralcode', $this->identifier_code)->first();
            return $parent;
        }else{
            return null;
        }
    }


    public static function OnclickCheckLogin()
    {
        if (auth()->check()) {
            return redirect(route('dashboard'));
        } else {
            return redirect(route('login'));
        }

    }

    public function send_sms_code($mobile)
    {
        try {
            $otp = rand('1111', '99999');
            $stringOtp = (string)$otp;
            $url = 'https://console.melipayamak.com/api/send/shared/e33447ed51e04b5eaafb42632511d492';
            $data = array('bodyId' => 81926, 'to' => $mobile, 'args' => [$stringOtp]);
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
            return $otp;
        }
        catch(Exception $e){
            Log::error($e);
        }
    }

    public function getRoleInFarsi()
    {
        if ($this->role === 'user') return 'کاربر';
        if ($this->role === 'marketer') return 'بازاریاب';
        if ($this->role === 'salesagent') return 'عامل فروش';
        if ($this->role === 'representation') return 'نمایندگی';
        if ($this->role === 'branch') return 'شعبه';
        if ($this->role === 'manager') return 'مدیر';
        if ($this->role === 'admin') return 'ادمین';
        if ($this->role === 'storekeeper') return 'انباردار';

    }

    public static function createdFarsiTime($time)
    {
        return Verta::instance($time)->format('Y/m/d');
    }

    public static function getUserName($refcode)
    {
        $user = DB::table('users')->where('refralcode', '=', $refcode)->select('name')->get();
        return $user[0]->name;
    }


    public function isAdmin()
    {
        return $this->type == self::TYPE_ADMIN;
    }

    public function isManager()
    {
        return $this->type == self::TYPE_MANAGER;
    }

    public function isBranch()
    {
        return $this->type == self::TYPE_BRANCH;
    }

    public function isRepresentation()
    {
        return $this->type == self::TYPE_REPRESENTATION;
    }

    public function isSalesagent()
    {
        return $this->type == self::TYPE_SALESAGENT;
    }

    public function isMarketer()
    {
        return $this->type == self::TYPE_MARKETER;
    }

    public function isUser()
    {
        return $this->type == self::TYPE_USER;
    }

    public function likeCount()
    {
        return $this->likes()->count();
    }

    public function likes()
    {
        return $this->belongsToMany(Product::class, 'likes')
            ->withTimestamps();
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id', 'id')->where('status',1);
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'user_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }

    public function total_sum()
    {
        $carts = $this->carts;
        $total_sum = 0;
        if (!empty($carts)) {
            foreach ($carts as $cart) {
                $total_sum += $cart->sum;
            }
        }

        return $total_sum;
    }

    public function total_amount_without_off()
    {
        $carts = $this->carts;
        $total_amount = 0;
        if (!empty($carts)) {
            foreach ($carts as $cart) {
                $total_amount += $cart->product_price * $cart->quantity;
            }
        }
        return $total_amount;
    }


    public function transaction_success()
    {
        foreach (auth()->user()->carts as $cart) {
            $sale = Sale::where('product_id', $cart->product_id)->first();
            $product = $cart->product;
            if (empty($sale)) {
                Sale::create([
                    'product_id' => $cart->product_id,
                    'sales' => $cart->quantity,
                ]);
            } else {
                $sale->update([
                    'sales' => $sale->sales + $cart->quantity
                ]);
            }
            $product->update([
                'inventory' => $product->inventory - $cart->quantity,
            ]);

            $cart->update([
                'status' => 2,
            ]);
        }
        Order::where('user_id', auth()->id())->delete();
    }


    public function create_order()
    {
        $order = $this->order;
        if (empty($order)) {
            $order = $this->order()->create([
                'user_id' => auth()->id(),
                'total_amount' => auth()->user()->total_amount_without_off(),
                'sum' => auth()->user()->total_sum(),
            ]);
        } else {
            $order->update([
                'total_amount' => $this->total_amount_without_off(),
                'sum' => $this->total_sum(),
            ]);
        }
    }


    public function check_have_users($user_count,$transactions,$users_sale )
    {
        if ($this->role == 'user' and !empty($this->children)){
            $user_users = $this->children;
            $user_count += count($user_users);
            foreach ($user_users as $user) {
                $user_transactions = $transactions->where('user_id', $user->id);
                foreach ($user_transactions as $transaction) {
                    $users_sale += $transaction->paid;
                }
                if (!empty($user->children)){
                    $user->check_have_users($user_count,$transactions,$users_sale,$user);
                }
            }
        }
        Cache::put('user_count',$user_count,2);
        Cache::put('users_sale',$users_sale,2);
    }



    public static function send_admins_sms($mobile)
    {
        $url = 'https://console.melipayamak.com/api/send/shared/e33447ed51e04b5eaafb42632511d492';
        $data = array('bodyId' => 90321, 'to' => $mobile);
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

    public static function send_buyer_sms($mobile , $arg)
    {
        $url = 'https://console.melipayamak.com/api/send/shared/e33447ed51e04b5eaafb42632511d492';
        $data = array('bodyId' => 90323, 'to' => $mobile , 'args' => [$arg]);
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
