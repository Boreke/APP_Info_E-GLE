function openPopup() {
    document.getElementById('popup').style.display = 'block';
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

function openPopupEdit() {
    document.getElementById('popupEdit').style.display = 'block';
}

function closePopupEdit() {
    document.getElementById('popupEdit').style.display = 'none';
}

function openPopupEditCinema() {
    document.getElementById('popupEditCinema').style.display = 'block';
}

function closePopupEditCinema() {
    document.getElementById('popupEditCinema').style.display = 'none';
}

function openDeletePopup() {
    document.getElementById('deleteProfilePopup').style.display = 'block'; 
}

function closeDeletePopup() {
    document.getElementById('deleteProfilePopup').style.display = 'none';
}

function openPopupForum() {
    document.getElementById('popupForum').style.display = 'block';
}

function closePopupForum() {
    document.getElementById('popupForum').style.display = 'none';
}

function openEditPostPopup(postId) {
    document.getElementById('editPostPopup' + postId).style.display = 'block';
}

function closeEditPostPopup(postId) {
    document.getElementById('editPostPopup' + postId).style.display = 'none';
}

function openEditCommentPopup(commentId) {
    document.getElementById('editCommentPopup' + commentId).style.display = 'block';
}

function closeEditCommentPopup(commentId) {
    document.getElementById('editCommentPopup' + commentId).style.display = 'none';
}