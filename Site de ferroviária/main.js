const prepareAccordion = function() {
    const accordionItems = document.querySelectorAll("#accordion-container>div:not(.top)");

    accordionItems.forEach(item => {
        item.addEventListener("click", () => {
            accordionItems.forEach(item => {
                item.classList.remove('open');
            })
            item.classList.add('open');
        })
    })
}

window.onload = function() {
    prepareAccordion();
}

