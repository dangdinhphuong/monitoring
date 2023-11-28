<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Mail\ForgetPassMail;
use Illuminate\Support\Facades\Mail;


class LoginController extends Controller
{
    // số lần đăng nhập
    protected $maxAttempts = 3;
    // thời gian bị khóa tài khoản là 60 giây
    protected $decayMinutes = 60;

    public function __construct(){

    }

    public function index(){

        return view('admin.pages.auth.login');
    }

    public  function store(LoginRequest $request)
    {
        // tạo key để nhớ lần đăng nhập sai của tài khoản : key ==> login|admin@gmail,com|http://127.0.0.1:8000
        $key = "login|" . request('email') . '|' . request()->ip();

        // kiểm tra xem người dùng có click vào luôn luôn đăng nhập ko
        $remember = request('remember') == "1" ? true : false;

        // kiểm tra xem tài khoản đã quá số lần đăng nhập chưa . nếu quá 3 lần thì khóa tài khoản , nếu chưa quá 3 lần thì bỏ qua if
        if (RateLimiter::tooManyAttempts($key, $this->maxAttempts)) {
            // Xử lý khóa tài khoản
            $user = User::where('email', request('email'))->first();
            if ($user) {
                $user->update(['status' => User::DISABLE_ACCOUNT]); // cho trạng thái tài khoản bằng 0 tương đương với khóa tài khoản
            }

            return redirect()->back()->with('error', "Tài khoản của bạn tạm thời dừng hoạt động do đăng nhập sai quá nhiều | Vui lòng viên hệ với quản trị viên để được hỗ trợ !");
        }
        if (auth()->user()) {
            auth()->logout();
        }
        // sử dụng auth để đăng nhập . nếu đăng nhập sai thì chạy vào if . còn nếu đúng bỏ qua if
        if (!auth()->attempt(request(['email', 'password']), $remember)) {
            // khi đăng nhập sai ta dùng hit để tăng số lần đăng nhập sai
            RateLimiter::hit($key, $this->decayMinutes);
            return redirect()->back()->with('error', "Tài khoản hoặc mật khẩu không hợp lệ !")->with('retriesLeft', RateLimiter::retriesLeft($key, $this->maxAttempts));
        }
        // kiểm tra xem tài khoản ta vừa đăng nhập trên đã đóng chưa. nếu quá status = 0 thì chạy if , nếu status = 1 thì bỏ qua if
        if (auth()->user()->status == User::DISABLE_ACCOUNT) {
            // logout tk vừa đăng nhập ra
            $this->logout();
            return redirect()->back()->with('error', "Tài khoản của bạn đã bị vô hiệu hóa !");
        }
        RateLimiter::clear($key);

        return redirect()->route('admin.dashboad');
    }

    public function logout()
    {
        // kiểm tra xem đã đăng nhập chưa . nếu đăng r thì logout . còn chưa thì về quay về trang login
        if (auth()->user()) {
            auth()->logout();
        }
        return redirect()->route('login');
    }
    public function forGotPassword(){
        return view('admin.pages.auth.forgot_password');
    }
    public function SentPassword()
    {
        request()->validate([
            'email' => 'email|required|exists:users,email',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ e-mail !!',
            'email.email' => 'Email không hợp lệ, Xin vui lòng thử lại!!',
            'email.exists' => 'Email chưa được đăng ký!!'
        ]);
        $PasswordReset = User::where('email', request('email'))->first();
        $data['password'] =  Str::random(15);
        $data['user'] = $PasswordReset;
      //  $PasswordReset->update(['password'=> $data['password']]);
     //  return view('admin.pages.TemplateMail.forgetpass', compact('data'));
        Mail::to(request('email'))->send(new ForgetPassMail($data));
//        return view('admin.pages.auth.ForgetPassword')->with('message', ' Yêu cầu đã được giửi đi vui lòng kiêm tra email');
    }
}
