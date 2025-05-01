<x-layout>
    <section class="register-form">
            <div>
                <h1>Register</h1>
                <form method="POST" action="/register">
                    @csrf

                    <label for="name">Full Name</label><br>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
                    @error('name')
                    <p style="color:red; font-size:12px;">{{ $message }}</p>
                    @enderror
                    <label for="username"> Username: </label><br>
                    <input type="text" id="username" name="username" value="{{ old('username') }}"><br>
                    @error('username')
                    <p style="color:red; font-size:12px;">{{ $message }}</p>
                    @enderror
                    <label for="email"> Email: </label><br>
                    <input type="text" id="email" name="email" value="{{ old('email') }}"><br>
                    @error('email')
                    <p style="color:red; font-size:12px;">{{ $message }}</p>
                    @enderror
                    <label for="password"> Password: </label><br>
                    <input type="password" id="password" name="password"><br>
                    @error('password')
                    <p style="color:red; font-size:12px;">{{ $message }}</p>
                    @enderror
                    <button type="submit">Submit</button>
                </form>
            </div>

            <div>
                <h1>Sign In</h1>
                <form method="POST" action="/login">
                    @csrf

                    <label for="email"> Email: </label><br>
                    <input type="text" id="email" name="email" value="{{ old('email') }}"><br>
                    @error('email')
                    <p style="color:red; font-size:12px;">{{ $message }}</p>
                    @enderror
                    <label for="password"> Password: </label><br>
                    <input type="password" id="password" name="password"><br>
                    @error('password')
                    <p style="color:red; font-size:12px;">{{ $message }}</p>
                    @enderror
                    <button type="submit">Submit</button>
                </form>
            </div>
    </section>
</x-layout>