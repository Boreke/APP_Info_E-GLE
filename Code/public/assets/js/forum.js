document.getElementById('addPostBtn').addEventListener('click', function() {
    document.getElementById('addPostPopup').style.display = 'block';
});

document.getElementById('closeAddPopup').addEventListener('click', function() {
    document.getElementById('addPostPopup').style.display = 'none';
});

document.querySelectorAll('.editPostBtn').forEach(button => {
    button.addEventListener('click', function() {
        document.getElementById('editId').value = this.dataset.id;
        document.getElementById('editTitre').value = this.dataset.titre;
        document.getElementById('editContenu').value = this.dataset.contenu;
        document.getElementById('editPostPopup').style.display = 'block';
    });
});

document.getElementById('closeEditPopup').addEventListener('click', function() {
    document.getElementById('editPostPopup').style.display = 'none';
});