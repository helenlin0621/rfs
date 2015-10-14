<?php
//use Kodeine\Acl\Models\Eloquent\Role;
use Illuminate\Support\Facades\DB;
use Kodeine\Acl\Models\Eloquent\Permission;
use app\User;
use app\Post;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Database\Seeder;
/**
 * Created by PhpStorm.
 * User: Tsugumi
 * Date: 2015/4/14
 * Time: 下午 03:47
 */

class user_seeder extends Seeder{
    use HasRole;
    public function run(){
        DB:: table('users')->delete();
        DB:: table('works_ons')->delete();
        DB:: table('victim_details')->delete();


        //系統管理者

        $user = new App\User; //測試用密碼是1234
        $user->id = 1;
        $user->name = "王小明";
        $user->email = "administrator@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0912312312';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '王小明')->first();
        $role = Permission::where('name', '=', 'Administrator')->first();
        $user->assignRole($role);
        $user->save();

        //中央指揮官

        $user = new App\User; //測試用密碼是1234
        $user->id = 2;
        $user->name = "陳小華";
        $user->email = "center@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0945645645';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '陳小華')->first();
        $roleCenter = Permission::where('name', '=', 'Center')->first();
        $user->assignRole($roleCenter);
        $user->save();

        //地方指揮官

        $user = new App\User; //測試用密碼是1234
        $user->id = 3;
        $user->name = "陳芊蓉";
        $user->email = "local2@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0978978978';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '陳芊蓉')->first();
        $role  = Permission::where('name', '=', 'Local')->first();
        $user->assignRole( $role );
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 3;
        $Works_on->mission_list_id = 2;
        $Works_on->save();

        $user = new App\User; //測試用密碼是1234
        $user->id = 4;
        $user->name = "林麗雯";
        $user->email = "local4@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0900400404';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '林麗雯')->first();
        $role = Permission::where('name', '=', 'Local')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 4;
        $Works_on->mission_list_id = 4;
        $Works_on->save();


        $user = new App\User; //測試用密碼是1234
        $user->id = 5;
        $user->name = "韓東霖";
        $user->email = "local5@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0900500505';
//        $user->skill = '有醫師執照';
//        $user->country_or_city_input = '台中市';
//        $user->township_or_district_input = '北屯區';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '韓東霖')->first();
        $role = Permission::where('name', '=', 'local')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 5;
        $Works_on->mission_list_id = 5;
        $Works_on->save();


        //地方指揮官閒置




        $user = new App\User;
        $user->id = 6;
        $user->name = "葉雯情";
        $user->email = "006@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0900600606';
        $user->save();

        $user  = User::where('name', '=', '葉雯情')->first();
        $role = Permission::where('name', '=', 'local')->first();
        $user->assignRole($role);
        $user->arrived = 1;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 6;
        $Works_on->mission_list_id = 1;
        $Works_on->save();


        $user = new App\User;
        $user->id = 7;
        $user->name = "王麗芳";
        $user->email = "007@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0900700707';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '王麗芳')->first();
        $role = Permission::where('name', '=', 'local')->first();
        $user->assignRole($role);
        $user->save();


        $Works_on = new App\Works_on;
        $Works_on->id = 7;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

        $user = new App\User;
        $user->id = 8;
        $user->name = "吳番薯";
        $user->email = "008@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0900800808';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '吳番薯')->first();
        $role = Permission::where('name', '=', 'local')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 8;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

        //後勤

        $user = new App\User;
        $user->id = 9;
        $user->name = "葉欣偉";
        $user->email = "resource@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0900900909';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '葉欣偉')->first();
        $role = Permission::where('name', '=', 'Resource')->first();
        $user->assignRole($role);
        $user->save();

        //醫療

        $user = new App\User;
        $user->id = 10;
        $user->name = "楊光冽";
        $user->email = "emt2@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0901001010';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '楊光冽')->first();
        $role = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 10;
        $Works_on->mission_list_id = 2;
        $Works_on->save();


        $user = new App\User;
        $user->id = 11;
        $user->name = "簡道鉗";
        $user->email = "emt4@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0901101111';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '簡道鉗')->first();
        $role = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 11;
        $Works_on->mission_list_id = 4;
        $Works_on->save();

        //醫療組閒置

        $user = new App\User;
        $user->id = 12;
        $user->name = "林語";
        $user->email = "012@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0901201212';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '林語')->first();
        $role = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 12;
        $Works_on->mission_list_id = 1;
        $Works_on->save();


        $user = new App\User;
        $user->id = 13;
        $user->name = "耿夜";
        $user->email = "013@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0901301313';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '耿夜')->first();
        $role = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 13;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

        $user = new App\User;
        $user->id = 14;
        $user->name = "彭士萱";
        $user->email = "014@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0901401414';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '彭士萱')->first();
        $role = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 14;
        $Works_on->mission_list_id = 1;
        $Works_on->save();


        $user = new App\User;
        $user->id = 15;
        $user->name = "黃奇偉";
        $user->email = "015@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0901501515';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '黃奇偉')->first();
        $role = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 15;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

        //脫困組

        $user = new App\User;
        $user->id = 16;
        $user->name = "丁凝";
        $user->email = "016@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0901601616';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '丁凝')->first();
        $role = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 16;
        $Works_on->mission_list_id = 2;
        $Works_on->save();


        $user = new App\User;
        $user->id = 17;
        $user->name = "曾家琪";
        $user->email = "017@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0901701717';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '曾家琪')->first();
        $role = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 17;
        $Works_on->mission_list_id = 4;
        $Works_on->save();


        $user = new App\User;
        $user->id = 18;
        $user->name = "顧溪中";
        $user->email = "018@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0901801818';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '顧溪中')->first();
        $role = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 18;
        $Works_on->mission_list_id = 2;
        $Works_on->save();

        //脫困組閒置




        $user = new App\User;
        $user->id = 19;
        $user->name = "鍾渝";
        $user->email = "019@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0901901919';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '鍾渝')->first();
        $role = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 19;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

        $user = new App\User;
        $user->id = 20;
        $user->name = "金南響";
        $user->email = "020@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0902002020';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '金南響')->first();
        $role = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 20;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

        $user = new App\User;
        $user->id = 21;
        $user->name = "呂伙棲";
        $user->email = "021@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0902102121';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '呂伙棲')->first();
        $role = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 21;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

        //救火組

        $user = new App\User;
        $user->id = 22;
        $user->name = "江晉玖";
        $user->email = "022@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0902202222';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '江晉玖')->first();
        $role = Permission::where('name', '=', 'Fire')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 22;
        $Works_on->mission_list_id = 2;
        $Works_on->save();

        $user = new App\User;
        $user->id = 23;
        $user->name = "高吉夙";
        $user->email = "023@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0902302323';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '高吉夙')->first();
        $role = Permission::where('name', '=', 'Fire')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 23;
        $Works_on->mission_list_id = 4;
        $Works_on->save();

        $user = new App\User;
        $user->id = 24;
        $user->name = "柯苛科";
        $user->email = "024@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0902402424';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '柯苛科')->first();
        $role = Permission::where('name', '=', 'Fire')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 24;
        $Works_on->mission_list_id = 4;
        $Works_on->save();

        //救火組閒置

        $user = new App\User;
        $user->id = 25;
        $user->name = "白卓逸";
        $user->email = "025@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0902502525';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '白卓逸')->first();
        $role = Permission::where('name', '=', 'Fire')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 25;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

        $user = new App\User;
        $user->id = 26;
        $user->name = "郭曉建";
        $user->email = "026@yahoo.com.tw";
        $user->password =Hash::make ('s3dv21');
        $user->phone = '0902602626';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '郭曉建')->first();
        $role = Permission::where('name', '=', 'Fire')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 26;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

        $user = new App\User;
        $user->id = 27;
        $user->name = "詹絳";
        $user->email = "027@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0902702727';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '詹絳')->first();
        $role = Permission::where('name', '=', 'Fire')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 27;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

        //清潔組

        $user = new App\User;
        $user->id = 28;
        $user->name = "趙漾刻";
        $user->email = "028@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0902802828';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '趙漾刻')->first();
        $role = Permission::where('name', '=', 'Clean')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 28;
        $Works_on->mission_list_id = 5;
        $Works_on->save();


        $user = new App\User;
        $user->id = 29;
        $user->name = "朱禮姚";
        $user->email = "029@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0902902929';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '朱禮姚')->first();
        $role = Permission::where('name', '=', 'Clean')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 29;
        $Works_on->mission_list_id = 5;
        $Works_on->save();

        //清潔組閒置

        $user = new App\User;
        $user->id = 30;
        $user->name = "唐臥土";
        $user->email = "030@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0903003030';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '唐臥土')->first();
        $role = Permission::where('name', '=', 'Clean')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 30;
        $Works_on->mission_list_id = 1;
        $Works_on->save();


        $user = new App\User; //測試用密碼是1234
        $user->id = 31;
        $user->name = "尤燕";
        $user->email = "031@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0903103131';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '尤燕')->first();
        $role = Permission::where('name', '=', 'Clean')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 31;
        $Works_on->mission_list_id = 1;
        $Works_on->save();


        $user = new App\User;
        $user->id = 32;
        $user->name = "謝卸";
        $user->email = "032@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0903203232';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '謝卸')->first();
        $role = Permission::where('name', '=', 'Clean')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 32;
        $Works_on->mission_list_id = 1;
        $Works_on->save();


        $user = new App\User;
        $user->id = 33;
        $user->name = "莊簿郝";
        $user->email = "033@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0903303333';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '莊簿郝')->first();
        $role = Permission::where('name', '=', 'Clean')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 33;
        $Works_on->mission_list_id = 1;
        $Works_on->save();


        //道路修復組

        $user = new App\User;
        $user->id = 34;
        $user->name = "鄭織恩";
        $user->email = "034@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0903403434';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '鄭織恩')->first();
        $role = Permission::where('name', '=', 'Road')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 34;
        $Works_on->mission_list_id = 2;
        $Works_on->save();

        $user = new App\User;
        $user->id = 35;
        $user->name = "許瑗慈";
        $user->email = "035@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0903503535';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '許瑗慈')->first();
        $role = Permission::where('name', '=', 'Road')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 35;
        $Works_on->mission_list_id = 2;
        $Works_on->save();

        $user = new App\User;
        $user->id = 36;
        $user->name = "張俞";
        $user->email = "036@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0903603636';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '張俞')->first();
        $role = Permission::where('name', '=', 'Road')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 36;
        $Works_on->mission_list_id = 2;
        $Works_on->save();

        $user = new App\User;
        $user->id = 37;
        $user->name = "劉夏萊";
        $user->email = "037@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0903703737';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '劉夏萊')->first();
        $role = Permission::where('name', '=', 'Road')->first();
        $user->assignRole($role);
        $user->save();

        $user = new App\User;
        $user->id = 38;
        $user->name = "王月";
        $user->email = "038@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0903803838';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '王月')->first();
        $role = Permission::where('name', '=', 'Road')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 38;
        $Works_on->mission_list_id = 4;
        $Works_on->save();

        $user = new App\User;
        $user->id =39;
        $user->name = "鍾堅植";
        $user->email = "039@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0903903939';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '鍾堅植')->first();
        $role = Permission::where('name', '=', 'Road')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 39;
        $Works_on->mission_list_id = 4;
        $Works_on->save();

        //道路修復組閒置

        $user = new App\User;
        $user->id = 40;
        $user->name = "顧赭鴟";
        $user->email = "040@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0904004040';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '顧赭鴟')->first();
        $role = Permission::where('name', '=', 'Road')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 40;
        $Works_on->mission_list_id = 1;
        $Works_on->save();


        // 管線修復組

        $user = new App\User;
        $user->id =41;
        $user->name = "簡依舞";
        $user->email = "041@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0904104141';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '簡依舞')->first();
        $role = Permission::where('name', '=', 'Pipe')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 41;
        $Works_on->mission_list_id = 2;
        $Works_on->save();

        $user = new App\User;
        $user->id =42;
        $user->name = "曾晉瑋";
        $user->email = "042@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0904204242';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '曾晉瑋')->first();
        $role = Permission::where('name', '=', 'Pipe')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 42;
        $Works_on->mission_list_id = 2;
        $Works_on->save();


        $user = new App\User;
        $user->id = 43;
        $user->name = "詹欣束";
        $user->email = "043@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0904304343';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '詹欣束')->first();
        $role = Permission::where('name', '=', 'Pipe')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 43;
        $Works_on->mission_list_id = 4;
        $Works_on->save();


        $user = new App\User;
        $user->id = 44;
        $user->name = "趙則恩";
        $user->email = "044@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0904404444';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '趙則恩')->first();
        $role = Permission::where('name', '=', 'Pipe')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 44;
        $Works_on->mission_list_id = 4;
        $Works_on->save();


        $user = new App\User;
        $user->id = 45;
        $user->name = "郭編范";
        $user->email = "045@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0904504545';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '郭編范')->first();
        $role = Permission::where('name', '=', 'Pipe')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 45;
        $Works_on->mission_list_id = 5;
        $Works_on->save();

        $user = new App\User;
        $user->id = 46;
        $user->name = "范聖佩";
        $user->email = "046@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0904604646';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '范聖佩')->first();
        $role = Permission::where('name', '=', 'Pipe')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 46;
        $Works_on->mission_list_id = 5;
        $Works_on->save();

        //管線修復組閒置

        $user = new App\User;
        $user->id = 47;
        $user->name = "江文欣";
        $user->email = "047@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0904704747';
        $user->arrived = 0;
        $user->save();

        $user  = User::where('name', '=', '江文欣')->first();
        $role = Permission::where('name', '=', 'Pipe')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 47;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

        //警界組

        $user = new App\User; //測試用密碼是1234
        $user->id = 48;
        $user->name = "黃織圓";
        $user->email = "048@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0904804848';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '黃織圓')->first();
        $role = Permission::where('name', '=', 'Police')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 48;
        $Works_on->mission_list_id = 2;
        $Works_on->save();

        $user = new App\User;
        $user->id =49;
        $user->name = "高杉政";
        $user->email = "049@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0904904949';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '高杉政')->first();
        $role = Permission::where('name', '=', 'Police')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 49;
        $Works_on->mission_list_id = 4;
        $Works_on->save();

        $user = new App\User;
        $user->id = 50;
        $user->name = "魏瑜";
        $user->email = "050@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0905005050';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '魏瑜')->first();
        $role = Permission::where('name', '=', 'Police')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 50;
        $Works_on->mission_list_id = 5;
        $Works_on->save();

        //警界組閒置

        $user = new App\User;
        $user->id = 51;
        $user->name = "郭大建";
        $user->email = "051@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0905105151';
        $user->arrived = 1;
        $user->save();

        $user  = User::where('name', '=', '郭大建')->first();
        $role = Permission::where('name', '=', 'Police')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 51;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

        $user = new App\User;
        $user->id = 52;
        $user->name = "郭中建";
        $user->email = "052@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0905205252';
        $user->arrived = 0;
        $user->save();

        $user  = User::where('name', '=', '郭中建')->first();
        $role = Permission::where('name', '=', 'Police')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 52;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

        $user = new App\User; //測試用密碼是1234
        $user->id = 53;
        $user->name = "黃織方";
        $user->email = "053@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0905305353';
        $user->arrived = 0;
        $user->save();

        $user  = User::where('name', '=', '黃織方')->first();
        $role = Permission::where('name', '=', 'Police')->first();
        $user->assignRole($role);
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->id = 53;
        $Works_on->mission_list_id = 1;
        $Works_on->save();

//        $user = new App\User;
//        $user->id = 54;
//        $user->name = "郭一建";
//        $user->email = "054@yahoo.com.tw";
//        $user->password =Hash::make ('1234');
//        $user->phone = '0905405454';
//        $user->skill = '無特殊技能';
//        $user->country_or_city_input = '苗栗縣';
//        $user->township_or_district_input = '公館鄉';
//        $user->arrived = 0;
//        $user->save();
//
//        $user  = User::where('name', '=', '郭一建')->first();
//        $role = Permission::where('name', '=', 'Reliever')->first();
//        $user->assignRole($role);
//        $user->save();
//
//        $user = new App\User;
//        $user->id = 55;
//        $user->name = "郭二建";
//        $user->email = "055@yahoo.com.tw";
//        $user->password =Hash::make ('1234');
//        $user->phone = '0905505555';
//        $user->skill = '無特殊技能';
//        $user->country_or_city_input = '新北市';
//        $user->township_or_district_input = '萬華區';
//        $user->arrived = 0;
//        $user->save();
//
//        $user  = User::where('name', '=', '郭二建')->first();
//        $role = Permission::where('name', '=', 'Reliever')->first();
//        $user->assignRole($role);
//        $user->save();
//
//        $user = new App\User;
//        $user->id = 56;
//        $user->name = "郭三建";
//        $user->email = "056@yahoo.com.tw";
//        $user->password =Hash::make ('1234');
//        $user->phone = '0905605656';
//        $user->skill = '有醫師執照';
//        $user->country_or_city_input = '台中市';
//        $user->township_or_district_input = '北屯區';
//        $user->arrived = 0;
//        $user->save();
//
//        $user  = User::where('name', '=', '郭三建')->first();
//        $role = Permission::where('name', '=', 'emt')->first();
//        $user->assignRole($role);
//        $user->save();
//
//        $user = new App\User; //測試用密碼是1234
//        $user->id = 57;
//        $user->name = "黃織角";
//        $user->email = "resource1@yahoo.com.tw";
//        $user->password =Hash::make ('1234');
//        $user->phone = '0905705757';
//        $user->arrived = 1;
//        $user->save();
//
//        $user  = User::where('name', '=', '黃織角')->first();
//        $role = Permission::where('name', '=', 'Cresource')->first();
//        $user->assignRole($role);
//        $user->save();
//
//        $Works_on = new App\Works_on;
//        $Works_on->id = 57;
//        $Works_on->mission_list_id = 1;
//        $Works_on->save();




        $Victim_detail = new App\Victim_detail;
        $Victim_detail->victim_detail_id = 1;
        $Victim_detail->mission_list_id = 7;
        $Victim_detail->name = "阿斯馬";
        $Victim_detail->age = 30;
        $Victim_detail->sex = '男';
        $Victim_detail->person_id = "L123456789";
        $Victim_detail->phone = "0412345678";
        //$Victim_detail->address = 3;
        $Victim_detail->damage_level = 4;
        $Victim_detail->damage_detail = "被尖銳物品刺中腹部";
        $Victim_detail->now_location = "逢甲大學醫療組診療處";
        $Victim_detail->disposal = "先做初步包紮，等候救護車抵達";
        $Victim_detail->save();

        $Victim_detail = new App\Victim_detail;
        $Victim_detail->victim_detail_id = 2;
        $Victim_detail->mission_list_id = 7;
        $Victim_detail->name = "王一明";
        $Victim_detail->age = 30;
        $Victim_detail->sex = '男';
        $Victim_detail->person_id = "L123456784";
        $Victim_detail->phone = "0412345678";
       // $Victim_detail->address = 3;
        $Victim_detail->damage_level = 2;
//        $Victim_detail->damage_detail = "被尖銳物品刺中腹部";
//        $Victim_detail->now_location = "逢甲大學醫療組診療處";
//        $Victim_detail->disposal = "先做初步包紮，等候救護車抵達";
        $Victim_detail->save();

        $Victim_detail = new App\Victim_detail;
        $Victim_detail->victim_detail_id = 3;
        $Victim_detail->mission_list_id = 7;
        $Victim_detail->name = "王二明";
        $Victim_detail->age = 30;
        $Victim_detail->sex = '女';
        $Victim_detail->person_id = "L123456783";
        $Victim_detail->phone = "0412345678";
       // $Victim_detail->address = 3;
        $Victim_detail->damage_level = 2;
//        $Victim_detail->damage_detail = "被尖銳物品刺中腹部";
//        $Victim_detail->now_location = "逢甲大學醫療組診療處";
//        $Victim_detail->disposal = "先做初步包紮，等候救護車抵達";
        $Victim_detail->save();

    }
}