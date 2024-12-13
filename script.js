$(document).ready(function () {
  const userList = $("#user-list");
  const userForm = $("#user-form");
  const userNameInput = $("#user-name");
  const messageContainer = $("#message-container");

  // Sample user data to show initially
  const initialUsers = [
{ id: 1, name: "Bilall Zafar " },
    { id: 2, name: "Moez Rehman" },
    { id: 3, name: "Jazib Chohan" },
    { id: 4, name: "Abdul Amaan" }
  ];

  // Store users in an array
  let users = initialUsers;

  // Display initial users
  users.forEach(user => appendUserToList(user));

  // Add User
  userForm.on("submit", function (e) {
    e.preventDefault();
    const userName = userNameInput.val().trim();
    if (userName) {
      const user = {
        id: new Date().getTime(), // Unique ID based on current time
        name: userName
      };
      users.push(user); // Store the user in the array
      userNameInput.val(""); // Clear input
      appendUserToList(user);
      showMessage("User added successfully!", "success");
    } else {
      showMessage("Please enter a valid user name.", "error");
    }
  });

  // Function to append user to the list
  function appendUserToList(user) {
    const userItem = `
      <li data-id="${user.id}">
        <span>${user.name}</span>
        <div>
          <button class="edit-btn">Edit</button>
          <button class="delete-btn">Delete</button>
        </div>
      </li>`;
    userList.append(userItem);
  }

  // Delete User
  userList.on("click", ".delete-btn", function () {
    const listItem = $(this).closest("li");
    const userId = listItem.data("id");
    const userToDelete = users.find(user => user.id === userId);

    if (confirm("Are you sure you want to delete this user?")) {
      // Remove from the array
      users = users.filter(user => user.id !== userId);
      listItem.remove();
      showMessage("User deleted successfully!", "success");
    }
  });

  // Edit User
  userList.on("click", ".edit-btn", function () {
    const listItem = $(this).closest("li");
    const currentName = listItem.find("span").text();
    const userId = listItem.data("id");
    const newName = prompt("Edit User Name:", currentName);

    if (newName && newName.trim()) {
      // Update name in the array
      const userIndex = users.findIndex(user => user.id === userId);
      if (userIndex !== -1) {
        users[userIndex].name = newName.trim();
        listItem.find("span").text(newName.trim());
        showMessage("User name updated successfully!", "success");
      }
    } else if (newName === null) {
      showMessage("Edit operation cancelled.", "info");
    }
  });

  // Function to show messages
  function showMessage(message, type) {
    const messageTypes = {
      success: "message-success",
      error: "message-error",
      info: "message-info"
    };
    const messageClass = messageTypes[type] || messageTypes.success;
    messageContainer.html(`<div class="${messageClass}">${message}</div>`);

    setTimeout(function () {
      messageContainer.empty();
    }, 3000);
  }
});

  // Define the scrollToUserManagement function
  function scrollToUserManagement() {
    const userSection = document.getElementById("user-management");
    window.scrollTo({
      top: userSection.offsetTop,
      behavior: "smooth"  // This ensures smooth scrolling
    });
  }