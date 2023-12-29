$(function () {
  "use strict";
  $("#main-wrapper").AdminSettings({
    Layout: "vertical", // vertical | horizontal
    SidebarType: "full", // full / mini-sidebar
    BoxedLayout: true, // true | false
    Direction: "ltr", // ltr | rtl
    Theme: "light", // light | dark
    ColorTheme: "Blue_Theme", // Blue_Theme | Aqua_Theme | Purple_Theme | Green_Theme | Cyan_Theme | Orange_Theme
    cardBorder: false // true | false
  });

  $("#add-image-galleries").on("click", function () {
    let imageGalleries = $("#image-galleries").children().length;
    $("#image-galleries").append(
      `<div class="mb-3 row align-items-center">
      <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Gambar Galeri ${imageGalleries + 1}
:      </label>
      <div class="col-sm-9">
        <div class="input-group border rounded-1">
          <input type="file" name="imageGalleries[]" class="form-control" placeholder="John Deo">
        </div>
      </div>
    </div>`
    );
  });
});
