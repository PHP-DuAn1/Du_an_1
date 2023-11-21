var menuItems = document.querySelectorAll(".menu-list a");

// Loop qua tất cả các phần tử a
menuItems.forEach(function (item) {
  // Add sự kiện click cho mỗi phần tử a
  item.addEventListener("click", function () {
    // Xóa lớp active từ tất cả các phần tử a
    menuItems.forEach(function (menuItem) {
      menuItem.classList.remove("active");
    });
    // Thêm lớp active cho phần tử a đã được click
    this.classList.add("active");
  });
});

var fixedElement = document.getElementById("box-left");

// Xử lý sự kiện cuộn trang
window.onscroll = function () {
  // Thiết lập top của phần tử cố định dựa trên vị trí cuộn của trang
  fixedElement.style.top = window.scrollY + "px";
};
