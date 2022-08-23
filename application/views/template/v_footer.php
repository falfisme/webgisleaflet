 </div>
 <!-- /. PAGE INNER  -->
 </div>
 <!-- /. PAGE WRAPPER  -->
 </div>

 <!-- /. WRAPPER  -->


 <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
 <!-- BOOTSTRAP SCRIPTS -->
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> -->
 <!-- <script src="<?= base_url() ?>template/assets/js/bootstrap.min.js"></script> -->

    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?= base_url() ?>/template/assets/js/bootstrap.min.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="<?= base_url() ?>/template/assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

 <!-- DATA TABLE SCRIPTS -->
 <script src="<?= base_url() ?>template/assets/js/dataTables/jquery.dataTables.js"></script>
 <script src="<?= base_url() ?>template/assets/js/dataTables/dataTables.bootstrap.js"></script>
 <script>
    $(document).ready(function() {
       $('#list-usaha').dataTable();
    });

    $(document).ready(function() {
       $('#dataTables-example').dataTable();
    });
 </script>





 </body>

 </html>