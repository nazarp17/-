document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("userForm");
    const restoreButton = document.getElementById("restoreData");
    const API_URL = "https://reqres.in/api/users";

    form.addEventListener("submit", async (event) => {
        event.preventDefault();

        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();

        if (!name || !email) {
            alert(" заповніть всі поля!");
            return;
        }

        const userData = { name, email };
     

        try {
    
            alert("Дані успішно відправлено!");
        } catch (error) {
            alert(error.message);
        }
    });

    restoreButton.addEventListener("click", () => {
        const savedData = localStorage.getItem("lah");
        if (savedData) {
            const { name, email } = JSON.parse(savedData);
            document.getElementById("name").value = name;
            document.getElementById("email").value = email;
        } else {
            alert("Немає збережених даних!");
        }
    });
});