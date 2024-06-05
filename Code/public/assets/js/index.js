document.addEventListener('DOMContentLoaded', () => {


    function setupSlider() {
        const sliderContainer = document.querySelector('.slider-container');
        const slider = document.querySelector('.slider');
        const images = slider.querySelectorAll('img');
        const imageCount = images.length;

        console.log(`Image count: ${imageCount}`);

        if (imageCount > 1) {
            const percent = 100 / imageCount;
            let keyframes = '';

            for (let i = 0; i < imageCount; i++) {
                keyframes += `
                    ${i * percent}%, ${(i + 1) * percent}% {
                        transform: translateX(-${i * 100}%);
                    }
                `;
            }

            console.log(`Generated keyframes: ${keyframes}`);

            // Find a stylesheet to insert the rule into
            let styleSheet;
            if (document.styleSheets.length > 0) {
                styleSheet = document.styleSheets[0];
            } else {
                const style = document.createElement('style');
                document.head.appendChild(style);
                styleSheet = style.sheet;
            }

            if (styleSheet) {
                const ruleIndex = styleSheet.cssRules.length;
                styleSheet.insertRule(`@keyframes slider-1 { ${keyframes} }`, ruleIndex);

                console.log(`Inserted rule: ${styleSheet.cssRules[ruleIndex].cssText}`);

                slider.style.animation = `slider-1 ${imageCount * 3}s infinite ease-in-out`;

                console.log(`Slider animation style: ${slider.style.animation}`);
                console.log(styleSheet);
            } else {
                console.error('No stylesheet found or created.');
            }
        }
    }

    setupSlider();
});
