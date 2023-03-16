    <script>
        const cardProfile = document.querySelector(".card-profile");
        const dropdown = document.querySelector(".dropdown");

        cardProfile.addEventListener("click", () => {
            // Cek apakah elemen 'myDiv' ditampilkan atau disembunyikan
            if (dropdown.classList.contains("hidden")) {
                // Menghapus kelas 'hidden' dari elemen 'div'
                dropdown.classList.remove("hidden");
            } else {
                // Menambahkan kelas 'hidden' kembali ke elemen 'dropdown' jika sudah ditampilkan sebelumnya
                dropdown.classList.add("hidden");
            }
        });
    </script>
    </body>

    </html>