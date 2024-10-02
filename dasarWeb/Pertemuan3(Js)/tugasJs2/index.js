document.getElementById("Siform").addEventListener("submit", function (e) {
    e.preventDefault();

    var valid = true;

    var nama = document.getElementById("inputNama").value;
    var alamat = document.getElementById("inputAlamat").value;
    var tanggalLahir = document.getElementById("inputTanggalLahir").value;
    var jenisKelamin = document.querySelector('input[name="gender"]:checked');
    var hobby = document.getElementById("inputHobby").value;
    var pekerjaan = document.getElementById("inputPekerjaan").value;
    var checkMeOut = document.getElementById("gridCheck").checked;

    if (!checkMeOut) {
        alert("Harus Check Me Out");
        valid = false;
    }

    if (nama === "") {
        alert("Nama tidak boleh kosong yaa");
        valid = false;
    }

    if (alamat === "") {
        alert("Alamat tidak boleh kosong yaa");
        valid = false;
    }

    if (tanggalLahir === "") {
        alert("Tanggal Lahir tidak boleh kosong yaa");
        valid = false;
    }

    if (!jenisKelamin) {
        alert("Jenis Kelamin tidak boleh kosong yaa");
        valid = false;
    }

    if (valid) {
        alert("Selamat Datang " + nama);
    } else {
        alert("Mohon isi data dengan benar");
    }
});


