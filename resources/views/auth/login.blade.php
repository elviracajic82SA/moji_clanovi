<x-layout>
  <h1>Prijava</h1>
  @if($errors->any()) <p style="color:#b00">{{ $errors->first() }}</p> @endif
  <form method="post">@csrf
    <label>Email <input type="email" name="email" required></label><br>
    <label>Lozinka <input type="password" name="password" required></label><br>
    <label><input type="checkbox" name="remember"> Zapamti me</label><br>
    <button>Prijavi se</button>
  </form>
</x-layout>
