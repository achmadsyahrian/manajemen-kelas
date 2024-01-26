<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\UserRequest;
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
        return view('student.form', [
            'title' => 'MAHASISWA',
            'userProfilePhoto' => $this->userProfilePhoto
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $requestUser, StudentRequest $requestStudent)
    {
        $dataUser = $requestUser->all();
        $dataStudent = $requestStudent->all();
        $dataUser['password'] = Hash::make('12345678');
        $dataUser['role'] = 'mahasiswa';
        $dataUser['status'] = 'active';

        // Validasi Photo
        if ($requestStudent->hasFile('photo')) {
            $photo = $requestStudent->file('photo')->store('student-images', 'public');
            $dataStudent['photo'] = $photo;
        }
        
        $user = User::create($dataUser);
        $dataStudent['user_id'] = $user->id;
        Student::create($dataStudent);

        
        return redirect('/student')->with('success', 'Mahasiswa Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // dd($student);
        return view('student.view', [
            'student' => $student,
            'userProfilePhoto' => $this->userProfilePhoto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.form', [
            'student' => $student,
            'title' => 'EDIT MAHASISWA',
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
        $student->destroy($student->id); 
        return redirect('/student')->with('success', 'Mahasiswa Berhasil Dihapus!');
    }
}
