<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Kodeine\Acl\Models\Eloquent\Role;
use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Traits\HasRole;
class UsersLoginController extends Controller {

    public function show()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $input = $request->all();

        $rules = ['email'=>'required|email',
            'password'=>'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {
            $attempt = Auth::attempt([
                'email' => $input['email'],
                'password' => $input['password']
            ]);



            if ($attempt) {
                $user = Auth::user();
                if($user->is('administrator')){
                    return redirect()->route('administratorPanel');
                }else  if($user->is('center')){
                   return redirect()->route('centerPanel');
                }else if($user->is('local')){
                    return redirect()->route('localPanel');
                }else if($user->is('analysis')){
                    return redirect()->route('analysisPanel');
                }else if($user->is('emt')){
                    return redirect()->route('emtPanel');
                }else if($user->is('reliever')){
                    return redirect()->route('relieverPanel');
                }else if($user->is('resource')){
                    return redirect()->route('resourcePanel');
                }

            }

            return Redirect::to('login')
                ->withErrors(['fail'=>'帳號或密碼有誤!']);
        }

        //fails
        return Redirect::to('login')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
    }
//    public function login(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'email' => 'required | email',
//            'password' => 'required',
//        ]);
//
//
//        if ($validator->fails()) {
//            return Redirect::to('login')
//                ->withErrors($validator)
//                ->withInput();
//        } else {
//           // $remember = ($request->has('remember')) ? true : false;
//            $auth = Auth::attempt([
//                'email' => $request->get('email'),
//                'password' => $request->get('password'),
//            ]);//, $remember
//            if ($auth) {
//               // $user = Auth::user();
//                //更新資料
//                //$user->lastlogin_ip = $request->getClientIp();
//                //$user->lastlogin_at = date('Y-m-d H:i:s', time());
//                //$user->save();
//                //移除重新設定密碼的驗證碼
//                //DB::table('password_resets')->where('email', '=', $user->email)->delete();
//                //重導向至登入前頁面
//               return Redirect::intended('manage');
//            } else {
//                return Redirect::to('login')
//                    ->with('warning', '帳號或密碼錯誤');
//            }
//        }
//
//
//
//    }
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

}