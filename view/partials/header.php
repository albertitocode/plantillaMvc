<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>GEO CALI</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/logo1.png"
      type="image/x-icon"
      height="100"
      width="100"
    />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap Icons (si no los tienes) -->

    

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    <!-- <link rel="stylesheet" href="assets/css/dark.css"> -->
    
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />

    

    <!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.4/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.4/dist/sweetalert2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/lightweight-charts/dist/lightweight-charts.standalone.production.js"></script> -->
  </head>
  <style>
    body {
    background-color: #ffffff; /* Color de fondo claro */
    color: #000000; /* Color de texto oscuro */
    transition: background-color 0.3s, color 0.3s; /* Transición suave */
}
  body.dark {
    background-color: #1f1f1f; /* Color de fondo oscuro */
    color: #ffffff; /* Color de texto claro */
}
.sidebar {
  background-color: white;
  color: black;
 }
 .logo-header{
  background-color: white;
  color: black;
 }
 .sidebar.dark{
  background-color: black;
  color: #ffffff;
 }
 .logo-header.dark{
  background-color: black;
  color: #ffffff;
 }
 .main-header{
  background-color: white;
  color: black;
 }
 .main-header.dark{
  background-color: black;
  color: white;
 }
 .card.dark{
  background-color: #000000;
  color: #ffffff;
 }
 .footer{
  background-color: white;
  color: black;
 }
 .footer.dark{
  background-color: black;
  color: white;
 }
 .card.dark{
  background-color: #000000;
  color:white;
 }
.profile-username.dark{
  color:white;
}
.dropdown-user-scroll.dark {
  background-color: #000000;
  color: white;
}
#menuUser.dark{
  background-color: #000000;
  color: white;
}
</style>