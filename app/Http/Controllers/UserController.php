<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

   
    public function addUser(Request $request)
    {
        // استخراج البيانات من الطلب
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $status = $request->input('status');
        $image = $request->file('image');
        if ($image) {
            // احفظ الصورة في مجلد معين واحتفظ بالاسم في قاعدة البيانات
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            // إذا لم يتم تحميل صورة، قم بتعيين القيمة إلى null
            $imageName = null;
        }
        
        // قم بإضافة المستخدم إلى قاعدة البيانات هنا
        DB::table('users')->insert([
            'name' => $name,
                 'email' => $email,
                 'password' => $password,
                 'image' => $image,
                 'status' => 'admin',
               
            ]);
        // // إعادة توجيه المستخدم بناءً على نجاح العملية
        return redirect()->route('add.user')->with('success', 'تمت إضافة المستخدم بنجاح!');
    }
    }
