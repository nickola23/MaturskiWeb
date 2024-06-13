document.addEventListener('DOMContentLoaded', function() {
    var searchButton = document.getElementById('search-button');
    searchButton.addEventListener('click', function() {
        var manufacturer = document.getElementById('manufacturer').value;
        var camera = document.getElementById('camera').value;
        var screen = document.getElementById('screen').value;
        var ram = document.getElementById('ram').value;
        var sim = document.getElementById('sim').value;
        var processor = document.getElementById('processor').value;

        var products = document.querySelectorAll('#results table tr');
        products.forEach(function(product) {
            var characteristicsElement = product.querySelector('td:nth-child(2)');
            if (characteristicsElement) {
                var characteristics = characteristicsElement.textContent;
                var processorRegex = new RegExp(processor.replace(/ /g, "\\s+"), 'i');
                if (characteristics.includes(manufacturer) &&
                    characteristics.includes(camera) &&
                    characteristics.includes(screen) &&
                    characteristics.includes(ram) &&
                    characteristics.includes(sim) &&
                    processorRegex.test(characteristics)) {
                    product.style.display = 'table-row';
                } else {
                    product.style.display = 'none';
                }
            }
        });
    });
});