document.getElementById("Siform").addEventListener("submit", function (e) {
    e.preventDefault();

    var nama = document.getElementById("inputNama").value;
    var alamat = document.getElementById("inputAlamat").value;
    var tanggalLahir = document.getElementById("inputTanggalLahir").value;
    // var genderlakilaki = document.getElementById("genderlakilaki");
    // var gendercewe = document.getElementById("gendercewe");
    var jenisKelamin = document.getElementById("genderlakilaki").checked || document.getElementById("gendercewe").checked;
    var hobby = document.getElementById("inputHobby").value;
    var pekerjaan = document.getElementById("inputPekerjaan").value;
    let valid = true;

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
// console.log(jenisKelamin);
    if (!jenisKelamin) {
        alert("Jenis Kelamin tidak boleh kosong yaa");
        valid = false;
    }
    // if (hobby === "") {
    //     alert("Hobby tidak boleh kosong yaa");
    //     valid = false;
    // }
    // if (pekerjaan === "") {
    //     alert("Pekerjaan tidak boleh kosong yaa");
    //     valid = false; 
    // }

    if (valid) {
        alert("Selamat Datang " + nama);
    }
   
});

