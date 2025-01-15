function filterTasks() {
  const status = document.getElementById('filterStatus').value;
  window.location.href = status ? `/filter?status=${status}` : '/';
}
