const toggle = document.getElementById("toggleLight");
const mode_search = document.querySelector("#mode_search");
const mode_Navbar = document.querySelector("#mode_Navbar");
const mode_dieukhien = document.querySelector("#mode_dieukhien");
const mode_logo = document.querySelector("#mode_logo");
const mode_khuvuc = document.querySelector("#mode_khuvuc");
const mode_nhatro = document.querySelector("#mode_nhatro");
const mode_tintuc = document.querySelector("#mode_tintuc");
const mode_body = document.querySelector("#mode_body");
const mode_text_navbar_khuvuc = document.querySelector(
  "#mode_text_navbar_khuvuc"
);
const mode_logomini = document.querySelector("#brand-logo-mini");

const mode_table_khuvuc = document.querySelector("#mode_table_khuvuc");
const mode_text_table_khuvuc = document.querySelector(
  "#mode_text_table_khuvuc"
);

const mode_table_nhatro = document.querySelector("#mode_table_nhatro");
const mode_text_table_nhatro = document.querySelector(
  "#mode_text_table_nhatro"
);

const mode_table_tintuc = document.querySelector("#mode_table_tintuc");
const mode_text_table_tintuc = document.querySelector(
  "#mode_text_table_tintuc"
);

const mode_table_nap = document.querySelector("#mode_table_nap");
const mode_text_table_nap = document.querySelector("#mode_text_table_nap");

const mode_table_taikhoan = document.querySelector("#mode_table_taikhoan");
const mode_text_table_taikhoan = document.querySelector(
  "#mode_text_table_taikhoan"
);

toggle.addEventListener("click", function () {
  this.classList.toggle("mdi-weather-night");
  if (this.classList.toggle("mdi-weather-sunny")) {
    // Dark

    // search
    mode_search.style.background = "#191C24";
    mode_search.style.color = "white";
    mode_search.style.transition = "0.3s";

    // navbar cạnh search

    mode_Navbar.style.background = "#191C24";
    mode_Navbar.style.color = "white";
    mode_Navbar.style.transition = "0.3s";

    // mode điều khiển
    mode_dieukhien.style.background = "#191C24";
    mode_dieukhien.style.color = "white";
    mode_dieukhien.style.transition = "0.3s";

    // mode logo
    mode_logo.style.background = "#191C24";
    mode_logo.style.color = "white";
    mode_logo.style.transition = "0.3s";

    // mode body điều khiển
    mode_body.style.background = "#000000";
    mode_body.style.color = "white";
    mode_body.style.transition = "0.3s";

    // mode ô khu vực
    mode_khuvuc.style.background = "#191C24";
    mode_khuvuc.style.color = "white";
    mode_khuvuc.style.transition = "0.3s";

    // mode ô nhà trọ
    mode_nhatro.style.background = "#191C24";
    mode_nhatro.style.color = "white";
    mode_nhatro.style.transition = "0.3s";

    // mode ô tin tức
    mode_tintuc.style.background = "#191C24";
    mode_tintuc.style.color = "white";
    mode_tintuc.style.transition = "0.3s";

    // mode table khu vực
    mode_table_khuvuc.style.background = "#191C24";
    mode_table_khuvuc.style.color = "white";
    mode_table_khuvuc.style.transition = "0.3s";

    // mode text table khu vực
    mode_text_table_khuvuc.style.background = "#191C24";
    mode_text_table_khuvuc.style.color = "white";
    mode_text_table_khuvuc.style.transition = "0.3s";

    // mode table nhà trọ
    mode_table_nhatro.style.background = "#191C24";
    mode_table_nhatro.style.color = "white";
    mode_table_nhatro.style.transition = "0.3s";

    // mode text table nhà trọ
    mode_text_table_nhatro.style.background = "#191C24";
    mode_text_table_nhatro.style.color = "white";
    mode_text_table_nhatro.style.transition = "0.3s";

    // mode table tài khoản
    mode_table_taikhoan.style.background = "#191C24";
    mode_table_taikhoan.style.color = "white";
    mode_table_taikhoan.style.transition = "0.3s";

    // mode text table tài khoản
    mode_text_table_taikhoan.style.background = "#191C24";
    mode_text_table_taikhoan.style.color = "white";
    mode_text_table_taikhoan.style.transition = "0.3s";

    // mode table tin tức
    mode_table_tintuc.style.background = "#191C24";
    mode_table_tintuc.style.color = "white";
    mode_table_tintuc.style.transition = "0.3s";

    // mode text table tin tức
    mode_text_table_tintuc.style.background = "#191C24";
    mode_text_table_tintuc.style.color = "white";
    mode_text_table_tintuc.style.transition = "0.3s";

    // mode table nạp
    mode_table_nap.style.background = "#191C24";
    mode_table_nap.style.color = "white";
    mode_table_nap.style.transition = "0.3s";

    // mode text table nạp
    mode_text_table_nap.style.background = "#191C24";
    mode_text_table_nap.style.color = "white";
    mode_text_table_nap.style.transition = "0.3s";

    // mode text add navbar
    mode_text_navbar_khuvuc.style.background = "#191C24";
    mode_text_navbar_khuvuc.style.color = "white";
    mode_text_navbar_khuvuc.style.transition = "0.3s";

    // mode logo mini
    mode_logomini.style.background = "#191C24";
    mode_logomini.style.color = "white";
    mode_logomini.style.transition = "0.3s";
  } else {
    // Light

    // search
    mode_search.style.background = "#fff";
    mode_search.style.transition = "0.3s";

    // navbar cạnh search
    mode_Navbar.style.background = "#99ccff";
    mode_Navbar.style.color = "black";
    mode_Navbar.style.transition = "0.3s";

    // mode điều khiển
    mode_dieukhien.style.background = "#fff";
    mode_dieukhien.style.color = "black";
    mode_dieukhien.style.transition = "0.3s";

    // mode logo
    mode_logo.style.background = "#fff";
    mode_logo.style.color = "black";
    mode_logo.style.transition = "0.3s";

    // mode body điều khiển
    mode_body.style.background = "#99ccff";
    mode_body.style.color = "#fff";
    mode_body.style.transition = "0.3s";

    // mode ô khu vực
    mode_khuvuc.style.background = "#FFFFFF";
    mode_khuvuc.style.color = "black";
    mode_khuvuc.style.transition = "0.3s";

    // mode ô nhà trọ
    mode_nhatro.style.background = "#FFFFFF";
    mode_nhatro.style.color = "black";
    mode_nhatro.style.transition = "0.3s";

    // mode ô tin tức
    mode_tintuc.style.background = "#FFFFFF";
    mode_tintuc.style.color = "black";
    mode_tintuc.style.transition = "0.3s";

    // mode table khu vực
    mode_table_khuvuc.style.background = "#ffffff";
    mode_table_khuvuc.style.color = "#000000";
    mode_table_khuvuc.style.transition = "0.3s";

    // mode text table khu vực
    mode_text_table_khuvuc.style.background = "#ffffff";
    mode_text_table_khuvuc.style.color = "#000000";
    mode_text_table_khuvuc.style.transition = "0.3s";

    // mode table nhà trọ
    mode_table_nhatro.style.background = "#ffffff";
    mode_table_nhatro.style.color = "#000000";
    mode_table_nhatro.style.transition = "0.3s";

    // mode text table nhà trọ
    mode_text_table_nhatro.style.background = "#ffffff";
    mode_text_table_nhatro.style.color = "#000000";
    mode_text_table_nhatro.style.transition = "0.3s";

    // mode table tài khoản
    mode_table_taikhoan.style.background = "#ffffff";
    mode_table_taikhoan.style.color = "#000000";
    mode_table_taikhoan.style.transition = "0.3s";

    // mode text table tài khoản
    mode_text_table_taikhoan.style.background = "#ffffff";
    mode_text_table_taikhoan.style.color = "#000000";
    mode_text_table_taikhoan.style.transition = "0.3s";

    // mode table tin tức
    mode_table_tintuc.style.background = "#ffffff";
    mode_table_tintuc.style.color = "#000000";
    mode_table_tintuc.style.transition = "0.3s";

    // mode text table tin tức
    mode_text_table_tintuc.style.background = "#ffffff";
    mode_text_table_tintuc.style.color = "#000000";
    mode_text_table_tintuc.style.transition = "0.3s";

    // mode table nạp
    mode_table_nap.style.background = "#ffffff";
    mode_table_nap.style.color = "#000000";
    mode_table_nap.style.transition = "0.3s";

    // mode text table nạp
    mode_text_table_nap.style.background = "#ffffff";
    mode_text_table_nap.style.color = "#000000";
    mode_text_table_nap.style.transition = "0.3s";

    // mode text add navbar

    mode_text_navbar_khuvuc.style.background = "#FFFFFF";
    mode_text_navbar_khuvuc.style.color = "black";
    mode_text_navbar_khuvuc.style.transition = "0.3s";

    // logo mini
    mode_logomini.style.background = "#FFFFFF";
    mode_logomini.style.color = "black";
    mode_logomini.style.transition = "0.3s";
  }
});
