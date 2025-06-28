</div> <!-- end content -->
    <footer class="text-center text-muted mt-3 py-3 bg-light">
        <small>Smart Siram v1.0 - © <?= date('Y') ?></small>
    </footer>
</div> <!-- end container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById("sidebar");
  const toggleBtn = document.getElementById("toggleSidebar");

  toggleBtn.addEventListener("click", () => {
    sidebar.classList.toggle("sidebar-collapsed");
  });
</script>
<!-- jQuery (wajib untuk toastr) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
<?php if ($this->session->flashdata('success')) : ?>
  toastr.success("<?= $this->session->flashdata('success'); ?>");
<?php endif; ?>
<?php if ($this->session->flashdata('error')) : ?>
  toastr.error("<?= $this->session->flashdata('error'); ?>");
<?php endif; ?>
</script>
<script>
toastr.options = {
  "closeButton": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "timeOut": "3000"
};
</script>
</body>
</html>
