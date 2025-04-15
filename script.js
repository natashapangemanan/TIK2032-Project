function ubahTema() {
    const temaSaatIni = document.body.classList.contains('gelap') ? 'gelap' : 'terang';

    if (temaSaatIni === 'gelap') {
        document.body.classList.remove('gelap');
        document.body.classList.add('terang');
        sessionStorage.setItem('tema', 'terang'); 
    } else {
        document.body.classList.remove('terang');
        document.body.classList.add('gelap');
        sessionStorage.setItem('tema', 'gelap'); 
    }
}

window.onload = function() {}
    const tombol = document.createElement("button");
    tombol.textContent = "Ubah Tema";
    tombol.onclick = ubahTema; 
    document.body.appendChild(tombol);

    const tema = sessionStorage.getItem('tema');
    if (tema) {
        document.body.classList.add(tema); 
    } else {
        document.body.classList.add('terang');
    }

    function tampilkanTanggalDanJam() {
        const hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const bulan = [
          "Januari", "Februari", "Maret", "April", "Mei", "Juni",
          "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
      
        const now = new Date();
        const namaHari = hari[now.getDay()];
        const tanggal = now.getDate();
        const namaBulan = bulan[now.getMonth()];
        const tahun = now.getFullYear();
      
        let jam = now.getHours().toString().padStart(2, '0');
        let menit = now.getMinutes().toString().padStart(2, '0');
        let detik = now.getSeconds().toString().padStart(2, '0');
      
        const teks = `${namaHari}, ${tanggal} ${namaBulan} ${tahun} - ${jam}:${menit}:${detik}`;
        const elemen = document.getElementById("tanggal-jam");
        if (elemen) {
          elemen.innerText = teks;
        }
      }
      
      setInterval(tampilkanTanggalDanJam, 1000);
      
      tampilkanTanggalDanJam();
