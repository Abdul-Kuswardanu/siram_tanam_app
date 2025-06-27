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
</body>
</html>
