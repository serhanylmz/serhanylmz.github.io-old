    // Get the button
    const mybutton = document.getElementById("btnUp");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document with animation
    function topFunction() {
    // Get the current vertical position of the scrollbar
    const startY = window.pageYOffset || document.documentElement.scrollTop;
    // Set the target position to the very top of the document
    const stopY = 0;
    // Calculate the distance and duration of the scroll animation
    const distance = stopY > startY ? stopY - startY : startY - stopY;
    const speed = Math.round(distance / 100);
    const time = Math.round(distance / speed);
    // Animate the scroll with requestAnimationFrame
    let currentTime = 0;
    const animateScroll = function() {
        currentTime += 1;
        const scrollY = startY + Math.easeInOutQuad(currentTime, 0, stopY - startY, time);
        window.scrollTo(0, scrollY);
        if (currentTime < time) {
        requestAnimationFrame(animateScroll);
        }
    };
    animateScroll();
    }

    // Easing function for smooth animation
    Math.easeInOutQuad = function (t, b, c, d) {
    t /= d / 2;
    if (t < 1) return c / 2 * t * t + b;
    t--;
    return -c / 2 * (t * (t - 2) - 1) + b;
    };

