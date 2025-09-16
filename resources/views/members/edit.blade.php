<x-layout>
  <h1>Novi član</h1>
  @if($errors->any()) <p style="color:#b00">{{ $errors->first() }}</p> @endif
  <form method="post">@csrf
    <label>Ime <input name="first_name" required></label><br>
    <label>Prezime <input name="last_name" required></label><br>
    <label>Email <input type="email" name="email" required></label><br>
    <label>Telefon <input name="phone"></label><br>
    <label>Status
      <select name="status"><option value="active">Aktivan</option><option value="inactive">Neaktivan</option></select>
    </label><br>
    <button>Snimi</button>
  </form>
</x-layout>
