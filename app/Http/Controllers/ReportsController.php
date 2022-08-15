<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        if (!$request->from and !$request->to){
            $from = 'all';
            $to = 0;

            $userTotal = User::all();
            $userAdmin = User::where('role', 'admin');
            $userManager = User::where('role', 'manager');
            $userBranch = User::where('role', 'branch');
            $userRepresentation = User::where('role', 'representation');
            $userSalesagent = User::where('role', 'salesagent');
            $userMarketer = User::where('role', 'marketer');
            $userUser = User::where('role', 'user');

            $productTotal = Product::all();

            $transactionTotal = Transaction::all();
            $transactionSuccess = Transaction::where('status', Transaction::STATUS_SUCCESS);
            $transactionFailed = Transaction::where('status', Transaction::STATUS_FAILED);


        }elseif($request->from and !$request->to){
            $from = $request->from;
            $to = 0;
            $day = substr($from,0,2);
            $month = substr($from,3,2);
            $year = substr($from,6,4);
            $verta = new Verta();
            $verta->year = $year;
            $verta->month = $month;
            $verta->day = $day;
            $verta->hour = 00;
            $verta->minute = 00;
            $verta->second = 00;
            $from = \Illuminate\Support\Carbon::instance($verta->datetime());

            $userTotal = User::where('created_at', '>=', $from);
            $userAdmin = User::where('role', 'admin')->where('created_at', '>=', $from);
            $userManager = User::where('role', 'manager')->where('created_at', '>=', $from);
            $userBranch = User::where('role', 'branch')->where('created_at', '>=', $from);
            $userRepresentation = User::where('role', 'representation')->where('created_at', '>=', $from);
            $userSalesagent = User::where('role', 'salesagent')->where('created_at', '>=', $from);
            $userMarketer = User::where('role', 'marketer')->where('created_at', '>=', $from);
            $userUser = User::where('role', 'user')->where('created_at', '>=', $from);

            $productTotal = Product::where('created_at', '>=', $from);

            $transactionTotal = Transaction::where('updated_at', '>=', $from);
            $transactionSuccess = Transaction::where('status', Transaction::STATUS_SUCCESS)->where('updated_at', '>=', $from);
            $transactionFailed = Transaction::where('status', Transaction::STATUS_FAILED)->where('updated_at', '>=', $from);


        }elseif ($request->to and !$request->from){
            $from = 0;
            $to = $request->to;
            $day = substr($to,0,2);
            $month = substr($to,3,2);
            $year = substr($to,6,4);
            $verta = new Verta();
            $verta->year = $year;
            $verta->month = $month;
            $verta->day = $day;
            $verta->hour = 00;
            $verta->minute = 00;
            $verta->second = 00;

            $to = \Illuminate\Support\Carbon::instance($verta->datetime());

            $userTotal = User::where('created_at', '<=', $to);
            $userAdmin = User::where('role', 'admin')->where('created_at', '<=', $to);
            $userManager = User::where('role', 'manager')->where('created_at', '<=', $to);
            $userBranch = User::where('role', 'branch')->where('created_at', '<=', $to);
            $userRepresentation = User::where('role', 'representation')->where('created_at', '<=', $to);
            $userSalesagent = User::where('role', 'salesagent')->where('created_at', '<=', $to);
            $userMarketer = User::where('role', 'marketer')->where('created_at', '<=', $to);
            $userUser = User::where('role', 'user')->where('created_at', '<=', $to);

            $productTotal = Product::where('created_at', '<=', $to);

            $transactionTotal = Transaction::where('updated_at', '<=', $to);
            $transactionSuccess = Transaction::where('status', Transaction::STATUS_SUCCESS)->where('updated_at', '<=', $to);
            $transactionFailed = Transaction::where('status', Transaction::STATUS_FAILED)->where('updated_at', '<=', $to);

        }elseif ($request->from and $request->to){
            $from = $request->from;
            $day_from = substr($from,0,2);
            $month_from = substr($from,3,2);
            $year_from = substr($from,6,4);
            $verta_from = new Verta();
            $verta_from->year = $year_from;
            $verta_from->month = $month_from;
            $verta_from->day = $day_from;
            $verta_from->hour = 00;
            $verta_from->minute = 00;
            $verta_from->second = 00;
            $from = \Illuminate\Support\Carbon::instance($verta_from->datetime());

            $to = $request->to;
            $day_to = substr($to,0,2);
            $month_to = substr($to,3,2);
            $year_to = substr($to,6,4);
            $verta_to = new Verta();
            $verta_to->year = $year_to;
            $verta_to->month = $month_to;
            $verta_to->day = $day_to;
            $verta_to->hour = 00;
            $verta_to->minute = 00;
            $verta_to->second = 00;
            $to = \Illuminate\Support\Carbon::instance($verta_to->datetime());

            $userTotal = User::where('created_at', '>=', $from)->where('created_at', '<=', $to);
            $userAdmin = User::where('role', 'admin')->where('created_at', '>=', $from)->where('created_at', '<=', $to);
            $userManager = User::where('role', 'manager')->where('created_at', '>=', $from)->where('created_at', '<=', $to);
            $userBranch = User::where('role', 'branch')->where('created_at', '>=', $from)->where('created_at', '<=', $to);
            $userRepresentation = User::where('role', 'representation')->where('created_at', '>=', $from)->where('created_at', '<=', $to);
            $userSalesagent = User::where('role', 'salesagent')->where('created_at', '>=', $from)->where('created_at', '<=', $to);
            $userMarketer = User::where('role', 'marketer')->where('created_at', '>=', $from)->where('created_at', '<=', $to);
            $userUser = User::where('role', 'user')->where('created_at', '>=', $from)->where('created_at', '<=', $to);

            $productTotal = Product::where('created_at', '>=', $from)->where('created_at', '<=', $to);

            $transactionTotal = Transaction::where('updated_at', '>=', $from)->where('updated_at', '<=', $to);
            $transactionSuccess = Transaction::where('status', Transaction::STATUS_SUCCESS)->where('updated_at', '>=', $from)->where('updated_at', '<=', $to);
            $transactionFailed = Transaction::where('status', Transaction::STATUS_FAILED)->where('updated_at', '>=', $from)->where('updated_at', '<=', $to);
        }

        $data['from'] = $from;
        $data['to'] = $to;

        // reports of users //
        $data['userTotal'] = $userTotal->count();
        $data['userAdmin'] = $userAdmin->count();
        $data['userManager'] = $userManager->count();
        $data['userBranch'] = $userBranch->count();
        $data['userRepresentation'] = $userRepresentation->count();
        $data['userSalesagent'] = $userSalesagent->count();
        $data['userMarketer'] = $userMarketer->count();
        $data['userUser'] = $userUser->count();
        // end reports of users //

        // reports of products //
        $data['productTotal'] = $productTotal->count();
        // end reports of products

        // reports of transactions //
        $transactionPaid = 0;
        $transactions = $transactionSuccess->get();
        foreach ($transactions as $transaction) {
            $transactionPaid += $transaction->paid;
        }
        $data['transactionTotal'] = $transactionTotal->count();
        $data['transactionSuccess'] = $transactionSuccess->count();
        $data['transactionFailed'] = $transactionFailed->count();
        $data['transactionPaid'] = $transactionPaid;
        // end reports of transactions //

        // reports of branchs //
        $branchs = User::where('role', 'branch')->get();
        $data['branchs'] = $branchs;

        return view('panel.reports.reports', compact('data'));

    }




    //** caractor reports */
    public function caractor(Request $request,$id)
    {

        if (!$request->from and !$request->to){
            $from = 'all';
            $to = 0;
            $transactions = Transaction::where('status', 2)->get();
        }elseif($request->from and !$request->to){
            $from = $request->from;
            $to = 0;
            $day = substr($from,0,2);
            $month = substr($from,3,2);
            $year = substr($from,6,4);
            $verta = new Verta();
            $verta->year = $year;
            $verta->month = $month;
            $verta->day = $day;
            $verta->hour = 00;
            $verta->minute = 00;
            $verta->second = 00;

            $from = \Illuminate\Support\Carbon::instance($verta->datetime());
            $transactions = Transaction::where('status', 2)->where('created_at','>=',$from)->get();
        }elseif ($request->to and !$request->from){
            $from = 0;
            $to = $request->to;
            $day = substr($to,0,2);
            $month = substr($to,3,2);
            $year = substr($to,6,4);
            $verta = new Verta();
            $verta->year = $year;
            $verta->month = $month;
            $verta->day = $day;
            $verta->hour = 00;
            $verta->minute = 00;
            $verta->second = 00;

            $to = \Illuminate\Support\Carbon::instance($verta->datetime());
            $transactions = Transaction::where('status', 2)->where('created_at','<=',$to)->get();
        }elseif ($request->from and $request->to){
            $from = $request->from;
            $day_from = substr($from,0,2);
            $month_from = substr($from,3,2);
            $year_from = substr($from,6,4);
            $verta_from = new Verta();
            $verta_from->year = $year_from;
            $verta_from->month = $month_from;
            $verta_from->day = $day_from;
            $verta_from->hour = 00;
            $verta_from->minute = 00;
            $verta_from->second = 00;
            $from = \Illuminate\Support\Carbon::instance($verta_from->datetime());

            $to = $request->to;
            $day_to = substr($to,0,2);
            $month_to = substr($to,3,2);
            $year_to = substr($to,6,4);
            $verta_to = new Verta();
            $verta_to->year = $year_to;
            $verta_to->month = $month_to;
            $verta_to->day = $day_to;
            $verta_to->hour = 00;
            $verta_to->minute = 00;
            $verta_to->second = 00;
            $to = \Illuminate\Support\Carbon::instance($verta_to->datetime());
            $transactions = Transaction::where('status', 2)->where('created_at','>=',$from)
                ->where('created_at','<=',$to)->get();
        }



        $caractor = User::where('id', $id)->first();

        if ($caractor->role == 'branch') {
            $caractor_transactions = $transactions->where('user_id', $id);
            $caractor_pay = 0;

            foreach ($caractor_transactions as $caractor_transaction) {
                $caractor_pay += $caractor_transaction->paid;
            }

            $caractor_sale = 0;
            $users_sale = 0;
            $marketer_sale = 0;
            $salesagent_sale = 0;
            $representation_sale = 0;


            $children = $caractor->children;
            $children_count = 0;
            $user_count = count($children->where('role', 'user'));
            $marketer_count = count($children->where('role', 'marketer'));
            $salesagent_count = count($children->where('role', 'salesagent'));
            $representation_count = count($children->where('role', 'representation'));


            $caractor_representations = $children->where('role', 'representation');
            $caractor_salesagents = $children->where('role', 'salesagent');
            $caractor_marketers = $children->where('role', 'marketer');
            $caractor_users = $children->where('role', 'user');

            foreach ($caractor_users as $user) {
                $user_transactions = $transactions->where('user_id', $user->id);
                foreach ($user_transactions as $transaction) {
                    $users_sale += $transaction->paid;
                }
                $user->check_have_users($user_count, $transactions, $users_sale);
                $users_sale = Cache::get('users_sale', $users_sale);
                $user_count = Cache::get('user_count', $user_count);
            }

            foreach ($caractor_marketers as $marketer) {
                $marketer_transactions = $transactions->where('user_id', $marketer->id);
                foreach ($marketer_transactions as $transaction) {
                    $marketer_sale += $transaction->paid;
                }

                $marketer_users = $marketer->children;
                $user_count += count($marketer_users);
                foreach ($marketer_users as $user) {
                    $user_transactions = $transactions->where('user_id', $user->id);
                    foreach ($user_transactions as $transaction) {
                        $users_sale += $transaction->paid;
                    }
                    $user->check_have_users($user_count, $transactions, $users_sale);
                    $users_sale = Cache::get('users_sale', $users_sale);
                    $user_count = Cache::get('user_count', $user_count);
                }
            }

            foreach ($caractor_salesagents as $salesagent) {
                $salesagent_transactions = $transactions->where('user_id', $salesagent->id);
                foreach ($salesagent_transactions as $transaction) {
                    $salesagent_sale += $transaction->paid;
                }

                $salesagent_children = $salesagent->children;
                $salesagent_users = $salesagent_children->where('role', 'user');
                $user_count += count($salesagent_users);
                $salesagent_marketer = $salesagent_children->where('role', 'marketer');
                $marketer_count += count($salesagent_marketer);
                foreach ($salesagent_users as $user) {
                    $user_transactions = $transactions->where('user_id', $user->id);
                    foreach ($user_transactions as $transaction) {
                        $users_sale += $transaction->paid;
                    }
                    $user->check_have_users($user_count, $transactions, $users_sale);
                    $users_sale = Cache::get('users_sale', $users_sale);
                    $user_count = Cache::get('user_count', $user_count);
                }
                foreach ($salesagent_marketer as $marketer) {
                    $marketer_transactions = $transactions->where('user_id', $marketer->id);
                    foreach ($marketer_transactions as $transaction) {
                        $marketer_sale += $transaction->paid;
                    }

                    $marketer_users = $marketer->children;
                    $user_count += count($marketer_users);
                    foreach ($marketer_users as $user) {
                        $user_transactions = $transactions->where('user_id', $user->id);
                        foreach ($user_transactions as $transaction) {
                            $users_sale += $transaction->paid;
                        }
                        $user->check_have_users($user_count, $transactions, $users_sale);
                        $users_sale = Cache::get('users_sale', $users_sale);
                        $user_count = Cache::get('user_count', $user_count);
                    }
                }
            }

            foreach ($caractor_representations as $representation) {
                $representation_transactions = $transactions->where('user_id', $representation->id);

                foreach ($representation_transactions as $transaction) {

                    $representation_sale += $transaction->paid;
                }

                $representation_children = $representation->children;
                $representation_salesagent = $representation_children->where('role', 'salesagent');
                $salesagent_count += count($representation_salesagent);
                $representation_users = $representation_children->where('role', 'user');
                $user_count += count($representation_users);
                $representation_marketer = $representation_children->where('role', 'marketer');
                $marketer_count += count($representation_marketer);


                foreach ($representation_users as $user) {
                    $user_transactions = $transactions->where('user_id', $user->id);
                    foreach ($user_transactions as $transaction) {
                        $users_sale += $transaction->paid;
                    }
                    $user->check_have_users($user_count, $transactions, $users_sale);
                    $users_sale = Cache::get('users_sale', $users_sale);
                    $user_count = Cache::get('user_count', $user_count);
                }
                foreach ($representation_marketer as $marketer) {
                    $marketer_transactions = $transactions->where('user_id', $marketer->id);
                    foreach ($marketer_transactions as $transaction) {
                        $marketer_sale += $transaction->paid;
                    }

                    $marketer_users = $marketer->children;
                    $user_count += count($marketer_users);
                    foreach ($marketer_users as $user) {
                        $user_transactions = $transactions->where('user_id', $user->id);
                        foreach ($user_transactions as $transaction) {
                            $users_sale += $transaction->paid;
                        }
                        $user->check_have_users($user_count, $transactions, $users_sale);
                        $users_sale = Cache::get('users_sale', $users_sale);
                        $user_count = Cache::get('user_count', $user_count);
                    }
                }
                foreach ($representation_salesagent as $salesagent) {
                    $salesagent_transactions = $transactions->where('user_id', $salesagent->id);
                    foreach ($salesagent_transactions as $transaction) {
                        $salesagent_sale += $transaction->paid;
                    }
                    $salesagent_children = $salesagent->children;
                    $salesagent_users = $salesagent_children->where('role', 'user');
                    $user_count += count($salesagent_users);
                    $salesagent_marketer = $salesagent_children->where('role', 'marketer');
                    $marketer_count += count($salesagent_marketer);
                    $marketer_count += count($salesagent_marketer);
                    foreach ($salesagent_users as $user) {
                        $user_transactions = $transactions->where('user_id', $user->id);
                        foreach ($user_transactions as $transaction) {
                            $users_sale += $transaction->paid;
                        }
                        $user->check_have_users($user_count, $transactions, $users_sale);
                        $users_sale = Cache::get('users_sale', $users_sale);
                        $user_count = Cache::get('user_count', $user_count);
                    }
                    foreach ($salesagent_marketer as $marketer) {
                        $marketer_transactions = $transactions->where('user_id', $marketer->id);
                        foreach ($marketer_transactions as $transaction) {
                            $marketer_sale += $transaction->paid;
                        }

                        $marketer_users = $marketer->children;
                        $user_count += count($marketer_users);
                        foreach ($marketer_users as $user) {
                            $user_transactions = $transactions->where('user_id', $user->id);
                            foreach ($user_transactions as $transaction) {
                                $users_sale += $transaction->paid;
                            }
                            $user->check_have_users($user_count, $transactions, $users_sale);
                            $users_sale = Cache::get('users_sale', $users_sale);
                            $user_count = Cache::get('user_count', $user_count);
                        }
                    }
                }
            }
            $children_count = $user_count + $marketer_count + $salesagent_count + $representation_count;
            $caractor_sale = $users_sale + $marketer_sale + $salesagent_sale + $representation_sale + $caractor_pay;

        }elseif ($caractor->role == 'representation'){
            $caractor_transactions = $transactions->where('user_id', $id);
            $caractor_pay = 0;

            foreach ($caractor_transactions as $caractor_transaction) {
                $caractor_pay += $caractor_transaction->paid;
            }

            $caractor_sale = 0;
            $users_sale = 0;
            $marketer_sale = 0;
            $salesagent_sale = 0;


            $children = $caractor->children;
            $children_count = 0;
            $user_count = count($children->where('role', 'user'));
            $marketer_count = count($children->where('role', 'marketer'));
            $salesagent_count = count($children->where('role', 'salesagent'));


            $caractor_salesagents = $children->where('role', 'salesagent');
            $caractor_marketers = $children->where('role', 'marketer');
            $caractor_users = $children->where('role', 'user');

            foreach ($caractor_users as $user) {
                $user_transactions = $transactions->where('user_id', $user->id);
                foreach ($user_transactions as $transaction) {
                    $users_sale += $transaction->paid;
                }
                $user->check_have_users($user_count, $transactions, $users_sale);
                $users_sale = Cache::get('users_sale', $users_sale);
                $user_count = Cache::get('user_count', $user_count);
            }

            foreach ($caractor_marketers as $marketer) {
                $marketer_transactions = $transactions->where('user_id', $marketer->id);
                foreach ($marketer_transactions as $transaction) {
                    $marketer_sale += $transaction->paid;
                }

                $marketer_users = $marketer->children;
                $user_count += count($marketer_users);
                foreach ($marketer_users as $user) {
                    $user_transactions = $transactions->where('user_id', $user->id);
                    foreach ($user_transactions as $transaction) {
                        $users_sale += $transaction->paid;
                    }
                    $user->check_have_users($user_count, $transactions, $users_sale);
                    $users_sale = Cache::get('users_sale', $users_sale);
                    $user_count = Cache::get('user_count', $user_count);
                }
            }

            foreach ($caractor_salesagents as $salesagent) {
                $salesagent_transactions = $transactions->where('user_id', $salesagent->id);
                foreach ($salesagent_transactions as $transaction) {
                    $salesagent_sale += $transaction->paid;
                }
                $salesagent_children = $salesagent->children;
                $salesagent_users = $salesagent_children->where('role', 'user');
                $user_count += count($salesagent_users);
                $salesagent_marketer = $salesagent_children->where('role', 'marketer');
                $marketer_count += count($salesagent_marketer);
                foreach ($salesagent_users as $user) {
                    $user_transactions = $transactions->where('user_id', $user->id);
                    foreach ($user_transactions as $transaction) {
                        $users_sale += $transaction->paid;
                    }
                    $user->check_have_users($user_count, $transactions, $users_sale);
                    $users_sale = Cache::get('users_sale', $users_sale);
                    $user_count = Cache::get('user_count', $user_count);
                }
                foreach ($salesagent_marketer as $marketer) {
                    $marketer_transactions = $transactions->where('user_id', $marketer->id);
                    foreach ($marketer_transactions as $transaction) {
                        $marketer_sale += $transaction->paid;
                    }

                    $marketer_users = $marketer->children;
                    $user_count += count($marketer_users);
                    foreach ($marketer_users as $user) {
                        $user_transactions = $transactions->where('user_id', $user->id);
                        foreach ($user_transactions as $transaction) {
                            $users_sale += $transaction->paid;
                        }
                        $user->check_have_users($user_count, $transactions, $users_sale);
                        $users_sale = Cache::get('users_sale', $users_sale);
                        $user_count = Cache::get('user_count', $user_count);
                    }
                }
            }



            $children_count = $user_count + $marketer_count + $salesagent_count ;
            $caractor_sale = $users_sale + $marketer_sale + $salesagent_sale  + $caractor_pay;

        }elseif ($caractor->role == 'salesagent'){
            $caractor_transactions = $transactions->where('user_id', $id);
            $caractor_pay = 0;

            foreach ($caractor_transactions as $caractor_transaction) {
                $caractor_pay += $caractor_transaction->paid;
            }

            $caractor_sale = 0;
            $users_sale = 0;
            $marketer_sale = 0;


            $children = $caractor->children;
            $children_count = 0;
            $user_count = count($children->where('role', 'user'));
            $marketer_count = count($children->where('role', 'marketer'));


            $caractor_marketers = $children->where('role', 'marketer');
            $caractor_users = $children->where('role', 'user');

            foreach ($caractor_users as $user) {
                $user_transactions = $transactions->where('user_id', $user->id);
                foreach ($user_transactions as $transaction) {
                    $users_sale += $transaction->paid;
                }
                $user->check_have_users($user_count, $transactions, $users_sale);
                $users_sale = Cache::get('users_sale', $users_sale);
                $user_count = Cache::get('user_count', $user_count);
            }

            foreach ($caractor_marketers as $marketer) {
                $marketer_transactions = $transactions->where('user_id', $marketer->id);
                foreach ($marketer_transactions as $transaction) {
                    $marketer_sale += $transaction->paid;
                }

                $marketer_users = $marketer->children;
                $user_count += count($marketer_users);
                foreach ($marketer_users as $user) {
                    $user_transactions = $transactions->where('user_id', $user->id);
                    foreach ($user_transactions as $transaction) {
                        $users_sale += $transaction->paid;
                    }
                    $user->check_have_users($user_count, $transactions, $users_sale);
                    $users_sale = Cache::get('users_sale', $users_sale);
                    $user_count = Cache::get('user_count', $user_count);
                }
            }



            $children_count = $user_count + $marketer_count  ;
            $caractor_sale = $users_sale + $marketer_sale  + $caractor_pay;
        }elseif ($caractor->role == 'marketer' or $caractor->role == 'user'){
            $caractor_transactions = $transactions->where('user_id', $id);
            $caractor_pay = 0;

            foreach ($caractor_transactions as $caractor_transaction) {
                $caractor_pay += $caractor_transaction->paid;
            }

            $caractor_sale = 0;
            $users_sale = 0;

            $children = $caractor->children;
            $children_count = 0;
            $user_count = count($children->where('role', 'user'));

            $caractor_users = $children->where('role', 'user');

            foreach ($caractor_users as $user) {
                $user_transactions = $transactions->where('user_id', $user->id);
                foreach ($user_transactions as $transaction) {
                    $users_sale += $transaction->paid;
                }
                $user->check_have_users($user_count, $transactions, $users_sale);
                $users_sale = Cache::get('users_sale', $users_sale);
                $user_count = Cache::get('user_count', $user_count);
            }

            $children_count = $user_count  ;
            $caractor_sale = $users_sale + $caractor_pay;
        }

//        dd($children_count, $caractor_sale);

        return view('panel.reports.caractor', compact('children_count', 'caractor_sale','caractor_pay','from','to', 'id','caractor'));


    }
}
