
// let slideIndex = 1;
// showSlides(slideIndex);

// function plusSlides(n) {
//     showSlides(slideIndex += n);
// }

// function currentSlide(n) {
//     showSlides(slideIndex = n);
// }

// function showSlides() {
//     let i;
//     let slides = document.getElementsByClassName("mySlides");
//     let dots = document.getElementsByClassName("dot");
//     slideIndex++
//     if (slideIndex > slides.length) { slideIndex = 1 }
//     if (slideIndex < 1) { slideIndex = slides.length }
//     for (i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";
//     }
//     for (i = 0; i < dots.length; i++) {
//         dots[i].className = dots[i].className.replace(" active", "");
//     }

//     slides[slideIndex - 1].style.display = "block";
//     dots[slideIndex - 1].className += " active";
//     setTimeout(showSlides, 5000);
// }
$(() => {
    $('.add-to-cart-link').click((e) => {
        e.preventDefault();
        id_san_pham = $(e.target).attr('data-id-san-pham');
        // console.log('add to cart with id ' + id_san_pham);
        $.get('http://localhost:8000/add-to-cart/' + id_san_pham)
            .done((data) => {
                var gio_hang = JSON.parse(data);
                // console.log(gio_hang);
                var tong_so_luong = 0;
                for(var i = 0; i < gio_hang.length; i++){
                    tong_so_luong += gio_hang[i].so_luong;
                }
                // console.log(tong_so_luong);
                $('.number_item_cart').html(tong_so_luong);
            })
            .fail((err) => {
                console.log(err);
            });
    });
});