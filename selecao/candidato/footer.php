<!-- /#wrapper -->
<!-- jQuery -->
<script src="<?php echo site ?>/includes/jquery/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo site ?>/includes/bootstrap/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo site ?>/includes/metisMenu/metisMenu.min.js"></script>
<!-- Morris Charts JavaScript -->
<script src="<?php echo site ?>/includes/raphael/raphael.min.js"></script>
<script src="<?php echo site ?>/includes/morrisjs/morris.min.js"></script>
<script src="<?php echo site ?>/includes/data/morris-data.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo site ?>/includes/dist/js/sb-admin-2.js"></script>
<script src="<?php echo site ?>/includes/dist/js/selecao.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo site ?>/includes/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo site ?>/includes/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo site ?>/includes/datatables-responsive/dataTables.responsive.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            "aLengthMenu": [[5, 25, 50, 75, -1], [5, 25, 50, 75, "All"]],
            "iDisplayLength": 5,
            "order": [],
            "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false,
                }]

        });
    });
</script>
</body>
</html>