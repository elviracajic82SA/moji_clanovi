<x-layout>
  <h1>Registracija</h1>
  @if($errors->any()) <p style="color:#b00">{{ $errors->first() }}</p> @endif
  <form method="post">@csrf
    <label>Ime i prezime <input name="name" required></label><br>
    <label>Email <input type="email" name="email" required></label><br>
    <label>Lozinka <input type="password" name="password" required></label><br>
    <label>Ponovi lozinku <input type="password" name="password_confirmation" required></label><br>
    <button>Kreiraj račun</button>
  </form>
</x-layout>
