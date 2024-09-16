document.addEventListener("DOMContentLoaded", function () {
  const modeToggle = document.getElementById("modeToggle");
  const body = document.body;

  // Check for previously saved mode
  const darkMode = localStorage.getItem("dark-mode");

  if (darkMode === "enabled") {
    body.classList.add("dark-mode");
  }

  modeToggle.addEventListener("click", function () {
    body.classList.toggle("dark-mode");

    if (body.classList.contains("dark-mode")) {
      localStorage.setItem("dark-mode", "enabled");
    } else {
      localStorage.removeItem("dark-mode");
    }
  });
});
