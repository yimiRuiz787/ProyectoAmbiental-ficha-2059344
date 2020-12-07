 </div>

</div>

<!-- Jquery JS-->
<script src="assets/dashboard/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="assets/dashboard/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="assets/dashboard/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="assets/dashboard/vendor/slick/slick.min.js">
</script>
<script src="assets/dashboard/vendor/wow/wow.min.js"></script>
<script src="assets/dashboard/vendor/animsition/animsition.min.js"></script>
<script src="assets/dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="assets/dashboard/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="assets/dashboard/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="assets/dashboard/vendor/circle-progress/circle-progress.min.js"></script>
<script src="assets/dashboard/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="assets/dashboard/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="assets/dashboard/vendor/select2/select2.min.js">
<script src="assets/dashboard/vendor/sweetalert/sweetalert.min.js">
</script>

<!-- Main JS-->
<script src="assets/dashboard/js/main.js"></script>

<!-- <script src="assets/js/jquery-3.5.1.min.js"></script>-->
<script src="assets/dataTable/datatables.min.js"></script>





</body>
<script>
    $(document).ready( function () {
        $('#dataTable').DataTable(
        {
            language: {
               processing:     "Traitement en cours...",
               search:         "Buscar",
               lengthMenu:    "Mostrar _MENU_ Elementos",
               info:           "Mostrando _START_ a _END_ Sobre _TOTAL_ Elementos",
               infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
               infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
               infoPostFix:    "",
               loadingRecords: "Chargement en cours...",
               zeroRecords:    "No hay elementos",
               emptyTable:     "Aucune donnée disponible dans le tableau",
               paginate: {
                first:      "Premier",
                previous:   "Anterior",
                next:       "Siguiente",
                last:       "Dernier"
            },
            aria: {
                sortAscending:  ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    } );

    } );
</script>
</html>