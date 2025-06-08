document.addEventListener('DOMContentLoaded', () => {
    const menuCategoriesUl = document.getElementById('menu-categories');
    const sidebarItems = menuCategoriesUl.querySelectorAll('li');
    const menuContentSections = document.querySelectorAll('.menu-items .menu-category');

    function hideAllContentSections() {
        menuContentSections.forEach(section => {
            section.style.display = 'none';
        });
    }

    function showContentSection(category) {
        const targetId = category + '-category-content';
        const targetSection = document.getElementById(targetId);
        if (targetSection) {
            targetSection.style.display = 'grid';
        }
    }

    sidebarItems.forEach(item => {
        item.addEventListener('click', function() {
            sidebarItems.forEach(li => li.classList.remove('active'));
            this.classList.add('active');

            const category = this.dataset.category;

            hideAllContentSections();

            if (category) {
                showContentSection(category);
            }
        });
    });

    hideAllContentSections();const defaultActiveContent = document.getElementById('hot-coffee-category-content');
    if (defaultActiveContent) {
        defaultActiveContent.style.display = 'grid'; // Ensure it's displayed as a grid
    }

    const hotCoffeeSidebarItem = document.querySelector('.menu-sidebar li[data-category="hot-coffee"]');
    if (hotCoffeeSidebarItem) {
        hotCoffeeSidebarItem.classList.add('active');
    }
});