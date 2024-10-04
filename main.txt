const open_menu_btn = document.querySelector("#open__nav-btn");
const close_menu_btn = document.querySelector("#close__nav-btn");
const menu__selection = document.querySelector(".menu__selection");
const employee_profile_btns = document.querySelectorAll(".employee_profile");
const employee_modal = document.querySelector(".employee_modal");
const main_section = document.querySelector(".main_section");
const close_profile = document.querySelector(".overlay");
const details = document.querySelector("#show_employee_details");
const employee_card = document.querySelector(".employee_card");
const profile = document.querySelector(".profile");
const links = document.querySelectorAll(".org");

const ShowNav = () => {
  menu__selection.style.top = "0.1rem";
  open_menu_btn.style.display = "none";
  close_menu_btn.style.display = "block";
};
const HideNav = () => {
  open_menu_btn.style.display = "block";
  close_menu_btn.style.display = "none";
  menu__selection.style.top = "-5rem";
};

// open_menu_btn.addEventListener("click", ShowNav);
// close_menu_btn.addEventListener("click", HideNav);

links.forEach((link) => {
  link.addEventListener("click", () => {
    document.querySelector(".active")?.classList.remove("active");
    link.classList.add("active");
  });
});

// Show Modal

// const showModal = () => {
//   employee_modal.classList.remove("hidden");
//   employee_modal.classList.add("overlay");
// };
// TEST Target
// document.addEventListener("click", (e) => {
//   console.log(e.target);
// });

// event delegation
// document.addEventListener("click", (e) => {
//   if (e.target.closest(".employee_card")) {
//     details.classList.remove("hidden");
//     details.classList.add("overlay");
//   }
// });

// Close Modal on main page
function closeModal() {
  document.addEventListener("click", (e) => {
    if (e.target.closest(".overlay")) {
      details.classList.remove("overlay");
      details.classList.add("hidden");
    }
  });
}

employee_modal.addEventListener("click", closeModal);

employee_profile_btns.forEach((employee_profile_btn) => {
  let x = document.querySelectorAll(".employee_profile").value;
  employee_profile_btn.addEventListener("click", () => {
    if (employee_modal.classList.contains("hidden")) {
      employee_modal.classList.remove("hidden");
      employee_modal.classList.add("overlay");
      // console.log(x);
    }
  });
});

// Display modal data using AJAX
$(document).on("click", ".employee_profile", function () {
  let id = $(this).attr("id");

  $.ajax({
    url: "logic/get_employee_data.php",
    method: "POST",
    data: {
      id: id,
    },

    success: function (data) {
      $(".employee_modal").html(data);
    },

    error: function () {
      alert("Error");
    },
  });
});
// Modal operation when filtered on specialty
$(document).on("click", ".specialty", function () {
  id = $(this).attr("id");
  // alert(id);
  $.ajax({
    url: "logic/get_employee_by_specialty.php",
    method: "POST",
    data: {
      id: id,
    },
    success: function (data) {
      $(".main_section").html(data);
      $(".main_section").append(
        "<div id='show_employee_details' class='employee_modal hidden'>" +
          "</div>"
      );
      $(".employee_profile").on("click", function () {
        $(".employee_modal").addClass("overlay");
        $(".employee_modal").removeClass("hidden");
        setTimeout(function () {
          $(".employee_modal").addClass("hidden");
          $(".employee_modal").removeClass("overlay");
        }, 5000);
        clearTimeout();
      });

      $(".employee_modal").on("click", function () {
        $(".employee_modal").addClass("hidden");
        $(".employee_modal").removeClass("overlay");
        clearTimeout();
      });
    },
  });
  // setTimeout(function () {
  //   $(".employee_modal").addClass("hidden");
  //   $(".employee_modal").removeClass("overlay");
  // }, 5000);
  // clearTimeout();
});
// ******** TESTING TO GET ORGANIZATION DATA ********
$(document).on("click", ".org", function () {
  id = $(this).attr("id");
  // alert(id);

  $.ajax({
    url: "logic/get_organization_data.php",
    method: "POST",
    data: {
      id: id,
    },

    success: function (data) {
      $(".main_section").html(data);
      $(".main_section").append(
        "<div id='show_employee_details' class='employee_modal hidden'>" +
          "</div>"
      );
      $(".employee_profile").on("click", function () {
        $(".employee_modal").addClass("overlay");
        $(".employee_modal").removeClass("hidden");
      });

      $(".employee_modal").on("click", function () {
        $(".employee_modal").addClass("hidden");
        $(".employee_modal").removeClass("overlay");
      });
    },
  });
  // setTimeout(function () {
  //   $(".employee_modal").addClass("hidden");
  //   $(".employee_modal").removeClass("overlay");
  // }, 5000);
});
