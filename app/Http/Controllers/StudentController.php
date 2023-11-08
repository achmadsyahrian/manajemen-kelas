<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    protected $userProfilePhoto;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->userProfilePhoto = $this->getUserProfilePhoto(Auth::user());
            return $next($request);
        });
    }
    
    public function index()
    {
        return view('student.index', [
            'students' => Student::orderBy('nim')->paginate(10),
            'userProfilePhoto' => $this->userProfilePhoto
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create', [
            'userProfilePhoto' => $this->userProfilePhoto
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi User
        $validatedUser = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|starts_with:@|unique:users',
            'email' => 'nullable|email:dns|unique:users',
        ]);
        // password
        $validatedUser['password'] = Hash::make('12345678');
        $validatedUser['role'] = 'mahasiswa';
        $validatedUser['status'] = 'active';

        // Validasi Mahasiswa
        $validatedStudent = $request->validate([
            'nim' => 'required|size:10|regex:/^[0-9]{10}$/|unique:students',
            'gender' => 'nullable',
            'phone' => 'nullable|regex:/^[0-9]{11,}$/|unique:students',
            'photo' => 'image|file|max:5000', //5mb max
        ]);
        // Validasi Photo
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('student-images', 'public');
            $validatedStudent['photo'] = $photo;
        }
        
        $user = User::create($validatedUser);
        $validatedStudent['user_id'] = $user->id;
        Student::create($validatedStudent);

        
        return redirect('/student')->with('success', 'Mahasiswa Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            'student' => $student,
            'userProfilePhoto' => $this->userProfilePhoto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student,  UserController $userController)
    {   
        $user = $student->user;
        $userController->validateUserData($request, $user);
        $userController->validateStudentData($request, $student);
        return redirect('/student')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
