# Moji Članovi – Laravel CRUD aplikacija

Ovo je aplikacija izrađena u Laravelu za upravljanje članovima kluba i članarinama.  
Sadrži login/registraciju, CRUD nad članovima, planovima članarina i uplatama.

---

## 📦 Funkcionalnosti
- **Autentikacija korisnika** (registracija, prijava, odjava).
- **Članovi kluba** – dodavanje, uređivanje, brisanje, pretraga.
- **Planovi članarina** – npr. mjesečna, godišnja.
- **Uplate** – vezane za člana i plan; označavanje kao plaćeno.
- **Tabelarni prikazi** sa paginacijom i osnovnom pretragom.
- **Demo admin račun** za brzo testiranje.

---

## ⚙️ Zahtjevi
- PHP >= 8.1 (testirano sa PHP 8.2/8.3)
- Composer
- MySQL/MariaDB
- Nginx ili Apache web server
- Node.js (ako se želi rebuild-ati frontend sa Vite-om)

---

## 🚀 Instalacija i pokretanje

1. Klonirati repozitorij:
   ```bash
   git clone https://github.com/tvoje-korisnicko-ime/moji-clanovi.git
   cd moji-clanovi
   ```

2. Instalirati zavisnosti:
   ```bash
   composer install
   npm install && npm run build
   ```

3. Kopirati `.env.example` u `.env` i podesiti bazu:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=moji_clanovi
   DB_USERNAME=root
   DB_PASSWORD=secret
   ```

4. Generisati aplikacijski ključ:
   ```bash
   php artisan key:generate
   ```

5. Pokrenuti migracije i seedere:
   ```bash
   php artisan migrate --seed
   ```

6. Pokrenuti aplikaciju (lokalno):
   ```bash
   php artisan serve
   ```
   Otvoriti u browseru: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🔑 Demo korisnik
Ako koristiš seedere ili `init_db.sql`, dostupan je račun:

- **Email:** `admin@club.local`  
- **Lozinka:** `admin123`

---

## 🗃️ Baza podataka
- Ako koristiš SSH: migracije i seed (`php artisan migrate --seed`) kreiraju sve potrebne tabele i demo podatke.
- Ako nemaš SSH: koristi fajl `init_db.sql` (priložen uz projekt) i importuj ga kroz phpMyAdmin.

---

## 📂 Struktura projekta
- `app/` – aplikacijska logika (kontroleri, modeli).
- `bootstrap/` – bootstrap i cache fajlovi.
- `config/` – konfiguracija aplikacije.
- `database/` – migracije i seederi.
- `public/` – ulazna tačka aplikacije (index.php).
- `resources/` – blade view-i, JS i CSS fajlovi.
- `routes/` – definicija ruta.
- `storage/` – logovi, cache, uploadi.
- `tests/` – PHPUnit testovi.
- `artisan` – CLI alat za Laravel.

---

## 📑 Napomene
- Projekt se može pokrenuti lokalno ili na serveru (Nginx/Apache).
- U `.gitignore` su isključeni `vendor/`, `node_modules/` i `.env` fajlovi (potrebno je instalirati zavisnosti i podesiti `.env`).
- README.md sadrži sve potrebne upute za instalaciju i pokretanje.
