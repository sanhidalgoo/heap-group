
var handleSidebar = function () {
    let sidebar = document.getElementById('sidebar');
    let sidebarClose = document.getElementById('sidebar-toggle-close');
    sidebar.classList.toggle('-translate-x-full');
    sidebar.classList.toggle('translate-x-0');
    sidebarClose.classList.toggle('hidden');
}

var handleFilterbox = function () {
    let filterbox = document.getElementById('filterbox');
    filterbox.classList.toggle('hidden');
}

// Events
document.getElementById("sidebar-toggle").addEventListener("click", handleSidebar, false);
document.getElementById("sidebar-toggle-close").addEventListener("click", handleSidebar, false);
document.getElementById("filterbox-open").addEventListener("click", handleFilterbox, false);
document.getElementById("filterbox-close").addEventListener("click", handleFilterbox, false);

// Range Slider
const rangeInput = document.querySelectorAll(".range-input input");
const priceInput = document.querySelectorAll(".price-input input");
const range = document.querySelector(".slider .progress");

window.onload = function () {
    range.style.left = ((parseInt(range.attributes.min.value) / rangeInput[0].max) * 100) + "%";
    range.style.right = 100 - (parseInt(range.attributes.max.value) / rangeInput[1].max) * 100 + "%";
}

let priceGap = 1000;
priceInput.forEach(input =>{
    input.addEventListener("input", e => {
        let minPrice = parseInt(priceInput[0].value);
        let maxPrice = parseInt(priceInput[1].value);

        if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
            if (e.target.className === "input-min") {
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            } else {
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});
rangeInput.forEach(input =>{
    input.addEventListener("input", e => {
        let minVal = parseInt(rangeInput[0].value);
        let maxVal = parseInt(rangeInput[1].value);
        if ((maxVal - minVal) < priceGap) {
            if (e.target.className === "range-min") {
                rangeInput[0].value = maxVal - priceGap;
            } else {
                rangeInput[1].value = minVal + priceGap;
            }
        } else {
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});
