const categoryButtons = document.querySelectorAll('#menu-categories li');
const menuCategories = document.querySelectorAll('.menu-category');

categoryButtons.forEach(button => {
    button.addEventListener('click', () => {
        categoryButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const selectedCategory = button.getAttribute('data-category');

        menuCategories.forEach(category => {
            if (category.classList.contains(selectedCategory)) {
                category.style.display = 'block';
            }
            else{
                category.style.display = 'none';
            }
        })
    })
})