<div class="topbar">
    <a href="#" id="title" class="title">{{ $data['title'] }}</a>
    <div class="menu">
        <a id="nav_about" href="#1af0aa"><i class="fas fa-user"></i> Tentang Saya</a>
        <a id="nav_portfolio" href="#1fsd40s"><i class="fas fa-briefcase"></i> Portofolio</a>
        <a id="nav_contact" href="#1rt45sc"><i class="fas fa-envelope"></i> Kontak</a>
        <a href="{{ route('auth.logout', $data['user']) }}"><i class="fas fa-sign-out-alt"></i>Logout</a>
        <button id="darkModeToggle" title="Ubah Mode Gelap">🌓</button>
    </div>
    <div class="hamburger" onclick="toggleMenu()">
        ☰
    </div>
</div>
