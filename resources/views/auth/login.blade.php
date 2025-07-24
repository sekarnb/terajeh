<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Terajeh</title>
</head>
<body style="margin:0;">
<div style="width: 100%; height: 100vh; position: relative; background: #F0EBE4; overflow: hidden; font-family: Inter, sans-serif;">
  <!-- Card -->
  <form method="POST" action="{{ route('login') }}" style="width: 435px; height: 206px; left: 503px; top: 293px; position: absolute; background: white; border-radius: 12px;">
    @csrf
    <div style="width: 385px; left: 18px; top: 24px; position: absolute; display: flex; flex-direction: column; gap: 24px;">

      <!-- Username Field -->
      <div style="display: flex; flex-direction: column; gap: 4px;">
        <label style="color: #323639; font-size: 14px; font-weight: 500;">Username</label>
        <input type="text" name="username" placeholder="Username"
          style="width: 385px; height: 44px; padding-left: 12px; border-radius: 8px; border: 1px solid #BEC1BF;" required />
      </div>

      <!-- Password Field -->
      <div style="display: flex; flex-direction: column; gap: 4px;">
        <label style="color: #323639; font-size: 14px; font-weight: 500;">Password</label>
        <input type="password" name="password" placeholder="••••••••"
          style="width: 385px; height: 44px; padding-left: 12px; border-radius: 8px; border: 1px solid #BEC1BF;" required />
      </div>

      <!-- Error Message -->
      @if($errors->any())
      <div style="color: red; font-size: 13px;">{{ $errors->first() }}</div>
      @endif

    </div>

    <!-- Login Button -->
    <div style="width: 435px; height: 44px; padding: 4px 0px; position: absolute; bottom: -70px; background: #2D3832; border-radius: 12px; display: flex; justify-content: center; align-items: center; cursor: pointer;">
      <button type="submit" style="background: none; border: none; color: white; font-size: 20px; font-weight: 400; cursor: pointer;">Log in</button>
    </div>
  </form>

  <!-- Logo -->
  <img style="width: 200px; height: 200px; left: 620px; top: 93px; position: absolute;" src="{{ asset('assets/img/logo.png') }}" alt="Logo" />
</div>
</body>
</html>
