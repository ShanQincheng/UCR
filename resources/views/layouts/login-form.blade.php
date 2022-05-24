<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />

<form method="POST" action="{{route('login')}}">
    @csrf
    <!-- Email Address -->
    <div class="mb-3">
        <label class="form-label" for="email">
            Email
        </label>

        <input  class="form-control" id="email" type="email" name="email" required="required" autofocus="autofocus">
        <div class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <!-- Password -->
    <div class="mt-4">
        <label class="form-label" for="password">
            Password
        </label>

        <input  class="form-control" id="password" type="password" name="password" required="required" autocomplete="current-password">
    </div>

    <div class="mt-4">
        <a class="" href="{{route('register')}}">
            Sign Up
        </a>

        <button type="submit" class="btn btn-dark ms-3">
            Log in
        </button>
    </div>
</form>
