document.addEventListener("DOMContentLoaded", () => {
    const filterButtons = document.querySelectorAll(".filter-btn");
    const contentContainer = document.getElementById("discography-content");

    filterButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            e.preventDefault();

            // Ambil tipe filter dari data-type
            const filterType = button.getAttribute("data-type");

            // Kirim permintaan AJAX ke server
            fetch(`/discography?type=${filterType}`, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    // Perbarui konten diskografi
                    contentContainer.innerHTML = data.html;

                    // Tambahkan class active untuk tombol filter
                    filterButtons.forEach((btn) =>
                        btn.classList.remove("btn-active")
                    );
                    button.classList.add("btn-active");
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        });
    });
});
