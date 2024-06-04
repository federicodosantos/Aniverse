function getRatingStars(rating) {
    let stars = '';
    for (let i = 1; i <= 5; i++) {
        stars += `<span class="fa fa-star ${i <= rating ? 'text-amber-400' : 'text-gray-400'}"></span>`;
    }
    return stars;
}

window.getRatingStars = getRatingStars;
