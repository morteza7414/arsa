<?php

namespace App\Http\Controllers;

use App\Models\InvoiceCalculatorUser;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvoiceCalculatorController extends Controller
{
    public function input()
    {
        return view('site.invoiceCalculator.input');
    }

    public function output(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:13', 'unique:invoice_calculator_users'],
            'area' => ['required', 'string', 'max:255'],
            'smartKey' => ['max:255'],
            'remoteKey' => ['max:255'],
            'fuse' => ['required', Rule::notIn(['null'])],
            'electricCurtain' => ['max:255'],
            'system' => ['max:255'],
            'heater' => ['max:255'],
            'parkingDoor' => ['max:255'],
            'intelligentIrrigation' => ['max:255'],
            'RGB' => ['max:255'],
        ]);

        $master = 0;
        $relay = 0;
        $motherboard = 0;
        $smartKey = 0;
        $remoteKey = 0;

        $invoiceUser = InvoiceCalculatorUser::where('mobile', $request->mobile)->first();

        if (empty($invoiceUser)){
            InvoiceCalculatorUser::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
            ]);
        }else{
            $invoiceUser->update([
                'name' => $request->name,
                'mobile' => $request->mobile,
            ]);
        }
        /** set master board number */
        if ($request->controlWithPhone) {
            $master += (int)(floor($request->area / 200) + 1);
        }
        /** end set master board number */

        /** set smartKey number */
        if ($request->smartKey) {
            $smartKey = (int)$request->smartKey;
        }
        /** end set smartKey number */

        /** set remoteKey number */
        if ($request->remoteKey) {
            $remoteKey = (int)$request->remoteKey;
        }
        /** end set remoteKey number */

        /** set relay number */
        $relay += $request->fuse / 16;
        /** end set relay number */

        /** set motherboard number */
        $electricCurtain = ($request->electricCurtain) ? (int)$request->electricCurtain : 0;
        $system = ($request->system) ? (int)$request->system : 0;
        $heater = ($request->heater) ? (int)$request->heater : 0;
        $parkingDoor = ($request->parkingDoor) ? (int)$request->parkingDoor : 0;
        $intelligentIrrigation = ($request->intelligentIrrigation) ? (int)$request->intelligentIrrigation : 0;
        $RGB = ($request->RGB) ? (int)$request->RGB : 0;
        if ($system != 0 or $heater != 0) {
            if ($system > $heater) {
                $motherboard += $system;
            } else {
                $motherboard += $heater;
            }
        } else {
            if ($electricCurtain != 0 or $parkingDoor != 0 or $intelligentIrrigation != 0 or $RGB != 0) {
                $motherboard += 1;
            }
        }
        /** end set motherboard number */

        /** set packages */
        $bronze = 0;
        $silver = 0;
        $gold = 0;
        $featurs = ['master' => $master, 'relay' => $relay, 'mother' => $motherboard];
        $maxValue = max($featurs);
        for ($i = 0; $i < $maxValue; $i++) {
            if ($motherboard > 0 and $relay > 0 and $master > 0) {
                if ($smartKey > 7) {
                    $gold += 1;
                    $smartKey -= 8;
                    $motherboard -= 1;
                    $relay -= 1;
                    $master -= 1;
                } else {
                    $silver += 1;
                    $motherboard -= 1;
                    $relay -= 1;
                    $master -= 1;
                }
            } elseif ($motherboard > 0 and $master > 0 and $relay == 0) {
                $bronze += 1;
                $motherboard -= 1;
                $master -= 1;
            }
        }
        /** end set packages */

        /** price calculating */
        $masterProduct = Product::where('title', 'like', '%' . 'مستر' . '%')->first();
        if ($masterProduct) {
            $masterPrice = $masterProduct->final_price;
        } else {
            $masterPrice = 4000000;
        }

        $relayProduct = Product::where('title', 'like', '%' . 'رله' . '%')->first();
        if ($relayProduct) {
            $relayPrice = $relayProduct->final_price;
        } else {
            $relayPrice = 19320000;
        }

        $motherboardProduct = Product::where('title', 'like', '%' . 'مادربرد' . '%')->first();
        if ($motherboardProduct) {
            $motherboardPrice = $motherboardProduct->final_price;
        } else {
            $motherboardPrice = 13710000;
        }

        $smartKeyProduct = Product::where('title', 'like', '%' . 'کلید لمسی' . '%')->first();
        if ($smartKeyProduct) {
            $smartKeyPrice = $smartKeyProduct->final_price;
        } else {
            $smartKeyPrice = 1230000;
        }

        $remoteKeyProduct = Product::where('title', 'like', '%' . 'ریموت' . '%')->first();
        if ($remoteKeyProduct) {
            $remoteKeyPrice = $remoteKeyProduct->final_price;
        } else {
            $remoteKeyPrice = 860000;
        }

        $bronzeProduct = Product::where('title', 'like', '%' . 'برنز' . '%')->first();
        if ($bronzeProduct) {
            $bronzePrice = $bronzeProduct->final_price;
        } else {
            $bronzePrice = 15000000;
        }

        $silverProduct = Product::where('title', 'like', '%' . 'نقره' . '%')->first();
        if ($silverProduct) {
            $silverPrice = $silverProduct->final_price;
        } else {
            $silverPrice = 32000000;
        }

        $goldProduct = Product::where('title', 'like', '%' . 'طلایی' . '%')->first();
        if ($goldProduct) {
            $goldPrice = $goldProduct->final_price;
        } else {
            $goldPrice = 39870000;
        }

        $finalPrice = ($bronze * $bronzePrice) + ($silver * $silverPrice) + ($gold * $goldPrice) + ($master * $masterPrice) + ($motherboard * $motherboardPrice) + ($relay * $relayPrice) + ($smartKey * $smartKeyPrice) + ($remoteKey * $remoteKeyPrice);

        $info = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'finalPrice' => $finalPrice,
        ];
        $data =[
            'gold' => ['number'=>$gold,'price'=>$goldPrice,'title'=>'پکیج طلایی'],
            'silver' => ['number'=>$silver,'price'=>$silverPrice,'title'=>'پکیج نقره ای'],
            'bronze' => ['number'=>$bronze,'price'=>$bronzePrice,'title'=>'پکیج برنزی'],
            'master' => ['number'=>$master,'price'=>$masterPrice,'title'=>'مستربرد'],
            'relay' => ['number'=>$relay,'price'=>$relayPrice,'title'=>'ماژول رله'],
            'motherboard' => ['number'=>$motherboard,'price'=>$motherboardPrice,'title'=>'مادربرد ماژول'],
            'smartKey' => ['number'=>$smartKey,'price'=>$smartKeyPrice,'title'=>'کلید لمسی هوشمند'],
            'remoteKey' => ['number'=>$remoteKey,'price'=>$remoteKeyPrice,'title'=>'کلید ریموت دار'],
        ];

        //create or update user invoice //
        $invoiceUser = InvoiceCalculatorUser::where('mobile', $request->mobile)->first();
        if (empty($invoiceUser)){
            InvoiceCalculatorUser::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'data' => [$data]
            ]);
        }else{
            $invoiceUser->update([
                'data' => [$data],
            ]);
        }

        return view('site.invoiceCalculator.invoice', compact('info','data'));


    }

}
