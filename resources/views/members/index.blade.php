<x-layout>
  <h1>Članovi</h1>
  <form method="get">
    <input name="q" value="{{ $q }}" placeholder="Pretraga (ime/email)">
    <button>Traži</button>
    <a href="{{ route('members.create') }}">+ Novi član</a>
  </form>
  <table>
    <thead><tr><th>#</th><th>Ime</th><th>Email</th><th>Status</th><th>Akcije</th></tr></thead>
    <tbody>
    @foreach($members as $m)
      <tr>
        <td>{{ $m->id }}</td>
        <td>{{ $m->full_name }}</td>
        <td>{{ $m->email }}</td>
        <td>{{ $m->status }}</td>
        <td>
          <a href="{{ route('members.edit',$m) }}">Uredi</a>
          <form class="inline" action="{{ route('members.destroy',$m) }}" method="post" onsubmit="return confirm('Obrisati?')">
            @csrf @method('DELETE') <button>Obriši</button>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $members->links() }}
</x-layout>
