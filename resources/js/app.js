import "./bootstrap";

const inputkhusus = document.getElementById("inputKhusus");
const levelUser = document.getElementById("level_user");

let nama;
let identitas;

levelUser.addEventListener("change", () => {
    if (levelUser.value < 5) {
        nama = "nama";
        identitas = ["NIP", "identitas"];
    } else if (levelUser.value == 5) {
        nama = "nama";
        identitas = ["NIK", "identitas"];
    } else if (levelUser.value == 6) {
        nama = "nama";
        identitas = ["NIS", "identitas"];
    }
    inputkhusus.innerHTML = `
      <div id="inputKhusus" class="w-[512px]">
      <label>
        Nama Lengkap
        <br>
        <input type="text" name="${nama}" placeholder="Isi nama" class="input-bordered input w-full" />
      </label>
      <br><br>
      <label>
        ${identitas[0]}
        <br>
        <input type="text" name="${identitas[1]}" placeholder="Isi ${identitas[0]}" class="input-bordered input w-full" />
      </label>
    </div>
    `;
});
