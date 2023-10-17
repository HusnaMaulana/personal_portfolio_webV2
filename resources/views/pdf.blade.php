<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Curriculum Vitae</title>
    <style>
    @page {
      size: A4; /* Atur ukuran kertas ke A4 */
      margin: 20mm; /* Atur margin ke 20mm (atau sesuai kebutuhan Anda) */
    }
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0; /* Warna latar belakang halaman */
    }

    @media print {
        .profile-pic {
            display: none; /* Sembunyikan gambar profil saat mencetak */
        }
    }

    .cv {
        max-width: 100%;
        margin: 0 auto;
        background-color: #fff; /* Warna latar belakang CV */
    }

    .section {
        margin-bottom: 20px;
        text-align: justify;
        padding: 20px;
        background-color: #f9f9f9; /* Warna latar belakang setiap bagian */
        border-radius: 5px; /* Sudut bulat pada setiap bagian */
        background-color: #f4f4f4;
    }

    .section p {
        margin: 0;
        font-size: 14px; /* Ukuran font yang lebih kecil */
    }

    .section h2 {
        font-size: 18px; /* Ukuran font yang lebih kecil */
        color: #007acc; /* Warna judul bagian */
    }

    .section ul {
        padding-left: 20px;
        list-style-type: disc;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px; 
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 6px; /* Padding yang lebih kecil */
        font-size: 14px; /* Ukuran font yang lebih kecil */
        text-align: left;
    }

    h1 {
        text-align: center;
        color: #007acc; /* Warna judul halaman */
        margin-bottom: 10px; /* Margin bawah yang lebih kecil */
    }

    ul {
        list-style-type: none;
    }

    ul li {
        margin-bottom: 8px; /* Margin bawah yang lebih kecil */
    }

    table {
        max-width: 80%; 
        margin: 0 auto; 
        border-collapse: collapse;
    }

    table th {
        background-color: #f2f2f2; 
        text-align: center;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 6px; /* Padding yang lebih kecil */
        font-size: 14px; /* Ukuran font yang lebih kecil */
        text-align: left;
    }

    /* CSS untuk menengahkan progress bar */
    ul li p {
        text-align: center;
        margin-bottom: 5px;
    }

    progress {
        max-width: 150px; /* Sesuaikan dengan lebar maksimum yang Anda inginkan */
        width: 100%;
        height: 12px; /* Ukuran progress bar yang lebih kecil */
        display: block;
        margin: 0 auto;
    }

    /* CSS untuk menyesuaikan tampilan progress bar */
    progress::-webkit-progress-bar {
        background-color: #ccc; /* Warna latar belakang progress bar */
    }

    progress::-webkit-progress-value {
        background-color: #007acc; /* Warna progress bar */
    }

    /* Gaya tambahan untuk kolom skill */
    .section ul li p progress {
        max-width: 150px; /* Lebar maksimum progress bar skill */
        height: 8px; /* Ukuran progress bar yang lebih kecil */
        margin-top: 5px;
        border: none;
        border-radius: 5px;
    }

    /* Gaya tambahan untuk kolom portofolio */
    .section table {
        margin-top: 10px; /* Margin atas yang lebih kecil */
    }

    .section table th {
        background-color: #007acc; /* Warna latar belakang judul tabel */
        color: #fff; /* Warna teks judul tabel */
    }

    .section table th, .section table td {
        border: 1px solid #ddd;
        padding: 6px; /* Padding yang lebih kecil */
        font-size: 14px; /* Ukuran font yang lebih kecil */
        text-align: left;
    }

    /* Gaya tambahan untuk CV secara keseluruhan */
    h1 {
        font-size: 26px; /* Ukuran font yang lebih kecil */
        color: #007acc; /* Warna judul halaman */
        margin-bottom: 10px; /* Margin bawah yang lebih kecil */
    }

    /* Gaya tambahan untuk identitas */
    .identitas-detail p {
        font-size: 16px; /* Ukuran font yang lebih kecil */
    }

    /* Gaya tambahan untuk gambar profil */
    .profile-pic {
        max-width: 150px; /* Ukuran gambar yang lebih kecil */
        border-radius: 50%; /* Untuk membuat gambar profil menjadi bundar */
    }

    /* Gaya tambahan untuk judul-judul bagian */
    .section h2 {
        font-size: 18px; /* Ukuran font yang lebih kecil */
        color: #007acc; /* Warna judul bagian */
        text-align: center; /* Perataan judul di tengah */
        overflow: hidden; /* Mengatasi teks yang terlalu panjang */
        white-space: nowrap; /* Menghindari pemutusan kata */
        text-overflow: ellipsis; /* Menampilkan tanda elipsis (...) jika teks terlalu panjang */
        margin: 0; /* Menghapus margin atas bawah default */
        padding: 10px 0; /* Memberikan sedikit padding untuk penampilan yang lebih baik */
    }

</style>

</head>
<body>
    <div class="cv">

        <h1>Curriculum Vitae</h1>
        <div class="section">
            <h2>Identitas</h2>
                <div class="identitas-detail">
                    <p>Nama: {{ @$homeRecord[0]->your_name}}</p>
                    <p>Tanggal Lahir:{{ @$aboutRecord[0]->date_of_birth}}</p>
                    <p>Jenis Kelamin:{{ @$aboutRecord[0]->gender}}</p>
                    <p>Alamat :{{ @$aboutRecord[0]->address }}</p>
                    <p>Kewarganegaraan:{{ @$aboutRecord[0]->nationality}}</p>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Pendidikan</h2>
            <table>
                <tr>
                    <th>Nama Instansi: {{@$educationRecord[0]->perguruan_tinggi}}</th>
                    <!-- <th>Jurusan</th> -->
                    <th>Periode: {{@$educationRecord[0]->periode_pt}}</th>
                </tr>
            </table>
        </div>


        <div class="section">
            <h2>Organisasi</h2>
            <table>
                <tr>
                    <th>Nama Organisasi: {{@$experienceRecord[0]->nama_organisasi}}</th>
                    <th>Jabatan: {{@$experienceRecord[0]->jabatan}}</th>
                    <th>Periode: {{@$experienceRecord[0]->periode}}</th>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2>Skill</h2>
            <table>
                <tr>
                    <th>Skill: {{@$skillRecord[0]->skill}}</th>
                    <th>Persentasi: {{@$skillRecord[0]->percentage}}</th>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2>Portofolio</h2>
            <table>
                <tr>
                    <th>Nama Proyek: {{@$portfolioRecord[0]->title}}</th>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>