function showPopup(imageSrc, description) {
    document.getElementById('popup-image').src = imageSrc;
    document.getElementById('popup-description').innerText = description;
    document.getElementById('popup').style.display = 'block';
}

function hidePopup() {
    document.getElementById('popup').style.display = 'none';
}

/*cart*/
$('[data-addCart]').click(function() {
    $(this).addClass('is-adding')
    setTimeout(function() {
    $('[data-addCart]').removeClass('is-adding')
    $('[data-successMessage]').removeClass('hide')
    }, 2500);
});

/*ALerta*/
Swal.fire({
    title: "Good job!",
    text: "You clicked the button!",
    icon: "success"
  });