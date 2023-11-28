<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $users = User::filter(request(['search']))
            ->orderBy('id', 'DESC')->Paginate(20);
       //     dd($users);
        return view('admin.pages.users.index', compact('users'));
    }
    public function create()
    {
        return view('admin.pages.users.create');
    }
    public function store(Request $request)
    {

        $this->validate(
            request(),
            [
                'fullname' => 'required|min:3|max:100',
               // 'avatar' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
                'phone' => 'required|numeric|digits_between:10,12|unique:users,phone',
                'address' => 'required|min:3|max:200',
                'email' => 'required|email|unique:users,email',
                'is_admin' => 'required|integer|min:0|max:1',
                'status' => 'required|numeric|min:0|max:1',
            ],
            [
                'fullname.required' => 'Bạn chưa nhập họ và tên',
                'phone.unique' => 'Số điện thoại đã được sử dụng',
                'fullname.min' => 'Họ và tên phải có Độ dài  từ 3 đến 100 ký tự',
                'fullname.max' => 'Họ và tên phải có Độ dài  từ 3 đến 100 ký tự',
                'avatar.required' => 'Bạn chưa chọn ảnh',
                'avatar.mimes' => 'Hình đại diện phải là tệp thuộc loại: image / jpeg, image / png.',
                'avatar.image' => 'Hình đại diện phải là tệp thuộc loại: image / jpeg, image / png.',
                'avatar.max' => 'avatar dụng lượng tối đa 2048mb',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.digits_between' => 'Độ dài số điện thoại không hợp lệ',
                'phone.numeric' => 'Số điện thoại không hợp lệ',
                'address.required' => 'Bạn chưa nhập địa chỉ',
                'address.unique' => 'Địa chỉ không được trùng',
                'address.min' => 'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
                'address.max' => 'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Email không đúng định dạng',
                'phone.unique' => 'Email đã được sử dụng',
                'is_admin.required' => 'Mời chọn chức vụ',
                'is_admin.integer' => 'Chức vụ Không hợp lệ',
                'is_admin.min' => 'Chức vụ Không hợp lệ',
                'status.required' => 'Trạng thái Không hợp lệ',
                'status.integer' => 'Trạng thái Không hợp lệ',
                'status.min' => 'Trạng thái Không hợp lệ',
                'status.max' => 'Trạng thái Không hợp lệ',
            ]
        );

//        // lưu ảnh
//        $pathAvatar = $request->file('avatar')->store('public/users/avatar');
//        $pathAvatar = str_replace("public/", "", $pathAvatar);



        $data = request(['fullname', 'phone', 'address', 'email', 'is_admin', 'status']);
        // tạo mật khẩu cho tài khoản
        $data['passwordNew'] = Str::random(15); // pass chưa mã hóa
//        $data['avatar'] = $pathAvatar;
        $data['password'] = bcrypt( $data['passwordNew']); // mã hóa mật khẩu
        $data['is_admin'] = true;

        User::create($data);

       // Mail::to($request->email)->send(new NotifyMail($data));
        return redirect()->route('admin.user')->with('message', 'Thêm nhóm nhân viên thành công . Vui lòng kiểm tra email để lấy thông tin đăng nhập !');
    }

    public function edit($id)
    {
        $users = User::find($id);

        if ($users) {
            return view('admin.pages.users.edit', compact('users'));
        }
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate(
            request(),
            [
                'fullname' => 'required|min:3|max:100',
               // 'avatar' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
                'phone' => 'required|numeric|digits_between:10,12|unique:users,phone,'. $user ->id,
                'address' => 'required|min:3|max:200',
                'email' => 'required|email|unique:users,email,'. $user ->id,
                'is_admin' => 'required|integer|min:0|max:1',
                'status' => 'required|numeric|min:0|max:1',
            ],
            [
                'fullname.required' => 'Bạn chưa nhập họ và tên',
                'phone.unique' => 'Số điện thoại đã được sử dụng',
                'fullname.min' => 'Họ và tên phải có Độ dài  từ 3 đến 100 ký tự',
                'fullname.max' => 'Họ và tên phải có Độ dài  từ 3 đến 100 ký tự',

                'avatar.mimes' => 'Hình đại diện phải là tệp thuộc loại: image / jpeg, image / png.',
                'avatar.image' => 'Hình đại diện phải là tệp thuộc loại: image / jpeg, image / png.',
                'avatar.max' => 'avatar dụng lượng tối đa 2048mb',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.digits_between' => 'Độ dài số điện thoại không hợp lệ',
                'phone.numeric' => 'Số điện thoại không hợp lệ',
                'address.required' => 'Bạn chưa nhập địa chỉ',
                'address.unique' => 'Địa chỉ không được trùng',
                'address.min' => 'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
                'address.max' => 'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Email không đúng định dạng',
                'phone.unique' => 'Email đã được sử dụng',
                'is_admin.required' => 'Mời chọn chức vụ',
                'is_admin.integer' => 'Chức vụ Không hợp lệ',
                'is_admin.min' => 'Chức vụ Không hợp lệ',
                'status.required' => 'Trạng thái Không hợp lệ',
                'status.integer' => 'Trạng thái Không hợp lệ',
                'status.min' => 'Trạng thái Không hợp lệ',
                'status.max' => 'Trạng thái Không hợp lệ',
            ]
        );
        // tìm user theo id

        // kiểm tra xem request ảnh lên không
        $pathAvatar = "";
//        if ($request->file('avatar') != null) { // có giửi ảnh lên
//
//            if (file_exists('storage/' . $user->avatar)) {  // kiểm tra xem file ảnh cũ có tồn tại trong forder ko
//                unlink('storage/' . $user->avatar); // nếu có thì xóa ảnh cũ trong file store
//            }
//            // lưu ảnh mới
//            $pathAvatar = $request->file('avatar')->store('public/users/avatar');
//            $pathAvatar = str_replace("public/", "", $pathAvatar);
//        } else {
//            $pathAvatar = $user->avatar;
//        }
        $data = request(['fullname', 'phone', 'address', 'email', 'is_admin', 'status']);
       // $data['avatar'] = $pathAvatar;
        $user->update($data);

        return redirect()->route('admin.user')->with('message', 'Cập nhật tài khoản thành công !');;
    }

    public function profile(Request $request)
    {
        $users = Auth::user();
        return view('admin.pages.users.profile',compact('users'));
    }
    public function changePassword(Request $request)
    {

        $rules = [
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:new_password'
        ];
        $messages = [
            'current_password.required' => 'Mời nhập mật khẩu hiện tại !',
            'current_password.min' => 'Mật khẩu hiện tại  ít nhất 6 ký tự!',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất :min ký tự.',
            'new_password.confirmed' => 'Xác nhận mật khẩu mới không khớp.',
            'new_password.different' => 'Mật khẩu mới phải khác mật khẩu hiện tại.',
            'confirm_password.required' => 'Vui lòng xác nhận mật khẩu mới.',
            'confirm_password.min' => 'Mật khẩu xác nhận phải có ít nhất :min ký tự.',
            'confirm_password.same' => 'Mật khẩu xác nhận phải giống với mật khẩu mới.',
        ];
        $customer = User::find(auth()->user()->id);
        $this->validate(request(), $rules, $messages);
        $data = request()->all();
        if (!Hash::check($data['current_password'], $customer->password)) {
            return redirect()->route('admin.profile')->with('error', 'Mật khẩu hiện tại không chính xác, vui lòng thử lại');
        } else {
            $customer->update([
                'password' => bcrypt($data['confirm_password'])
            ]);
            return redirect()->route('logout')->with('message', 'Đổi mật khẩu thành công. Vui lòng đăng nhập lại');

        }
    }
}
