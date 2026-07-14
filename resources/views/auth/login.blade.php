<x-guest-layout>

<style>
body{
    background:linear-gradient(135deg,#F8FAFC,#EAF4FF,#FFF0F6);
    font-family:'Poppins',sans-serif;
}

.login-card{
    border:none;
    border-radius:30px;
    overflow:hidden;
    box-shadow:0 20px 45px rgba(0,0,0,.12);
}

.login-header{
    background:linear-gradient(135deg,#FFD6E8,#D8E9FF,#DFF8EB);
    text-align:center;
    padding:45px;
}

.login-header h1{
    font-weight:700;
    color:#4F46E5;
    margin-top:15px;
}

.login-header p{
    color:#555;
}

.form-control{
    border-radius:15px;
    height:55px;
    border:1px solid #ddd;
    padding-left:20px;
}

.form-control:focus{
    box-shadow:0 0 0 .2rem rgba(99,102,241,.15);
    border-color:#6366F1;
}

.login-btn{
    width:100%;
    height:55px;
    border:none;
    border-radius:15px;
    background:linear-gradient(90deg,#6366F1,#8B5CF6);
    color:white;
    font-size:18px;
    font-weight:600;
    transition:.3s;
}

.login-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(99,102,241,.35);
}

.social-btn{
    border:1px solid #ddd;
    border-radius:15px;
    height:50px;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    color:#333;
    font-weight:600;
    transition:.3s;
}

.social-btn:hover{
    background:#F3F4F6;
    color:#4F46E5;
}

.or-line{
    display:flex;
    align-items:center;
    text-align:center;
    color:#999;
}

.or-line::before,
.or-line::after{
    content:'';
    flex:1;
    border-bottom:1px solid #ddd;
}

.or-line:not(:empty)::before{
    margin-right:10px;
}

.or-line:not(:empty)::after{
    margin-left:10px;
}
</style>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-5">

            <div class="card login-card">

                <div class="login-header">

                    <div style="font-size:70px">
                        🌸
                    </div>

                    <h1>TECH BLOG</h1>

                    <p>
                        Temukan berbagai artikel menarik seputar teknologi,
                        Artificial Intelligence, Cyber Security,
                        dan Pemrograman.
                    </p>

                </div>

                <div class="card-body p-5">

                    <h3 class="text-center fw-bold mb-4">
                        👋 Welcome Back
                    </h3>

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">

                        @csrf

                        <div class="mb-3">

                            <label class="fw-semibold mb-2">

                                📧 Email

                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="Masukkan Email"
                                required
                                autofocus>

                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>

                        </div>

                        <div class="mb-3">

                            <label class="fw-semibold mb-2">

                                🔒 Password

                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Masukkan Password"
                                required>

                            <x-input-error :messages="$errors->get('password')" class="mt-2"/>

                        </div>

                        <div class="form-check my-3">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember_me">

                            <label class="form-check-label">

                                Remember Me

                            </label>

                        </div>

                        <button class="login-btn">

                            🔐 Login

                        </button>

                    </form>

                    <div class="my-4 or-line">

                        atau

                    </div>

                    <div class="row g-2">

                        <div class="col-6">

                            <a href="#" class="social-btn">

                                🌐 Google

                            </a>

                        </div>

                        <div class="col-6">

                            <a href="#" class="social-btn">

                                💻 GitHub

                            </a>

                        </div>

                    </div>

                    @if (Route::has('password.request'))

                        <div class="text-center mt-4">

                            <a href="{{ route('password.request') }}">

                                Lupa Password?

                            </a>

                        </div>

                    @endif

                    <div class="text-center mt-3">

                        Belum punya akun?

                        <a href="{{ route('register') }}" class="fw-bold">

                            Daftar Sekarang

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</x-guest-layout>