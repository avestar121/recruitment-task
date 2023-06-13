// Add your custom scripts here

console.log('Good luck 👌');


function toggleForm() {
    var form = document.getElementById("userForm");
    var addButton = document.getElementById("addUserButton");

    if (form.hasAttribute("hidden")) {
        form.removeAttribute("hidden");
        addButton.textContent = "Cancel";
        addButton.classList.add("redBackground");
    } else {
        form.setAttribute("hidden", "true");
        addButton.textContent = "Add User";
        addButton.classList.remove("redBackground");
    }
}